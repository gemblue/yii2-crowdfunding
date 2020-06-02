<?php

/**
 * Campaign.
 * 
 * Generated by Gii. Modified.
 * 
 * @author Gemblue
 */

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch represents the model behind the search form of `app\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * Define tablename
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * Define rules
     * 
     * @return array
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'email', 'status', 'password', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * Define scenarios
     * 
     * @return Object
     */
    public function scenarios()
    {
        // Bypass scenarios() implementation in the parent class
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
        $query = Users::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
