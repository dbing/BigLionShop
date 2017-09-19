<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>商品列表</h3>
                <?= Html::beginForm(['goods/index'], 'get');?>
                <div class="pull-right" style="width:960px;">
                    <div class="ui-select">
                        <?= Html::dropDownList('cid', $map['cid'], $catList, ['prompt' => '请选择分类...']);?>
                    </div>
                    <div class="ui-select">
                        <?= Html::dropDownList('bid', $map['bid'], $brandList, ['prompt' => '请选择品牌...']);?>
                    </div>
                    <div class="ui-select">
                        <?= Html::dropDownList('property', $map['property'], ['is_best' => '精品', 'is_new' => '新品', 'is_hot' => '热销', 'is_promote' => '特价'], ['prompt' => '请选择...']);?>
                    </div>
                    <div class="ui-select">
                        <?= Html::dropDownList('sale', $map['sale'], ['1' => '上架', '0' => '下架'], ['prompt' => '销售状态...']);?>
                    </div>
                    <?= Html::textInput('name', $map['name'], ['class' => 'search', 'placeholder' => "商品名关键字....Enter回车搜索"]);?>
                </div>
                <?= Html::endForm();?>
            </div>
            <a href="<?= Url::to(['goods/create'])?>" class="btn-flat success pull-right">
                <span>&#43;</span>
                添加新商品
            </a>
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span2 sortable">
                            商品名
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>单价
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>是否上架
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>是否热卖
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>是否精品
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>是否新品
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>库存
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>是否促销
                        </th>
                        <th class="span1 sortable">
                            <span class="line"></span>促销价
                        </th>
                        <th class="span1 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($goodsList)): foreach ($goodsList as $key => $val): ?>


                        <tr class="first">
                            <td>
                                <img src="<?= $val['goods_img']?>" class="img-circle avatar hidden-phone" />
                                <a href="user-profile.html" class="name"><?= $val['goods_name']?></a>
                                <span class="subtext"><?= $val['goods_brief']?></span>
                            </td>
                            <td>
                                <?= $val['shop_price']?>￥
                            </td>
                            <td>
                                <?= ($val['is_on_sale']) ? '<span class="label label-success">上架</span>' : '<span class="label">下架</span>';?>
                            </td>
                            <td>
                                <?= ($val['is_hot']) ? '<span class="label label-success">是</span>' : '<span class="label">否</span>';?>
                            </td>
                            <td>
                                <?= ($val['is_best']) ? '<span class="label label-success">是</span>' : '<span class="label">否</span>';?>
                            </td>
                            <td>
                                <?= ($val['is_new']) ? '<span class="label label-success">是</span>' : '<span class="label">否</span>';?>
                            </td>
                            <td>
                                <?= $val['goods_number']?>
                            </td>
                            <td>
                                <?= ($val['is_promote']) ? '<span class="label label-success">是</span>' : '<span class="label">否</span>';?>
                            </td>
                            <td>
                                <?= $val['promote_price']?>￥
                            </td>
                            <td class="align-right">
                                <a href="#">相册</a> |
                                <a href="#">货品</a>  <br>
                                <a href="#">修改</a> |
                                <a href="#">回收站</a>
                            </td>
                        </tr>
                    <?php endforeach ; else:?>
                        <table>
                            <tr><h2>暂时没有数据,去添加吧~~~</h2></tr>
                        </table>
                    <?php endif; ?>



                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <?= LinkPager::widget(['pagination' => $page]); ?>
            </div>
        </div>
    </div>
</div>