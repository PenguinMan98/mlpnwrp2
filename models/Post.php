<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $post_id
 * @property integer $conversation_id
 * @property boolean $public
 * @property boolean $enabled
 * @property boolean $adult
 * @property integer $user_id
 * @property integer $character_id
 * @property integer $date_created
 * @property integer $last_modified
 * @property string $text
 * @property string $chat_name_color
 * @property string $chat_text_color
 * @property integer $viewed
 * @property integer $last_viewed
 *
 * @property Conversation $conversation
 * @property User $user
 * @property Character $character
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conversation_id', 'user_id', 'character_id', 'date_created', 'last_modified', 'viewed', 'last_viewed'], 'integer'],
            [['public', 'enabled', 'adult'], 'boolean'],
            [['text'], 'string'],
            [['chat_name_color', 'chat_text_color'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'conversation_id' => 'Conversation ID',
            'public' => 'Public',
            'enabled' => 'Enabled',
            'adult' => 'Adult',
            'user_id' => 'User ID',
            'character_id' => 'Character ID',
            'date_created' => 'Date Created',
            'last_modified' => 'Last Modified',
            'text' => 'Text',
            'chat_name_color' => 'Chat Name Color',
            'chat_text_color' => 'Chat Text Color',
            'viewed' => 'Viewed',
            'last_viewed' => 'Last Viewed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversation()
    {
        return $this->hasOne(Conversation::className(), ['conversation_id' => 'conversation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacter()
    {
        return $this->hasOne(Character::className(), ['character_id' => 'character_id']);
    }
}
