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

use common\models\User;
use yii\data\Pagination;
use yii;


class UserController extends IndexController
{
    public function actionList()
    {
        $query = User::find();

        $page = new Pagination(['defaultPageSize'=>Yii::$app->params['pageSize'],'totalCount'=>$query->count()]);
        $userList = $query->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index',['userList'=>$userList,'page'=>$page]);
    }
}