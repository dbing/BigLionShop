<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/22
 * @Time:   15:32
 */

?>

<!-- main container -->
<div class="content">

    
    <div class="container-fluid">

        <div id="pad-wrapper">

            <div class="row-fluid head">
                <div class="span5">
                    <h5>商品属性规格</h5>
                </div>
                <div class="span7">
                    <h5>商品名称：<?= $gname;?></h5>
                </div>
            </div>

            <div class="row-fluid filter-block">
                <div class="pull-right">
                    <!-- <a href="good-type-add.html" class="btn-flat success">+</a> -->
                </div>
            </div>

            <div class="row-fluid">

                <div class="container">
                    <label>商品类型:</label>
                    <?= \yii\helpers\Html::dropDownList('type_id','',$typeList,['prompt'=>'请选择...','style'=>'height:30px;']);?>

                    <label class="label">请选择商品的所属类型，进而完善此商品的属性</label>
                    <hr>

                    <?= \yii\helpers\Html::beginForm(['goods/product','act'=>'attr','gid'=>$gid],'post',['class'=>'new_user_form inline-input']);?>

                    <div class="attr_list">

                    </div>
                    <?= \yii\helpers\Html::endForm();?>


                </div>



            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div id="pad-wrapper">

            <!-- products table-->
            <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
            <div class="table-wrapper products-table section">
                <div class="row-fluid head">
                    <div class="span5">
                        <h5>货品组合列表</h5>
                    </div>

                </div>

                <div class="row-fluid filter-block">
                    <div class="pull-right">
                        <a href="good-type-add.html" class="btn-flat success new-product">返回列表</a>
                    </div>
                </div>

                <?= \yii\helpers\Html::beginForm(['goods/product','act'=>'product','gid'=>$gid],'post');?>
                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <?php if(!empty($specsList)): foreach ($specsList as $key=>$value): ?>
                            <th class="span3">
                                <span class="line"></span><?=$key;?>
                            </th>
                            <?php endforeach;endif; ?>

                            <th class="span3">
                                <span class="line"></span>货号
                            </th>
                            <th class="span3">
                                <span class="line"></span>价格
                            </th>
                            <th class="span3">
                                <span class="line"></span>库存
                            </th>
                            <th class="span3">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row -->
                        <?php if (!empty($products)): foreach ($products as $value):?>
                        <tr class="first">
                            <?php foreach ($value['attr_list_val'] as $v):?>
                            <td>
                                <?=$v;?>
                            </td>
                            <?php endforeach;?>

                            <td><span class="label label-success"><?=$value['product_sn'];?></span></td>
                            <td><?=$value['product_price'];?>￥</td>
                            <td><?=$value['product_num'];?></td>
                            <td class="align-left">
                                <span class="btn-flat new-product">&#8722;</span>
                            </td>
                        </tr>
                        <?php endforeach;endif;?>
                        <!-- row -->

                        <tr class="first">

                            <?php if(!empty($specsList)): foreach ($specsList as $key=>$value): ?>
                            <td>
                                <div class="ui-select">
                                    <?=\yii\helpers\Html::dropDownList('row[1][attr_list][]','',$value);?>
                                </div>
                            </td>
                            <?php endforeach;endif; ?>
                            <td>
                                <input type="text" name="row[1][product_sn]" class="span10">
                            </td>
                            <td><input type="text" name="row[1][product_price]" class="span5"></td>
                            <td><input type="text" name="row[1][product_num]" class="span5"></td>
                            <td class="align-left">
                                <span class="btn-flat new-product create-product">+</span>
                            </td>
                        </tr>
                        <!-- row -->


                        </tbody>
                    </table>

                    <div class="span8 field-box actions pull-right">
                        <?= \yii\helpers\Html::submitButton('确认保存',['class'=>'btn-glow primary'])?>
                    </div>

                </div>
                <?= \yii\helpers\Html::endForm();?>
            </div>
            <!-- end products table -->
        </div>
    </div>
</div>
<!-- end main container -->

<script>
    $(function () {

        _index = 1;     // 货品组合的下拉索引

        /**
         * 新增货品组合
         */
        $(document).on('click','.create-product', function () {
            _index += 1;
            var _this = $(this);
            var row = _this.parents('tr').clone();
            row.find('span').html('&#8722;').removeClass('create-product').addClass('delete-product');
            var rowHtml = row.html();
            var patt = /row\[(\d+)\]/g;

            _this.parents('tr').after('<tr class="first">'+rowHtml.replace(patt,'row['+_index+']')+'</tr>');

        });

        /**
         * 移除货品组合
         */
        $(document).on('click','.delete-product', function () {
            $(this).parents('tr').remove();
        });


        /**
         * 移除规格
         */
        $(document).on('click','.btn',function () {
            $(this).parent().remove();
        });

        /**
         * 新增规格
         */
        $(document).on('click','.create-spec',function () {
            var parent = $(this).parent();
            var node = parent.clone();
            node.children('span').html('&#8722;').removeClass('create-spec').addClass('btn');
            console.log('-----');
            parent.after(node);
        });

        /**
         * 根据商品类型获取属性规格
         */
        $('select[name="type_id"]').change(function () {

            var tid = $(this).val();
            var url = "<?= \yii\helpers\Url::to(['goods-type/get-attr-by-type-id'])?>";
            $.get(url,{'tid':tid},function (res) {

                console.log(res);
                $('.attr_list').html(res);

            });


        })
    })
</script>
