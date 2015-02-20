<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $room_id
 * @property integer $game_id
 * @property string $name
 * @property boolean $public
 * @property boolean $enabled
 * @property boolean $adult
 *
 * @property CharacterRoom $characterRoom
 * @property Conversation[] $conversations
 * @property Game $game
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['game_id'], 'integer'],
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
            'room_id' => 'Room ID',
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
    public function getCharacterRoom()
    {
        return $this->hasOne(CharacterRoom::className(), ['room_id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversations()
    {
        return $this->hasMany(Conversation::className(), ['room_id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Game::className(), ['game_id' => 'game_id']);
    }
}
