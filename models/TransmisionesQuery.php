<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Transmisiones]].
 *
 * @see Transmisiones
 */
class TransmisionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Transmisiones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Transmisiones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
