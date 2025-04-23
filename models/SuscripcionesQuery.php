<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Suscripciones]].
 *
 * @see Suscripciones
 */
class SuscripcionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Suscripciones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Suscripciones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
