<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empleados;

/**
 * EmpleadosSearch represents the model behind the search form of `app\models\Empleados`.
 */
class EmpleadosSearch extends Empleados
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idempleados'], 'integer'],
            [['nombre', 'email', 'cargo', 'image_path', 'fecha_ingreso'], 'safe'],
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
        $query = Empleados::find();

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
            'idempleados' => $this->idempleados,
            'fecha_ingreso' => $this->fecha_ingreso,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'image_path', $this->image_path]);

        return $dataProvider;
    }
}
