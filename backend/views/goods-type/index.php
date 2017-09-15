<?php
/* @var $this yii\web\View */
?>
<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="content">
    <div class="container-fluid">
        <div id="pad-wrapper">
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span12">
                        <h4>商品类型</h4>
                    </div>
                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <a href="<?= Url::to(['goods-type/create'])?>" class="btn-flat success new-product">+ 添加商品类型</a>
                    </div>
                </div>

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                类型名
                            </th>
                            <th class="span3">
                                <span class="line"></span>分组
                            </th>
                            <th class="span3">
                                <span class="line"></span>状态
                            </th>
                            <th class="span3">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php if(is_array($typeList) && !empty($typeList)): foreach ($typeList as $value): ?>
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <?= $value['type_name'];?>
                            </td>
                            <td class="description">
                                <?= $value['attr_group'];?>
                            </td>
                            <td><span class="label label-success">Active</span></td>
                            <td class="align-left">
                                <a href="<?=Url::to(['attribute/index','tid'=>$value['type_id']])?>">属性列表</a> |
                                <a href="#">修改</a> |
                                <a href="#">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                            <tr class="first align-center"><td colspan="4" >没有数据...</td></tr>
                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end products table -->

            <div class="pagination pull-right">
                <?= LinkPager::widget(['pagination'=>$page]);?>
            </div>
        </div>
    </div>
</div>