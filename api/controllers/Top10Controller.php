<?php
/**
 * Created by PhpStorm.
 * User: zhaoj
 * Date: 2019/4/19
 * Time: 17:40
 */

namespace api\controllers;


use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\db\QueryBuilder;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Response;

class Top10Controller extends Controller
{
    public function actionIndex()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $top10 = (new Query())
            ->from("article")
            ->select(["created_by", "Count(id) as creatercount"])
            ->groupBy(["created_by"])
            ->orderBy("creatercount DESC")
            ->groupBy(["created_by"])
            ->limit(10)
            ->all();
        return $top10;
    }
}