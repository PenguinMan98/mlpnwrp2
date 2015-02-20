<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "character".
 *
 * @property integer $character_id
 * @property string $name
 * @property string $created_date
 * @property integer $last_activity
 * @property integer $creator_user_id
 * @property string $bio
 * @property string $status
 * @property string $gender
 * @property string $image
 * @property string $icon
 * @property string $chat_name_color
 * @property string $chat_text_color
 * @property string $player_notes
 * @property string $player_private_notes
 * @property integer $chat_status_id
 * @property integer $character_race_id
 * @property string $character_race_note
 * @property integer $character_age_id
 * @property string $cutie_mark
 * @property integer $last_status_request
 * @property string $profile_html
 * @property string $profile_css
 * @property boolean $html_override
 * @property string $variables
 */
class Character extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_date'], 'safe'],
            [['last_activity', 'creator_user_id', 'chat_status_id', 'character_race_id', 'character_age_id', 'last_status_request'], 'integer'],
            [['bio', 'status', 'image', 'icon', 'player_notes', 'player_private_notes', 'cutie_mark', 'profile_html', 'profile_css', 'variables'], 'string'],
            [['html_override'], 'boolean'],
            [['name', 'gender'], 'string', 'max' => 100],
            [['chat_name_color', 'chat_text_color'], 'string', 'max' => 7],
            [['character_race_note'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'character_id' => 'Character ID',
            'name' => 'Name',
            'created_date' => 'Created Date',
            'last_activity' => 'Last Activity',
            'creator_user_id' => 'Creator User ID',
            'bio' => 'Bio',
            'status' => 'Status',
            'gender' => 'Gender',
            'image' => 'Image',
            'icon' => 'Icon',
            'chat_name_color' => 'Chat Name Color',
            'chat_text_color' => 'Chat Text Color',
            'player_notes' => 'Player Notes',
            'player_private_notes' => 'Player Private Notes',
            'chat_status_id' => 'Chat Status ID',
            'character_race_id' => 'Character Race ID',
            'character_race_note' => 'Character Race Note',
            'character_age_id' => 'Character Age ID',
            'cutie_mark' => 'Cutie Mark',
            'last_status_request' => 'Last Status Request',
            'profile_html' => 'Profile Html',
            'profile_css' => 'Profile Css',
            'html_override' => 'Html Override',
            'variables' => 'Variables',
        ];
    }
}
