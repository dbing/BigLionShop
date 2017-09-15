<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/6
 * @Time:   14:53
 */

use yii\helpers\Url;
?>

<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>品牌列表</h3>
                <div class="span10 pull-right">

                    <?= \yii\helpers\Html::beginForm(['brand/list'],'get')?>

                    <input type="text" value="<?=$brandName;?>" class="span5 search" name="brand_name" placeholder="Search brand name..." />
                    <div class="ui-dropdown">
                        <input type="submit" class="btn" value="Search">
<!--                        <button class="btn">Search</button>-->
                    </div>
                    <?= \yii\helpers\Html::endForm(); ?>


                    <a href="<?= Url::to(['brand/create']);?>" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        添加新品牌
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable">
                            品牌名/简短描述
                        </th>

                        <th class="span2 sortable">
                            <span class="line"></span>排序
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>是否展示
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    <!-- row -->
                    <?php foreach ($brands as $brand): ?>
                    <tr class="first">
                        <td>
                            <img src="<?= $brand->brand_logo;?>" class="img-circle avatar thumbnail hidden-phone" />
                            <a href="<?= $brand->site_url;?>" class="name" target="_blank"><?= $brand->brand_name;?></a>
                            <span class="subtext"><?= $brand->brand_desc;?></span>
                        </td>
                        <td><?= $brand->sort;?></td>
                        <td>
                            <?= ($brand->is_show) ? '<span class="label label-success">是</span>' : '<span class="label label-default">否</span>'; ?>
                        </td>
                        <td class="align-right">
                            <a href="<?= URL::to(['brand/update','id'=>$brand->brand_id])?>">修改</a> |
                            <a href="<?= URL::to(['brand/delete','id'=>$brand->brand_id])?>">回收站</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- row -->


                    </tbody>
                </table>
            </div>



            <div class="pagination pull-right">
                <?= \yii\widgets\LinkPager::widget(['pagination'=>$page])?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->