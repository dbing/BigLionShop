<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/12
 * @Time:   14:50
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<!-- main container .wide-content is used for this layout without sidebar :)  -->
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<div class="content wide-content">
    <div class="container-fluid">
        <div class="settings-wrapper" id="pad-wrapper">
            <!-- avatar column -->
            <div class="span3 avatar-box">
                <div class="personal-image">
                    <img src="/statics/img/personal-info.png" class="avatar img-circle" />
                    <p>上传您的头像...</p>
                    <?= $form->field($model, 'imageFile')->fileInput()->label(''); ?>
                </div>
            </div>

            <!-- edit form column -->
            <div class="span7 personal-info">
                <div class="alert alert-info">
                    <i class="icon-lightbulb"></i>您可以在这里编辑您的个人信息
                </div>
                <h5 class="personal-title">个人信息</h5>

                <form />

                <div class="field-box">
                    <label>用户名:</label>
                    <input class="span5 inline-input" type="text" value="alegalvan" />
                </div>
                <div class="field-box">
                    <label>电子邮箱:</label>
                    <input class="span5 inline-input" type="text" value="alejandra@design.com" />
                </div>
                <div class="field-box">
                    <label>密码:</label>
                    <input class="span5 inline-input" type="password" value="blablablabla" />
                </div>
                <div class="field-box">
                    <label>确认密码:</label>
                    <input class="span5 inline-input" type="password" value="blablablabla" />
                </div>
                <div class="span6 field-box actions">

                    <?= Html::submitButton('保存修改',['class'=>'btn-glow primary']); ?>
                    <span>或者</span>
                    <?= Html::resetInput('取消',['class'=>'reset']);?>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>
<!-- end main container -->
