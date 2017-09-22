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

<form class="new_user_form inline-input" >
    <!-- 属性 -->
    <div class="span6 column">
        <?php if(!empty($attrs['attr'])): foreach ($attrs['attr'] as $value): ?>
            <?php if(empty($value['attr_values'])): ?>
                <div class="field-box">
                    <label><?= $value['attr_name'];?>:</label>
                    <input class="span5" type="text" />
                </div>
            <?php else: ?>
                <div class="field-box">
                    <label><?= $value['attr_name'];?>:</label>
                    <div class="ui-select">
                        <select>
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
                <input class="span5" type="text" />
            </div>
            <?php else: ?>
            <div class="field-box">
                <label><?= $value['attr_name'];?>:</label>
                <div class="ui-select">
                    <select>
                        <?php foreach ($value['attr_values'] as $v):?>
                            <option value="<?= $v;?>"><?= $v;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <span class="btn-flat">+</span>
            </div>
            <?php endif; ?>
        <?php endforeach; endif; ?>
        <!-- demo -->
        <div class="field-box">
            <label>颜色:</label>
            <div class="ui-select">
                <select>
                    <option selected="">土豪金</option>
                    <option>星空灰</option>
                    <option>玫瑰红</option>
                </select>
            </div>
            <span class="btn-flat">&#8722;</span>
        </div>

    </div>



</form>

<div class="span8 field-box actions pull-right">
    <input type="button" class="btn-glow primary" value="确认保存" />
</div>
