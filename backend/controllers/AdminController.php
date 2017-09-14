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
        $admin = Yii::$app->user->getIdentity();
        $admin->scenario = 'update';
        if(Yii::$app->request->isPost)
        {

            $model->imageFile = UploadedFile::getInstance($model,'imageFile');

            if($model->upload())
            {
                @unlink($admin->avatar);
                $admin->avatar = $model->file;
            }

            if(!$admin->updateAdminInfo())
            {
                echo 'update admin info error.';
            }

        }
        return $this->render('info',['model'=>$model,'admin'=>$admin]);
    }
}
