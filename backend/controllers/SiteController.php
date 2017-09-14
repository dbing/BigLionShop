<?php
namespace backend\controllers;

use backend\models\Admin;
use common\helpers\Tools;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * ACF 认证
     *
     * @inheritdoc
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','reset-pwd','send-mail','test'],
                        'allow' => true,
                        'roles' =>['?']         // 所有用户
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],       // @ 已认证用户
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionDemo()
    {
        echo 'demo';
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->redirect(['index/index']);
//        return $this->render('index');
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'signin';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
            $this->redirect(['index/index']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSendMail()
    {
        $this->layout = 'signin';
        $admin = new Admin(['scenario'=>'sendmail']);
        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            if($admin->load($post) && $admin->validate())
            {

                // 1.验证Email 是否存在
                $adminOne = Admin::findOne(['email'=>$admin->email]);
                if($adminOne)
                {
                    $timestamp = time();
                    $token = $this->createToken($timestamp,$admin->email);

                    // 2.发送Email
                     $res = Yii::$app->mailer->compose('passwordreset',['timestamp'=>$timestamp,'email'=>$admin->email,'token'=>$token,'adminname'=>$admin->username])
                         ->setFrom('bingphp@163.com')
                         ->setTo($admin->email)
                         ->setSubject('BigLion商城找回密码.')
                         ->send();

                    Tools::success('发送Email成功，请查收.','',false);
                }
                else
                {
                    $admin->addError('email','Email 不存在.请三思.');
                }
            }

        }

        return $this->render('reset-pwd',['admin'=>$admin]);
    }

    /**
     * 邮箱重置密码
     */
    public function actionResetPwd()
    {
        $this->layout = 'signin';

        // 效验URL是否是我们服务器发送的
        // 1. 效验时间 5分以内
        $timestamp = Yii::$app->request->get('timestamp');
        $email = Yii::$app->request->get('email');
        $token = Yii::$app->request->get('token');


        if((time() - $timestamp) > 1800)
        {
            Tools::error('连接已经失效.','',false);
            $this->redirect(['site/send-mail']);
        }

        $myToken = $this->createToken($timestamp,$email);
        if($myToken != $token)
        {

            Tools::error('有问题,小伙子，不要搞事情.','',false);
            $this->redirect(['site/send-mail']);
        }
        $admin = Admin::findOne(['email'=>$email]);
        $admin->scenario = 'resetpwd';

        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            if($admin->load($post) && $admin->validate())
            {
                // 重置
                $admin->setPassword($admin->password);
                if($admin->save())
                {
                    Tools::success('密码修改成功.','site/login');
                }
                else
                {
                    Tools::error('密码修改失败.','',false);
                }
            }

        }

        return $this->render('get-reset-pwd',['admin'=>$admin]);
    }


    protected function createToken($time,$email)
    {
        return md5(base64_encode(Yii::$app->request->userIP) . base64_encode($email) .base64_encode($time));
    }

}
