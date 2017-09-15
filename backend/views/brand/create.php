<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/6
 * @Time:   14:53
 */

use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>
<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>添加新品牌</h3>
            </div>

            <?= $this->render('/common/message');?>
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php $form = ActiveForm::begin([
                        'fieldConfig'=>[
                            'template'=>'<div class="span12 field-box">{label}{input}{error}{hint}</div>'
                        ],
                            'options'=>['class'=>'new_user_form inline-input']
                        ]); ?>

                        <!--
                        <div class="span12 field-box">
                            <label>品牌名:</label>
                            <input class="span9" type="text" />
                        </div>
                        -->

                        <?= $form->field($brand,'brand_name');?>
                        <?= $form->field($brand,'site_url');?>
                        <?= $form->field($brand,'brand_logo');?>
                        <?= $form->field($brand,'is_show')->checkbox([],false);?>

                        <?= $form->field($brand,'sort')->input('text');?>
                        <?= $form->field($brand,'brand_desc')->textarea(['class'=>'span12']);?>

                        <div class="span11 field-box actions">

                            <?= Html::submitButton('Create band',['class'=>'btn-glow primary']) ?>
                            <span>OR</span>

                            <?= Html::resetInput('Cancel',['class'=>'reset'])?>
                        </div>
                        <?php ActiveForm::end();?>


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
                    <p>排序：排序越小越靠前</p>
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
<!-- end main container -->