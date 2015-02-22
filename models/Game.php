<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "game".
 *
 * @property integer $game_id
 * @property string $name
 * @property boolean $public
 * @property boolean $enabled
 * @property boolean $adult
 *
 * @property CharacterGame[] $characterGames
 * @property Character[] $characters
 * @property RaceGame[] $raceGames
 * @property Race[] $races
 * @property Room[] $rooms
 */
class Game extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['public', 'enabled', 'adult'], 'boolean'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'game_id' => 'Game ID',
            'name' => 'Name',
            'public' => 'Public',
            'enabled' => 'Enabled',
            'adult' => 'Adult',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterGames()
    {
        return $this->hasMany(CharacterGame::className(), ['game_id' => 'game_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacters()
    {
        return $this->hasMany(Character::className(), ['character_id' => 'character_id'])->viaTable('character_game', ['game_id' => 'game_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaceGames()
    {
        return $this->hasMany(RaceGame::className(), ['game_id' => 'game_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaces()
    {
        return $this->hasMany(Race::className(), ['race_id' => 'race_id'])->viaTable('race_game', ['game_id' => 'game_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['game_id' => 'game_id']);
    }
}
