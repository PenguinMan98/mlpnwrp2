<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_chastisement".
 *
 * @property integer $user_chastisement_id
 * @property integer $user_id
 * @property string $type
 * @property integer $duration
 * @property integer $creation_date
 * @property string $reason
 * @property integer $character_id
 *
 * @property User $user
 */
class UserChastisement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_chastisement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'duration', 'creation_date', 'character_id'], 'integer'],
            [['type', 'reason'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_chastisement_id' => 'User Chastisement ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'duration' => 'Duration',
            'creation_date' => 'Creation Date',
            'reason' => 'Reason',
            'character_id' => 'Character ID',
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
