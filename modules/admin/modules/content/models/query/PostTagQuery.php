<?php

namespace app\modules\admin\modules\content\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\modules\content\models\PostTag]].
 *
 * @see \app\modules\admin\modules\content\models\PostTag
 */
class PostTagQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\PostTag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\PostTag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
