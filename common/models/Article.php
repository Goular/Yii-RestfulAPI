<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "article".
 *
 * @property int $id ID
 * @property string $title 标题
 * @property string $content 内容
 * @property int $category_id 分类
 * @property int $status 状态
 * @property int $created_by 创建人
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 *
 * @property User $createdBy
 */
class Article extends \yii\db\ActiveRecord implements Linkable
{
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['category_id', 'status', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 512],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'category_id' => '分类',
            'status' => '状态',
            'created_by' => '创建人',
            'created_at' => '创建时间',
            'updated_at' => '最后修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }

//    public function fields()
//    {
//        return [
//            "id",
//            "title",
//            "内容" => "content",
//            "status" => function ($model) {
//                return $model->status == self::STATUS_DRAFT ? "草稿" : "已发布";
//            },
////            "createdBy" => function ($model) {
////                return $model->createdBy["username"];
////            }
//        ];
//    }


    // 自定义显示字段的方法
    public function fields()
    {
        $fileds = parent::fields();
        unset($fileds["created_at"]);
        unset($fileds["category_id"]);
        return $fileds;
    }


    // 添加额外的显示字段
    public function extraFields()
    {
        return ["createdBy"];
        // return [];
    }

    /**
     * Returns a list of links.
     *
     * Each link is either a URI or a [[Link]] object. The return value of this method should
     * be an array whose keys are the relation names and values the corresponding links.
     *
     * If a relation name corresponds to multiple links, use an array to represent them.
     *
     * For example,
     *
     * ```php
     * [
     *     'self' => 'http://example.com/users/1',
     *     'friends' => [
     *         'http://example.com/users/2',
     *         'http://example.com/users/3',
     *     ],
     *     'manager' => $managerLink, // $managerLink is a Link object
     * ]
     * ```
     *
     * @return array the links
     */
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['article/view', 'id' => $this->id], true),
            'edit' => Url::to(['article/update', 'id' => $this->id], true),
            'index' => Url::to(['articles'], true),
        ];
    }
}
