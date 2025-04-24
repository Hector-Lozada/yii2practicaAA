<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Proyectos]].
 *
 * @see Proyectos
 */
class ProyectosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Proyectos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Proyectos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
