<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/19
 * @Time:   23:04
 */

?>

<!-- this page specific styles -->
<link rel="stylesheet" href="/statics/css/compiled/gallery.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/statics/layui/css/layui.css" type="text/css"/>


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="gallery">
            <div class="row-fluid header">
                <h3>商品名称：<?= $gname;?></h3>
            </div>

            <!-- gallery wrapper -->
            <div class="gallery-wrapper">
                <div class="row gallery-row">

                    <!-- single image -->
                    <?php if(!empty($galleries)): foreach ($galleries as $value):?>
                    <div class="span3 img-container">
                        <div class="img-box">
                                <span class="icon edit">
                                    <i class="gallery-edit"></i>
                                </span>
                            <span class="icon trash">
                                    <i class="gallery-trash"></i>
                                </span>
                            <img src="<?= $value['url'];?>" />
                            <p class="title">
                                <?= $value['img_desc'];?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>

                    <!-- new image button -->

                    <div class="span3 new-img">
                        <img src="/statics/img/new-gallery-img.png" id="test1" />
                    </div>



                    <!-- edit image pop up -->
                    <div class="popup" style="display: none;">
                        <div class="pointer">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <i class="close-pop table-delete"></i>
                        <h5>Edit Image</h5>
                        <div class="thumb">
                            <img src="/statics/img/gallery-preview.jpg" />
                        </div>
                        <div class="title">
                            <h6>Description</h6>
                            <textarea class="span2"></textarea>
                            <input type="submit" value="Save" class="btn-glow primary" />
                        </div>
                        <div class="description">

                        </div>
                    </div>

                </div>
            </div>
            <!-- end gallery wrapper -->

        </div>
    </div>
</div>
<!-- end main container -->

<script src="/statics/layui/layui.js"></script>
<script>
    layui.use('upload', function(){
        var upload = layui.upload;
        var upurl = '<?= \yii\helpers\Url::to(['goods/gallery'])?>';



        //执行实例
        var uploadInst = upload.render({
            elem: '#test1' //绑定元素
            ,url: upurl //上传接口
            ,data:{'gid':'<?= $gid;?>'}
            ,field:'UploadForm[imageFile]'
            ,before:function (obj) {
                layer.load();
            }
            ,done: function(res){
                //上传完毕回调
                layer.closeAll('loading');
//                console.log(res);
                layer.msg(res.msg);

                var html = "<div class=\"span3 img-container\">\n" +
                "                        <div class=\"img-box\">\n" +
                "                                <span class=\"icon edit\">\n" +
                "                                    <i class=\"gallery-edit\"></i>\n" +
                "                                </span>\n" +
                "                            <span class=\"icon trash\">\n" +
                "                                    <i class=\"gallery-trash\"></i>\n" +
                "                                </span>\n" +
                "                            <img src='"+ res.data.url+ "' />\n" +
                "                            <p class=\"title\">\n" +
                "                            </p>\n" +
                "                        </div>\n" +
                "                    </div>";

                $('.new-img').before(html);

            }
            ,error: function(){
                //请求异常回调
                layer.closeAll('loading');
                layer.msg('请求异常.请联系管理员.');
            }
        });
    });
</script>
