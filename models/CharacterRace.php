<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "character_race".
 *
 * @property integer $character_id
 * @property integer $race_id
 *
 * @property Character $character
 * @property Race $race
 */
class CharacterRace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['character_id', 'race_id'], 'required'],
            [['character_id', 'race_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Character ID',
            'race_id' => 'Race ID',
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
    public function getRace()
    {
        return $this->hasOne(Race::className(), ['race_id' => 'race_id']);
    }
}
