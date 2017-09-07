<?php
/**
 * @Author  Bing Dev Team
 * @License http://opensource.org/licenses/MIT	MIT License
 * @Link    http://bingphp.com    <itbing@sina.cn>
 * @Since   Version 1.0.0
 * @Date:   2017/9/7
 * @Time:   16:26
 */

$alerts = yii::$app->session->getFlash('alerts');

?>

<?php if(isset($alerts) && ($alerts['state'] == 0)){ ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> <?= $alerts['msg'];?>
    </div>

<?php }elseif(isset($alerts) && ($alerts['state'] == 1)){ ?>

    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> <?= $alerts['msg'];?>
    </div>

<?php } ?>