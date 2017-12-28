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
                <h3>会员列表</h3>

            </div>
<!--            <a href="" class="btn-flat success pull-right">-->
<!--                <span>&#43;</span>-->
<!---->
<!--            </a>-->
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span2 sortable">
                            会员名称
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>性别
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>邮箱
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>账户余额
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>最近登录时间
                        </th>
                        <th class="span1 sortable align-right">
                            <span class="line"></span>操作
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($userList)): foreach ($userList as $key => $val): ?>


                        <tr class="first">
                            <td>
                                <img src="<?= $val['avatar'];?>" class="img-circle avatar hidden-phone" />
                                <a href="user-profile.html" class="name"><?= $val['username']?></a>
                                <span class="subtext"><?= $val['mobile'];?></span>
                            </td>
                            <td>
                                <?php if($val['sex'] == 1): ?>
                                    <span class="label label-success">男</span>
                                <?php elseif ($val['sex'] == 2): ?>
                                    <span class="label label-success">女</span>
                                <?php else: ?>
                                    <span class="label label-default">保密</span>
                                <?php endif; ?>

                            </td>
                            <td>
                                <?= $val['email']?>
                            </td>
                            <td>
                                <?= $val['user_money']?>￥
                            </td>
                            <td>
                                <?= date('Y/m/d H:i:s',$val['updated_at']);?>
                            </td>
                            <td class="align-right">
                                <a href="#">查看</a>

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