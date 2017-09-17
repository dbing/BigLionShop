<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/17
 * @Time:   8:20
 */
?>


<!-- libraries -->
<link href="/statics/css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet"
      xmlns="http://www.w3.org/1999/html"/>
<link href="/statics/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/select2.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />

<!-- this page specific styles -->
<link rel="stylesheet" href="/statics/css/compiled/form-showcase.css" type="text/css" media="screen" />



<!-- main container -->
<div class="content">
    <div class="container-fluid">

        <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],
                'fieldConfig'=>
                    ['template'=>'<div class="field-box">{label}{input}{error}</div>']
            ]
        );?>
        <div id="pad-wrapper" class="form-page">
            <?= $this->render('/common/message');?>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span8 column">


                    <?= $form->field($goods,'goods_name')->textInput(['class'=>'span8 inline-input','placeholder'=>'描述下商品']);?>
                    <?= $form->field($goods,'goods_brief')->textInput(['class'=>'span8 inline-input','placeholder'=>'推广词']);?>
                    <?= $form->field($goods,'market_price')->textInput(['class'=>'span8 inline-input','placeholder'=>'市场售价']);?>
                    <?= $form->field($goods,'shop_price')->textInput(['class'=>'span8 inline-input','placeholder'=>'本店售价']);?>
                    <?= $form->field($goods,'promote_price')->textInput(['class'=>'span8 inline-input','placeholder'=>'促销价']);?>
                    <?= $form->field($goods,'promote_start_date')->textInput(['class'=>'input-large datepicker','placeholder'=>'促销开始时间']);?>
                    <?= $form->field($goods,'promote_end_date')->textInput(['class'=>'input-large datepicker','placeholder'=>'促销结束时间']);?>
                    <?= $form->field($goods,'goods_number')->textInput(['class'=>'span8 inline-input','placeholder'=>'商品库存']);?>
                    <?= $form->field($upload,'imageFile')->fileInput(['class'=>'span8 inline-input','placeholder'=>'主图'])->label('商品主图');?>
                    <?= $form->field($goods,'goods_desc')->textarea(['class'=>'span10 wysihtml5','id'=>'wysi','rows'=>5]);?>

                </div>

                <!-- right column -->
                <div class="span4 column pull-right">

                    <?= $form->field($goods,'cat_id',['template'=>'<div class="field-box">{label}<div class="ui-select">{input}</div>{error}</div>'])->dropDownList([0=>'测试数据1',1=>'测试数据2'],['prompt'=>'请选择分类'])?>
                    <?= $form->field($goods,'brand_id')->dropDownList([0=>'测试品牌1',1=>'测试品牌2'],['prompt'=>'','class'=>'select2','style'=>'width:250px']);?>

                    <div class="field-box">
                        <label>加入推荐:</label>
                        <?= $form->field($goods,'is_hot',['template'=>'{label}{input}{error}'])->checkbox();?>
                        <?= $form->field($goods,'is_new',['template'=>'{label}{input}{error}'])->checkbox();?>
                        <?= $form->field($goods,'is_best',['template'=>'{label}{input}{error}'])->checkbox();?>
                    </div>
                    <?= $form->field($goods,'is_on_sale')->radioList([1=>'立即上架',0=>'稍后上架']);?>
                    <?= \yii\helpers\Html::submitButton('确认添加',['class'=>'btn btn-primary']);?>
                    <?= \yii\helpers\Html::resetButton('取消重置',['class'=>'btn btn-default']);?>

                </div>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end();?>
    </div>
</div>
<!-- end main container -->

<!-- scripts for this page -->
<script src="/statics/js/wysihtml5-0.3.0.js"></script>

<script src="/statics/js/bootstrap-wysihtml5-0.0.2.js"></script>
<script src="/statics/js/bootstrap.datepicker.js"></script>
<script src="/statics/js/jquery.uniform.min.js"></script>
<script src="/statics/js/select2.min.js"></script>

<!-- call this page plugins -->
<script type="text/javascript">
    $(function () {

        // add uniform plugin styles to html elements
        $("input:checkbox, input:radio").uniform();

        // select2 plugin for select elements
        $(".select2").select2({
            placeholder: "Select a State"
        });

        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        // wysihtml5 plugin on textarea
        $(".wysihtml5").wysihtml5({
            "font-styles": false
        });
    });
</script>

