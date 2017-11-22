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
                            <h4>商品订单</h4>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span1">订单编号</th>
                                    
                                    <th class="span2"><span class="line"></span>订单交易号</th>
                                    <th class="span1"><span class="line"></span>订单总额</th>
                                    <th class="span2"><span class="line"></span>退款原因</th>
                                    <th class="span1"><span class="line"></span>退款状态</th>
                                    <th class="span1"><span class="line"></span>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($refundList)): foreach($refundList as $val): ?>
                                    <tr class="first">
                                        <td><?= $val['order_sn'] ?></td>
                                        
                                        <td class="description"><?= $val['trade_no'] ?></td>
                                        <td class="description">￥<?= $val['refund_amount']?></td>
                                        <td class="description"><?= $val['refund_cause']?></td>
                                        <td>
                                            <?php if($val['refund_status'] == 0): ?>
                                                <span class="label label-error">已驳回</span>
                                            <?php elseif($val['refund_status'] == 1): ?>
                                                <span class="label label-success">已退款</span>
                                            <?php else: ?>
                                                <span class="label label-success">待审批</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="align-left"> 
                                            <a href="javascript:void(0);" refund="<?= $val['refund_id']?>" class="order_refund">退款</a> | 
                                            <a href="#">驳回</a>
                                        </td>
                                    </tr>
                                <?php endforeach; else: ?>
                                <center><table><tr class='first'><td colspan="4"><h1>哎呀，暂时没有数据啦~~</h1></td></tr></table></center>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end products table -->

                <div class="pagination pull-right">
                    
                </div>
            </div>
        </div>
    </div>

<script>
$(function(){
    $('.order_refund').click(function(){
        var rid = $(this).attr('refund');

        layer.confirm('您是确认要打款给对方吗？', {
        btn: ['确认','取消'] //按钮
        }, function(){
        var url = '<?=Url::to(['refund/get-url']);?>';
        
        $.get(url,{'rid':rid},function(result){
            console.log(result);
            if(result.code)
            {
                window.open(result.data.url);
                layer.msg('退款页面已开启.', {icon: 1});
            
            }
            else
            {
                layer.msg(result.msg, {icon: 5});
            }
        },'json');

        
        }, function(){

        });

    })
})
</script>    