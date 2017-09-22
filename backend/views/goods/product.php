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
                    <div class="attr_list">

                    </div>



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

                <div class="row-fluid">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="span3">
                                <input type="checkbox" />
                                <span class="line"></span>颜色
                            </th>
                            <th class="span3">
                                <span class="line"></span>内存
                            </th>
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
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                土豪金
                            </td>
                            <td>
                                4G
                            </td>
                            <td><span class="label label-success">ECS000063</span></td>
                            <td>888￥</td>
                            <td>110</td>
                            <td class="align-left">
                                <span class="btn-flat new-product">&#8722;</span>
                            </td>
                        </tr>
                        <!-- row -->
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                土豪金
                            </td>
                            <td>
                                8G
                            </td>
                            <td><span class="label label-success">ECS000064</span></td>
                            <td>666￥</td>
                            <td>110</td>
                            <td class="align-left">
                                <span class="btn-flat new-product">&#8722;</span>
                            </td>
                        </tr>
                        <!-- row -->
                        <tr class="first">
                            <td>
                                <input type="checkbox" />
                                <div class="ui-select">
                                    <select>
                                        <option />土豪金
                                        <option />星空灰
                                        <option />玫瑰红
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="ui-select">
                                    <select>
                                        <option />4G
                                        <option />8G
                                        <option />16G
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="text" class="span10">
                            </td>
                            <td><input type="text" class="span5"></td>
                            <td><input type="text" class="span5"></td>
                            <td class="align-left">
                                <span class="btn-flat new-product">+</span>
                            </td>
                        </tr>
                        <!-- row -->


                        </tbody>
                    </table>

                    <div class="span8 field-box actions pull-right">
                        <input type="button" class="btn-glow primary" value="确认保存" />
                    </div>

                </div>
            </div>
            <!-- end products table -->
        </div>
    </div>
</div>
<!-- end main container -->

<script>
    $(function () {


        
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
