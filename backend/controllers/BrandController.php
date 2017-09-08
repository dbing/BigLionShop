<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/6
 * @Time:   14:52
 */

namespace backend\controllers;

use yii;
use common\models\Brand;
use yii\web\Controller;
use yii\data\Pagination;

class BrandController extends Controller
{
    public $layout = 'main';

    /**
     * 品牌列表
     *
     * @return string
     */
    public function actionList()
    {
        $brandName = Yii::$app->request->get('brand_name','');

        // where barnd_name like '%%'
        $map = empty($brandName) ? [] : ['like','brand_name',$brandName];
        $query = Brand::find()->where($map);
        $page = new Pagination(['defaultPageSize'=>Yii::$app->params['pageSize'],'totalCount'=>$query->count()]);
        $brands = $query->offset($page->offset)->limit($page->limit)->all();

        return $this->render('list',['brands'=>$brands,'page'=>$page,'brandName'=>$brandName]);
    }

    /**
     * 品牌添加
     *
     * @return string
     */
    public function actionCreate()
    {
        $brand = new Brand();
        if(Yii::$app->request->isPost)
        {
            $post = yii::$app->request->post();

            if($brand->load($post) && $brand->validate())
            {
                $res = $brand->save();
                if($res)
                {
                    $this->success('添加品牌成功');
                }
                else
                {
                    $this->error('添加品牌失败');
                }

            }
        }
        $brand->is_show = 1;
        return $this->render('create',['brand'=>$brand]);
    }

    /**
     * 品牌修改
     *
     * @param $id       品牌ID
     * @return string
     */
    public function actionUpdate($id)
    {
        $brand = Brand::findOne($id);

        if(Yii::$app->request->isPost)
        {

            if($brand->load(Yii::$app->request->post()) && $brand->validate())
            {
                $res = $brand->save();
                var_dump($res);
                if($res)
                {
                    $this->success('修改成功.','brand/list',5);
                }
                else
                {
                    $this->error('没有修改或修改失败');
                }
            }
            else
            {
                $this->error('数据不合法.');
            }
        }

        return $this->render('update',['brand'=>$brand]);
    }

    /**
     * 品牌删除
     *
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id',0);
        // 验证该品牌是否被商品使用

        $brand = Brand::findOne($id);

        if($brand->delete())
        {
            $this->redirect(['brand/list']);
        }
        else
        {
            die('delete Fail');
        }

    }

    protected function success($msg='',$url='',$wait=3)
    {
        $url = !empty($url) ? yii\helpers\Url::toRoute($url) : '';
        Yii::$app->session->setFlash('alerts',['msg'=>$msg,'url'=>$url,'state'=>1,'wait'=>$wait]);
    }

    protected function error($msg,$url='',$wait=3)
    {
        $url = !empty($url) ? yii\helpers\Url::toRoute($url) : '';
        Yii::$app->session->setFlash('alerts',['msg'=>$msg,'url'=>$url,'state'=>0,'wait'=>$wait]);
    }
}