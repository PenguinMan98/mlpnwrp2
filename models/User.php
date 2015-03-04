<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $password
 * @property string $about_me
 * @property string $first_name
 * @property string $last_name
 * @property string $birth_date
 * @property string $avatar
 * @property integer $forum_post_count
 * @property integer $chat_post_count
 * @property string $signup_date
 * @property string $signup_ip
 * @property integer $last_activity
 * @property string $status
 * @property integer $login_attempts
 *
 * @property CharacterLoggedIn[] $characterLoggedIns
 * @property CharacterRoom[] $characterRooms
 * @property LoginLog[] $loginLogs
 * @property Post[] $posts
 * @property UserChastisement[] $userChastisements
 * @property UserRole[] $userRoles
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'password'], 'required'],
            [['about_me', 'status'], 'string'],
            [['birth_date', 'signup_date'], 'safe'],
            [['forum_post_count', 'chat_post_count', 'last_activity', 'login_attempts'], 'integer'],
            [['user_name'], 'string', 'max' => 200],
            [['password'], 'string', 'max' => 255],
            [['first_name'], 'string', 'max' => 100],
            [['last_name', 'avatar'], 'string', 'max' => 150],
            [['signup_ip'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'password' => 'Password',
            'about_me' => 'About Me',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birth_date' => 'Birth Date',
            'avatar' => 'Avatar',
            'forum_post_count' => 'Forum Post Count',
            'chat_post_count' => 'Chat Post Count',
            'signup_date' => 'Signup Date',
            'signup_ip' => 'Signup Ip',
            'last_activity' => 'Last Activity',
            'status' => 'Status',
            'login_attempts' => 'Login Attempts',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterLoggedIns()
    {
        return $this->hasMany(CharacterLoggedIn::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterRooms()
    {
        return $this->hasMany(CharacterRoom::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginLogs()
    {
        return $this->hasMany(LoginLog::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserChastisements()
    {
        return $this->hasMany(UserChastisement::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRole::className(), ['user_id' => 'user_id']);
    }
}
