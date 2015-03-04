<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "race".
 *
 * @property integer $race_id
 * @property string $name
 * @property string $description
 *
 * @property CharacterRace[] $characterRaces
 * @property Character[] $characters
 * @property RaceGame[] $raceGames
 * @property Game[] $games
 */
class Race extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'race_id' => 'Race ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacterRaces()
    {
        return $this->hasMany(CharacterRace::className(), ['race_id' => 'race_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacters()
    {
        return $this->hasMany(Character::className(), ['character_id' => 'character_id'])->viaTable('character_race', ['race_id' => 'race_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaceGames()
    {
        return $this->hasMany(RaceGame::className(), ['race_id' => 'race_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Game::className(), ['game_id' => 'game_id'])->viaTable('race_game', ['race_id' => 'race_id']);
    }
}
