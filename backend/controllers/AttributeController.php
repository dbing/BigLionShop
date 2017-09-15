<?php

namespace backend\controllers;

use backend\models\GoodsType;
use common\helpers\Tools;
use common\models\Attribute;
use yii;

class AttributeController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $model = (new Attribute())->loadDefaultValues();
        if(Yii::$app->request->isPost)
        {
            if($model->createAttr())
            {
                Tools::success('属性添加成功.',['attribute/index','tid'=>$model->type_id]);
            }
            else
            {
                Tools::error('属性添加失败');
            }
        }

        $typeList = (new GoodsType())->dropDownList();
        return $this->render('create',['model'=>$model,'typeList'=>$typeList]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex($tid)
    {
        $query = Attribute::find()->where('type_id=:tid',['tid'=>$tid]);

        $page = new yii\data\Pagination(['totalCount'=>$query->count(),'defaultPageSize'=>Yii::$app->params['pageSize']]);
        $attrList = $query->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index',['tid'=>$tid,'attrList'=>$attrList,'page'=>$page]);

    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
