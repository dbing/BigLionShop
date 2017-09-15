<?php
use yii\helpers\Url;

?>

<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper">

            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>规格属性列表</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <div class="ui-select">
                            <select>
                                <option />Filter users
                                <option />Signed last 30 days
                                <option />Active users
                            </select>
                        </div>
                        <input type="text" class="search" />
                        <a href="<?= Url::to(['attribute/create','tid'=>$tid])?>" class="btn-flat success new-product">+ 添加属性</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                属性名称
                            </th>
                            <th class="span3">
                                <span class="line"></span>所属类型
                            </th>
                            <th class="span3">
                                <span class="line"></span>类别
                            </th>
                            <th class="span3">
                                <span class="line"></span>可选值列表
                            </th>
                            <th class="span3">
                                <span class="line"></span>排序
                            </th>
                            <th class="span2">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php if(!empty($attrList)): foreach ($attrList as $value): ?>
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <?= $value['attr_name'];?>
                            </td>
                            <td class="description">
                                <?= $value['type_id'];?>
                            </td>
                            <td>
                                <?= ($value['attr_type']) ? '<span class="label label-success">规格</span>': '<span class="label label-info">属性</span>';?>
                            </td>
                            <td><?= $value['attr_values'];?></td>
                            <td>50</td>
                            <td class="align-left">
                                <a href="#">修改</a> |
                                <a href="#">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                            <tr><td colspan="6">没有数据.....</td></tr>
                        <?php endif; ?>
                        <!-- row -->


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->

            <div class="pagination pull-right">
                <?= \yii\widgets\LinkPager::widget(['pagination'=>$page]);?>
            </div>
        </div>
    </div>
</div>
