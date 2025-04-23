<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Streamers]].
 *
 * @see Streamers
 */
class StreamersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Streamers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Streamers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
