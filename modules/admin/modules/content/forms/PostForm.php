<?php

namespace app\modules\admin\modules\content\forms;

use app\modules\admin\modules\content\models\Post;
use app\modules\admin\modules\content\models\PostCategoryLinker;
use app\modules\admin\modules\content\models\PostTagLinker;
use Yii;
use yii\base\Model;

class PostForm extends Model
{
    public Post $model;
    public $title;
    public $image;
    public $sub_text;
    public $description;
    public $status;

    public $tags;
    public $categories;

    public function __construct(Post $model, $config = [])
    {
        $this->model = $model;
        $this->title = $model->title;
        $this->image = $model->image;
        $this->sub_text = $model->sub_text;
        $this->description = $model->description;
        $this->status = $model->status;
        $this->tags = $this->initTags();
        $this->categories = $this->initCategories();
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['title', 'sub_text', 'description', 'image'], 'string'],
            [['tags', 'categories'], 'safe'],
            [['tags', 'categories'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'image' => Yii::t('app', 'Image'),
            'sub_text' => Yii::t('app', 'Sub Text'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'view_count' => Yii::t('app', 'View Count'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function save()
    {

        $model = $this->model;
        $model->title = $this->title;
        $model->image = $this->image;
        $model->sub_text = $this->sub_text;
        $model->description = $this->description;
        $model->status = $this->status;

        $isSave = $model->save();

        if ($isSave) {
            $this->saveTags();
            $this->saveCategories();
        }

        return $isSave;

    }

    private function initTags()
    {
        $linker = PostTagLinker::find()->andWhere([
            'post_id' => $this->model->id
        ])->all();
        return array_column($linker, 'tag_id');
    }

    private function initCategories()
    {
        $linker = PostCategoryLinker::find()->andWhere([
            'post_id' => $this->model->id
        ])->all();
        return array_column($linker, 'post_category_id');
    }

    private function saveTags()
    {
        $model = $this->model;
        if ($tags = $this->tags) {
            PostTagLinker::deleteAll(['post_id' => $model->id]);
            foreach ($tags as $tag) {
                $tagModel = new PostTagLinker([
                    'post_id' => $model->id,
                    'tag_id' => $tag,
                ]);
                $tagModel->save();
            }
        }
    }

    private function saveCategories()
    {
        $model = $this->model;
        if ($categories = $this->categories) {
            PostCategoryLinker::deleteAll(['post_id' => $model->id]);
            foreach ($categories as $category) {
                $tagModel = new PostCategoryLinker([
                    'post_id' => $model->id,
                    'post_category_id' => $category
                ]);
                $tagModel->save();
            }
        }
    }
}