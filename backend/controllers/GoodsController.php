<?php

namespace backend\controllers;

use common\models\Goods;
use common\models\UploadForm;

class GoodsController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $goods = new Goods();
        $upload = new UploadForm();
        return $this->render('create',['goods'=>$goods,'upload'=>$upload]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
