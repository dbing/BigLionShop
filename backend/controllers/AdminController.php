<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/12
 * @Time:   14:48
 */

namespace backend\controllers;

use yii;
use common\models\UploadForm;
use yii\web\UploadedFile;

class AdminController extends IndexController
{
    public function actionInfo()
    {
        $model = new UploadForm();

        if(Yii::$app->request->isPost)
        {
            $model->imageFile = UploadedFile::getInstance($model,'imageFile');
            $res = $model->upload();
            var_dump($res);
        }
        return $this->render('info',['model'=>$model]);
    }
}
