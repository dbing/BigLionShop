// 全站公共JS文件
// ------------- Index page ---------------
$(function () {

    // 加载更多
    $('.btn-loadmore').click(function () {
        var _this = $(this);
        var type = _this.attr('datatype');
        var page = _this.attr('page');
        var url = '/index.php?r=index/load-more';
        $.get(url,{'type':type,'page':page},function (result) {
            console.log(result);
            if(result)
            {
                _this.parent().prev().append(result);
                _this.attr('page',parseInt(page)+1);
            }
            else
            {
                layer.msg('没有更多了');
            }
        });
    });

});

// ------------- Product page ---------------
$(function () {
    // 规格选择
    $('.des_choice ul li').click(function () {
        $(this).toggleClass('checked').siblings().removeClass('checked');

    });

    // 加入购物车
    $('#addto-cart').click(function () {
        var num = $('input[name="quantity"]').val();
        var gid = $(this).data('content');
        var spec = [];
        var specLen = $('.des_choice').length;
        if(specLen > 0)
        {
            $('.checked').each(function (k,v) {

                // console.log($(this).data('content'));
                spec.push($(v).data('content'));
            });

            if(spec.length != specLen)
            {
                layer.msg('请选择规格.');
                return null;
            }

            // 加入购物车(带规格)
            addToCart(gid,num,spec);
        }
        else
        {
            // 加入购物车(无规格)
            addToCart(gid,num,'')
        }



    });


    function addToCart(gid,num,spec) {
        var url = '/index.php?r=product/add-to-cart';
        $.get(url,{'gid':gid,'num':num,'spec':spec},function (result) {
            console.log(result);
            if(result.code)
            {
                layer.confirm('是否立即支付？', {
                    btn: ['果断支付','继续购物'] //按钮
                }, function(){
                    window.location.href = '/index.php?r=cart/index';
                }, function(){

                });
            }
            else
            {
                layer.msg(result.msg);
            }
        },'json')
    }

});

// ------------- Cart page ---------------
$(function () {

    // 加载购物车
    $('.basket').click(function () {
        layer.load();
        var _this = $(this);
        var url = '/index.php?r=cart/load-cart';
        $.get(url,function (result) {
            layer.closeAll();
            _this.empty();
            _this.addClass('open');
            _this.append(result);

        });

    });

    // 累加
    $(document).on('click','.cartchange',function () {
        var _this = $(this);
        var type = _this.attr('type');
        var num = _this.siblings('input[name="quantity"]').val();
        var cid = _this.siblings('input[name="quantity"]').data('content');
        console.log(num+"  "+cid);

        var url = '/index.php?r=cart/change-num';
        if(num == 0 )
        {
            layer.msg('购买数量至少为一');
            _this.siblings('input[name="quantity"]').val(1);
            return false;
        }
        $.get(url,{'num':num,'cid':cid,'type':type},function (result) {
            console.log(result);
            if(result.code)
            {
                $('#cart-page').remove();
                $('#footer').before(result.data.viewcart);
                $('.basket').empty().append(result.data.navcart);
            }
            else
            {
                _this.siblings('input[name="quantity"]').val(parseInt(num)-1);
                layer.msg(result.msg);
            }
        },'json')
    });

});

function deleteCart(cid)
{
    layer.confirm('您确认要删除吗？', {
        btn: ['确定','取消'] //按钮
    }, function(){
        var url = '/index.php?r=cart/delete';
        $.get(url,{'cid':cid},function (result) {
            if(result.code)
            {
                layer.msg('删除成功', {icon: 1});
                $('#cart-page').remove();
                $('#footer').before(result.data.viewcart);
                $('.basket').empty().append(result.data.navcart);

            }
            else
            {
                layer.msg(result.msg);
            }
        },'json')

    }, function(){

    });


}
