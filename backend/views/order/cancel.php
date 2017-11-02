<?php
/* @var $this yii\web\View */
?>

<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>取消订单</h3>
            </div>

            <?= $this->render('/common/message');?>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <!--<form class="new_user_form inline-input" />-->
                        <?= \yii\helpers\Html::beginForm(['order/cancel','oid'=>$oid],'post',['class'=>'new_user_form inline-input']);?>

                        <div class="span12 field-box">
                            <label>退款方式:</label>
                            <?= \yii\helpers\Html::radioList('cancel_type',$type,['SEND_BACK'=>'原路退回','MONEY_BACK'=>'退回用户余额','NOT_DO'=>'不处理,误操作']);?>
                        </div>


                        <div class="span12 field-box textarea">
                            <label>操作备注:</label>
                            <?= \yii\helpers\Html::textarea('xxx','',['class'=>'span9']);?>
                            <span class="charactersleft">剩余90个字符。字段限制在254个字符</span>
                        </div>
                        <div class="span11 field-box actions">
                            <?= \yii\helpers\Html::submitButton('确认取消',['class'=>'btn-glow primary']);?>
                            <span>OR</span>
                            <input type="reset" value="Cancel" class="reset" />
                        </div>


                        <?= \yii\helpers\Html::endForm();?>
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
                    <h6>温馨提示：</h6>
                    <p>请正确填写发货单号，否则无法正确获取物流信息。</p>
                    <p>选择下列快速通道:</p>
                    <ul>
                        <li><a href="#">订单列表</a></li>
                        <li><a href="#">控制台</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->
