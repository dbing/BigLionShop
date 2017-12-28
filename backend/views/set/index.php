<?php
/* @var $this yii\web\View */
?>
<div class="content">
    <div class="container-fluid">
        <div class="new-user" id="pad-wrapper">
            <!-- avatar column -->
            <div class="row-fluid header">
                <h3>系统设置</h3>
            </div>

            <!-- edit form column -->
            <div class="span9 personal-info">
                <div class="alert alert-info">
                    <i class="icon-lightbulb"></i>您可以在这里编辑系统配置信息
                </div>

                <div class="row-fluid form-wrapper">
                    <form />
                    <div class="field-box">
                        <label>商店名称:</label>
                        <input class="span5 inline-input" type="text" value="必应商城" />
                    </div>
                    <div class="field-box">
                        <label>商店关键字:</label>
                        <input class="span5 inline-input" type="text" value="必应商城-演示版" />
                    </div>
                    <div class="field-box">
                        <label>商店描述:</label>
                        <input class="span5 inline-input" type="text" value="必应商城-演示版" />
                    </div>

                    <div class="field-box">
                        <label>公司电话:</label>
                        <input class="span5 inline-input" type="text" value="(+800) 123 456 7890" />
                    </div>
                    <div class="field-box">
                        <label>公司邮箱:</label>
                        <input class="span5 inline-input" type="text" value="contact@oursupport.com" />
                    </div>

                    <div class="field-box">
                        <label>ICP备案证书号:</label>
                        <input class="span5 inline-input" type="text" value="alejandra@design.com" />
                    </div>

                    <div class="field-box">
                        <label>商品货号前缀:</label>
                        <input class="span5 inline-input" type="text" value="ECS" />
                    </div>
                    <div class="field-box">
                        <label>缓存存活时间（秒）:</label>
                        <div class="ui-select">
                            <select id="user_time_zone" name="user[time_zone]">
                                <option value="3600" />3600
                                <option value="7200" />7200

                            </select>
                        </div>
                    </div>

                    <div class="field-box">
                        <label>统计代码:</label>
                        <textarea class="span5 inline-input" type="text" value="alejandra@design.com" ></textarea>
                    </div>
                    <div class="span6 field-box actions">
                        <input type="button" class="btn-glow primary" value="保存修改" />
                        <span>或者</span>
                        <input type="reset" value="取消" class="reset" />
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
