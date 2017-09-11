<?php
/* @var $this yii\web\View */
?>
<link rel="stylesheet" href="/statics/css/compiled/new-user.css" type="text/css" media="screen" />
<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加新分类</h3>
            </div>

            <?= $this->render('/common/message');?>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <!--                            <form class="new_user_form inline-input" />-->
                        <?php $form = \yii\widgets\ActiveForm::begin([
                            'options'=>['class'=>'new_user_form inline-input'],
                        ]);?>

                        <div class="span12 field-box">
                            <?= $form->field($category,'parent_id')->dropDownList(['0'=>'一级分类','1'=>'二级分类'],['prompt'=>'顶级分类'])?>
                        </div>

                        <div class="span12 field-box">
                            <?= $form->field($category,'is_show')->radioList(['0'=>'否','1'=>'是']); ?>
                        </div>

                        <div class="span12 field-box">
                            <?= $form->field($category,'cat_name')->textInput(['class'=>'span9']);?>
                        </div>

                        <div class="span12 field-box">
                            <?= $form->field($category,'sort')->textInput(['class'=>'span9']);?>
                        </div>


                        <div class="span11 field-box actions">
                            <?= \yii\helpers\Html::submitButton('添加',['class'=>'btn-glow primary'])?>
                            <span>或者</span>
                            <?= \yii\helpers\Html::resetButton('取消',['class'=>'btn-glow reset'])?>

                        </div>
                        <?php \yii\widgets\ActiveForm::end();?>
                    </div>
                </div>

                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">

                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        请在左侧填写分类相关信息，包括分类名、上级分类、排序
                    </div>
                    <h6>重要提示：</h6>
                    <p>排序越小越靠前</p>
                    <p>选不填写，默认排序100</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end main container -->