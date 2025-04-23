<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Donaciones]].
 *
 * @see Donaciones
 */
class DonacionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Donaciones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Donaciones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
