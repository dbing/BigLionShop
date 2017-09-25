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
    <div class="span6 column">
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
    <div class="span6 column pull-right">
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


<div class="span8 field-box actions pull-right">
    <?= \yii\helpers\Html::submitButton('确认保存',['class'=>'btn-glow primary']);?>
</div>




