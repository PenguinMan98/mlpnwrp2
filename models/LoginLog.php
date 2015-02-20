<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_log".
 *
 * @property integer $login_log_id
 * @property integer $user_id
 * @property string $ip
 * @property integer $login_date
 *
 * @property User $user
 */
class LoginLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'ip', 'login_date'], 'required'],
            [['user_id', 'login_date'], 'integer'],
            [['ip'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'login_log_id' => 'Login Log ID',
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'login_date' => 'Login Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
