<?php
/* @var $this yii\web\View */
?>
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>新增商品类型</h3>
            </div>

            <?= $this->render('/common/message');?>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form = \yii\widgets\ActiveForm::begin(['options'=>['class'=>'new_user_form inline-input']]);?>
                        <div class="span12 field-box">
                            <?= $form->field($model,'type_name')->textInput(['class'=>'span9']);?>
                        </div>

                        <div class="span12 field-box textarea">
                            <?= $form->field($model,'attr_group')->textarea(['class'=>'span9']);?><span class="charactersleft">每行一个商品属性组，排序也将按照自然顺序排序。</span>
                        </div>
                        <div class="span11 field-box actions">
                            <?= \yii\helpers\Html::submitButton('添加',['class'=>'btn-glow primary'])?>
                            <span>OR</span>
                            <?= \yii\helpers\Html::resetInput('重置',['class'=>'reset'])?>
                        </div>
                        <?php \yii\widgets\ActiveForm::end();?>
                    </div>
                </div>

                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="btn-group toggle-inputs hidden-tablet">
                        <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                        <button class="glow right" data-input="normal">NORMAL INPUTS</button>
                    </div>
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        点击上面看到内联和正常输入表单上的区别
                    </div>
                    <h6>侧边栏文本说明</h6>
                    <p>按Enter键，录入多个商品属性组</p>
                    <p>选择下列快速通道:</p>
                    <ul>
                        <li><a href="#">品牌列表</a></li>
                        <li><a href="#">分类列表</a></li>
                        <li><a href="#"发布商品</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>