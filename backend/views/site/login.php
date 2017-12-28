<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="row-fluid login-wrapper">
    <a class="brand" href="index.html"></a>

    <div class="span4 box">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <div class="content-wrap">
            <h6>必应商城 - 后台管理</h6>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'class'=>'span12','placeholder'=>'管理员账号'])->label(''); ?>

            <?= $form->field($model, 'password')->passwordInput(['class'=>'span12','placeholder'=>'管理员密码'])->label(''); ?>

            <a href="<?=\yii\helpers\Url::to(['site/send-mail']);?>" class="forgot">忘记密码?</a>
            <div class="remember">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('记住我') ?>
            </div>

            <?= Html::submitButton('登录', ['class' => 'btn-glow primary login', 'name' => 'login-button']) ?>

        </div>
        <?php ActiveForm::end(); ?>
    </div>

    <div class="span4 no-account">
        <p>Copyright &copy; 必应学院</p>

    </div>
</div>