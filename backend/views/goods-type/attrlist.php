<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/22
 * @Time:   16:03
 */
?>


    <!-- 属性 -->
    <div class="span4 column">
        <label class="label">属性列表</label>
        <?php if(!empty($attrs['attr'])): foreach ($attrs['attr'] as $value): ?>
            <?php if(empty($value['attr_values'])): ?>
                <div class="field-box">
                    <label><?= $value['attr_name'];?>:</label>
                    <input class="span5" name="attr_value[<?= $value['attr_id']; ?>]" type="text" />
                </div>
            <?php else: ?>
                <div class="field-box">
                    <label><?= $value['attr_name'];?>:</label>
                    <div class="ui-select">
                        <select name="attr_value[<?= $value['attr_id']; ?>]">
                            <?php foreach ($value['attr_values'] as $v):?>
                            <option value="<?= $v;?>"><?= $v;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            <?php endif; ?>

        <?php endforeach; endif; ?>

    </div>

    <!-- 规格 -->
    <div class="span4 column">
        <label class="label">规格列表</label>
        <?php if(!empty($attrs['spec'])): foreach ($attrs['spec'] as $value): ?>

            <?php if(empty($value['attr_values'])): ?>
            <div class="field-box">
                <label><?= $value['attr_name'];?>:</label>
                <input class="span5" name="attr_value[<?= $value['attr_id']; ?>]" type="text" />
            </div>
            <?php else: ?>
            <div class="field-box">
                <label><?= $value['attr_name'];?>:</label>
                <div class="ui-select">
                    <select name="attr_value[<?= $value['attr_id']; ?>][]">
                        <?php foreach ($value['attr_values'] as $v):?>
                            <option value="<?= $v;?>"><?= $v;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <span class="btn-flat create-spec">+</span>
            </div>
            <?php endif; ?>
        <?php endforeach; endif; ?>
    </div>
    <div class="span4 column pull-right select-attribute">
        <div class="attribute-title">
            <label class="label label-success">已选规格</label>
            <label class="label">已选属性</label>
        </div>

        <!-- 已选择规格 -->
        <div class="row-fluid">
            <?php if(!empty($selectedAttrs['spec'])): foreach ($selectedAttrs['spec'] as $key=>$val):?>
            <div class="field-box">
                <label><?=$key?>:</label>
                <?php if(!empty($val)): foreach ($val as $k=>$v):?>
                <div class="btn-flat icon">
                    <i class="icon-remove" data-content="<?=$k;?>"></i> <?=$v;?>
                </div>
                <?php endforeach;endif;?>
            </div>
            <?php endforeach;else: ?>
                还未选择规格
            <?php endif;?>


    </div>
    <!-- 已选择属性 -->
    <div class="row-fluid" style="display:none;">

        <table class="table table-hover">
            <thead>
            <tr>
                <th>
                    <span class="line"></span>操作
                </th>
                <th>
                    <span class="line"></span>属性名
                </th>
                <th>
                    <span class="line"></span>属性值
                </th>
            </tr>
            </thead>
            <tbody>
            <!-- row -->
            <?php if(!empty($selectedAttrs['attr'])): foreach ($selectedAttrs['attr'] as $key=>$val):?>
            <tr>
                <td>
                    <a href="#" data-content="<?= $val['goods_attr_id'];?>"><i class="icon-remove"></i></a>
                </td>
                <td><?= $val['attr_name'];?>：</td>
                <td><?= $val['attr_value'];?></td>

            </tr>
            <?php endforeach;else: ?>
                还未选择属性
            <?php endif;?>
            <!-- row -->

            </tbody>
        </table>
    </div>

</div>


<div class="span8 field-box actions pull-right">
    <?= \yii\helpers\Html::submitButton('确认保存',['class'=>'btn-glow primary']);?>
</div>




