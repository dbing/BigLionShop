<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/10/16
 * @Time:   14:40
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!-- ========================================= MAIN ========================================= -->
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">登录</h2>
                    <p>Hello, Welcome to your account</p>

                    <div class="social-auth-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
                            </div>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin(['action'=>['site/login'],'id' => 'login-form','options'=>['class'=>"login-form cf-style-1",'role'=>'form']]); ?>
                        <div class="field-row">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'le-input'])->label('用户名') ?>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <?= $form->field($model, 'password')->passwordInput(['class'=>'le-input'])->label('密码'); ?>
                        </div>

                        <div class="field-row clearfix">
                        	<span class="pull-left">
                        		<label class="content-color">
                                    <?= $form->field($model, 'rememberMe')->checkbox(['class'=>'le-checbox auto-width inline']) ?>
                                </label>
                        	</span>
                            <span class="pull-right">
                        		<a href="#" class="content-color bold">Forgotten Password ?</a>
                        	</span>
                        </div>

                        <div class="buttons-holder">
                            <?= Html::submitButton('安全登录', ['class' => 'le-button huge', 'name' => 'login-button']) ?>
                        </div><!-- /.buttons-holder -->

                    <?php ActiveForm::end(); ?>

                </section><!-- /.sign-in -->
            </div><!-- /.col -->

            <div class="col-md-6">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">创建新账户</h2>
                    <p>Create your own Media Center account</p>
                    <?php $form = ActiveForm::begin(['action'=>['site/signup'],'id' => 'form-signup','options'=>['class'=>'register-form cf-style-1','role'=>'form']]); ?>

                        <div class="field-row">
                            <?= $form->field($signupModel, 'username')->textInput(['autofocus' => true,'class'=>'le-input'])->label('用户名'); ?>
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <?= $form->field($signupModel, 'email')->textInput(['class'=>'le-input'])->label('邮箱'); ?>
                        </div>

                        <div class="field-row">
                            <?= $form->field($signupModel, 'password')->passwordInput(['class'=>'le-input'])->label('密码') ?>
                        </div>


                        <div class="buttons-holder">
                            <?= Html::submitButton('注册', ['class' => 'le-button huge', 'name' => 'signup-button']) ?>
                        </div><!-- /.buttons-holder -->
                    <?php ActiveForm::end(); ?>
                    <h2 class="semi-bold">Sign up today and you'll be able to :</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                        <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                        <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
<!-- ========================================= MAIN : END ========================================= -->
