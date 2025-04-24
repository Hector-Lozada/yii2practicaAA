<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Asignaciones]].
 *
 * @see Asignaciones
 */
class AsignacionesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Asignaciones[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Asignaciones|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
