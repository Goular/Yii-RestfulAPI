<?php
/**
 * Created by PhpStorm.
 * User: zhaoj
 * Date: 2019/4/19
 * Time: 17:40
 */

namespace backend\controllers;


use yii\rest\ActiveController;

class ArticleController extends ActiveController
{
    public $modelClass = 'common\models\Article';
}