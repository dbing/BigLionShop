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

    /**
     * 分类删除
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $childCount = Category::find()->where('parent_id=:id',['id'=>$id])->count();
        if($childCount > 0)
        {
            $this->error('该分类下有孩纸，不能删除.');
        }
        // 该分类有商品

        if(Category::findOne($id)->delete())
        {
            $this->success('删除分类成功');
        }
        else
        {
            $this->error('删除分类失败.');
        }
        $this->redirect(['category/index']);
    }

    public function actionIndex()
    {

        $categories = Category::getLevelCategories(Category::find()->asArray()->all());
        return $this->render('index',['categories'=>$categories]);
    }

    public function actionUpdate($id)
    {
        $category = Category::findOne($id);

        if(Yii::$app->request->isPost)
        {

            if($category->load(Yii::$app->request->post()) && $category->validate())
            {
                if($res = $category->save())
                {

                    $this->success('修改成功.','category/index');
                }
                else
                {
                    $this->error('修改失败.');
                }
            }
            else
            {
                $this->error('数据不合法');
            }
        }

        // 下拉菜单
        $categories = Category::getLevelCategories(Category::find()->asArray()->all(),$id);
        $dropDownList = $category->dropDownList($categories);

        return $this->render('update',['category'=>$category,'dropDownList'=>$dropDownList]);
    }



}
