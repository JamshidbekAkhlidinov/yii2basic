<?php

namespace app\modules\admin\modules\content\models\query;

/**
 * This is the ActiveQuery class for [[\app\modules\admin\modules\content\models\PostCategory]].
 *
 * @see \app\modules\admin\modules\content\models\PostCategory
 */
class PostCategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\PostCategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\admin\modules\content\models\PostCategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
