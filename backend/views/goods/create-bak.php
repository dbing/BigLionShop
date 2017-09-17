<?php
/* @var $this yii\web\View */
?>

<!-- libraries -->
<link href="/statics/css/lib/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet"
      xmlns="http://www.w3.org/1999/html"/>
<link href="/statics/css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/select2.css" type="text/css" rel="stylesheet" />
<link href="/statics/css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />


<!-- this page specific styles -->
<link rel="stylesheet" href="/statics/css/compiled/form-showcase.css" type="text/css" media="screen" />


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span8 column">
                    <form />
                    <div class="field-box">
                        <label>商品名称:</label>
                        <input class="span8 inline-input" placeholder="描述下商品" type="text" />
                    </div>
                    <div class="field-box">
                        <label>推广热词:</label>
                        <input class="span8 inline-input" placeholder="推广词" type="text" />
                    </div>
                    <div class="field-box">
                        <label>本店价:</label>
                        <input class="span8 inline-input" type="text" placeholder="本店售价"/>
                    </div>
                    <div class="field-box">
                        <label>促销价:</label>
                        <input class="span8 inline-input" type="text" placeholder="促销价"/>
                    </div>

                    <div class="field-box">
                        <label>促销开始时间:</label>
                        <input type="text" value="03/29/2014" class="input-large datepicker" />
                    </div>
                    <div class="field-box">
                        <label>促销结束时间:</label>
                        <input type="text" value="03/29/2014" class="input-large datepicker" />
                    </div>


                    <div class="field-box">
                        <label>商品库存:</label>
                        <input class="span8 inline-input" type="text" placeholder="库存"/>
                    </div>
                    <div class="field-box">
                        <label>商品主图:</label>
                        <input class="span8 inline-input" type="file" placeholder="主图"/>
                    </div>
                    <div class="field-box">
                        <label>详情描述:</label>
                        <div class="wysi-column">
                            <textarea id="wysi" class="span10 wysihtml5" rows="5"></textarea>
                        </div>
                    </div>
                    </form>
                </div>

                <!-- right column -->
                <div class="span4 column pull-right">
                    <form />
                    <div class="field-box">
                        <label>选择分类:</label>
                        <div class="ui-select">
                            <select>
                                <option selected="" />红豆派
                                <option />大米派
                                <option />测试类
                            </select>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>选择品牌:</label>
                        <select style="width:250px" class="select2">
                            <option />
                            <option value="AK" />Alaska
                            <option value="HI" />Hawaii
                            <option value="CA" />California
                            <option value="NV" />Nevada
                            <option value="OR" />Oregon
                            <option value="WA" />Washington
                            <option value="AZ" />Arizona
                            <option value="CO" />Colorado
                        </select>
                    </div>
                    <div class="field-box">
                        <label>加入推荐:</label>
                        <label class="checkbox">
                            <input type="checkbox" /> 热卖
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" /> 新品
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" /> 精品
                        </label>
                    </div>
                    <div class="field-box">
                        <label>上架:</label>
                        <input type="radio" name="optionsRadios"  value="option1"  />
                        立即发布
                        <input type="radio" name="optionsRadios" value="option2" />
                        稍后发布
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->

<!-- scripts for this page -->
<script src="/statics/js/wysihtml5-0.3.0.js"></script>
<script src="/statics/js/jquery-latest.js"></script>
<script src="/statics/js/bootstrap.min.js"></script>
<script src="/statics/js/bootstrap-wysihtml5-0.0.2.js"></script>
<script src="/statics/js/bootstrap.datepicker.js"></script>
<script src="/statics/js/jquery.uniform.min.js"></script>
<script src="/statics/js/select2.min.js"></script>
<script src="/statics/js/theme.js"></script>

<!-- call this page plugins -->
<script type="text/javascript">
    $(function () {

        // add uniform plugin styles to html elements
        $("input:checkbox, input:radio").uniform();

        // select2 plugin for select elements
        $(".select2").select2({
            placeholder: "Select a State"
        });

        // datepicker plugin
        $('.datepicker').datepicker().on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });

        // wysihtml5 plugin on textarea
        $(".wysihtml5").wysihtml5({
            "font-styles": false
        });
    });
</script>

