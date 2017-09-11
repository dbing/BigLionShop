<?php

namespace backend\controllers;

use yii;
use common\models\Category;

class CategoryController extends IndexController
{
    public function actionCreate()
    {
        $category = (new Category())->loadDefaultValues();
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
        // 下拉菜单
        $categories = Category::getLevelCategories(Category::find()->asArray()->all());
        $dropDownList = $category->dropDownList($categories);

        return $this->render('create',['category'=>$category,'dropDownList'=>$dropDownList]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {

        $categories = Category::getLevelCategories(Category::find()->asArray()->all());
        return $this->render('index',['categories'=>$categories]);
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }



}
