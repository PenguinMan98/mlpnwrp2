<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "character_game".
 *
 * @property integer $character_id
 * @property integer $game_id
 *
 * @property Character $character
 * @property Game $game
 */
class CharacterGame extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['character_id', 'game_id'], 'required'],
            [['character_id', 'game_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Character ID',
            'game_id' => 'Game ID',
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
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['game_id' => 'game_id']);
    }
}
