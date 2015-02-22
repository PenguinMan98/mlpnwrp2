<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post;

/**
 * PostSearch represents the model behind the search form about `app\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'conversation_id', 'user_id', 'character_id', 'date_created', 'last_modified', 'viewed', 'last_viewed'], 'integer'],
            [['public', 'enabled', 'adult'], 'boolean'],
            [['text', 'chat_name_color', 'chat_text_color'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'post_id' => $this->post_id,
            'conversation_id' => $this->conversation_id,
            'public' => $this->public,
            'enabled' => $this->enabled,
            'adult' => $this->adult,
            'user_id' => $this->user_id,
            'character_id' => $this->character_id,
            'date_created' => $this->date_created,
            'last_modified' => $this->last_modified,
            'viewed' => $this->viewed,
            'last_viewed' => $this->last_viewed,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'chat_name_color', $this->chat_name_color])
            ->andFilterWhere(['like', 'chat_text_color', $this->chat_text_color]);

        return $dataProvider;
    }
}
