<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "character_logged_in".
 *
 * @property integer $character_id
 * @property integer $user_id
 * @property integer $logged_in_time
 * @property integer $is_guest
 *
 * @property Character $character
 * @property User $user
 */
class CharacterLoggedIn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_logged_in';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['character_id'], 'required'],
            [['character_id', 'user_id', 'logged_in_time', 'is_guest'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Character ID',
            'user_id' => 'User ID',
            'logged_in_time' => 'Logged In Time',
            'is_guest' => 'Is Guest',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacter()
    {
        return $this->hasOne(Character::className(), ['character_id' => 'character_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
