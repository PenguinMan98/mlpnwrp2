<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "character_age".
 *
 * @property integer $character_age_id
 * @property string $name
 * @property string $description
 */
class CharacterAge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'character_age';
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
            'character_age_id' => 'Character Age ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
