<?php

namespace backend\controllers;

class AttributeController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex($tid)
    {

        return $this->render('index');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
