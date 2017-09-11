<?php

namespace backend\controllers;

use yii;
use common\models\Category;

class CategoryController extends IndexController
{
    public function actionCreate()
    {
        $category = new Category();
        if(Yii::$app->request->isPost)
        {
            if($category->load(Yii::$app->request->post()) && $category->validate())
            {
                if($category->save())
                {

                    $this->success('创建分类成功','category/index');
                }
                else
                {
                    $this->error('创建分类失败');
                }
            }

        }

        return $this->render('create',['category'=>$category]);
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
