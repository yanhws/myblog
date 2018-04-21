<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Content;

/**
 * ContentSearch represents the model behind the search form of `common\models\Content`.
 */
class ContentSearch extends Content
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'created', 'modified', 'order', 'authorId', 'commentsNum', 'parent'], 'integer'],
            [['title', 'slug', 'text', 'template', 'type', 'status', 'password', 'allowComment', 'allowPing', 'allowFeed'], 'safe'],
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
        $query = Content::find()->with('metas');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'cid' => $this->cid,
            'created' => $this->created,
            'modified' => $this->modified,
            'order' => $this->order,
            'authorId' => $this->authorId,
            'commentsNum' => $this->commentsNum,
            'parent' => $this->parent,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'template', $this->template])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'allowComment', $this->allowComment])
            ->andFilterWhere(['like', 'allowPing', $this->allowPing])
            ->andFilterWhere(['like', 'allowFeed', $this->allowFeed]);

        return $dataProvider;
    }
}
