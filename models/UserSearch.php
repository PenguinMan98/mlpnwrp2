<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'forum_post_count', 'chat_post_count', 'last_activity', 'login_attempts'], 'integer'],
            [['user_name', 'password', 'about_me', 'first_name', 'last_name', 'birth_date', 'avatar', 'signup_date', 'signup_ip', 'status'], 'safe'],
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
        $query = User::find();

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
            'user_id' => $this->user_id,
            'birth_date' => $this->birth_date,
            'forum_post_count' => $this->forum_post_count,
            'chat_post_count' => $this->chat_post_count,
            'signup_date' => $this->signup_date,
            'last_activity' => $this->last_activity,
            'login_attempts' => $this->login_attempts,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'about_me', $this->about_me])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'signup_ip', $this->signup_ip])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
