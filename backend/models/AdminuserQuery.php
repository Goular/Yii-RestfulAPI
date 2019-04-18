<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Adminuser]].
 *
 * @see Adminuser
 */
class AdminuserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Adminuser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Adminuser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
