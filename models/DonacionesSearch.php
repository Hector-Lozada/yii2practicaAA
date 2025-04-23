<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donaciones;

/**
 * DonacionesSearch represents the model behind the search form of `app\models\Donaciones`.
 */
class DonacionesSearch extends Donaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuario_id', 'streamer_id'], 'integer'],
            [['monto'], 'number'],
            [['mensaje', 'fecha_donacion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Donaciones::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'usuario_id' => $this->usuario_id,
            'streamer_id' => $this->streamer_id,
            'monto' => $this->monto,
            'fecha_donacion' => $this->fecha_donacion,
        ]);

        $query->andFilterWhere(['like', 'mensaje', $this->mensaje]);

        return $dataProvider;
    }
}
