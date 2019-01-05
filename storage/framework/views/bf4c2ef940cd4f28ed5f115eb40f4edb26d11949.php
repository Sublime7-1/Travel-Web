<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/style/admin/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/js/H-ui.js" type="text/javascript"></script>  
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
        <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>              
        <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
        <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
          
        <script src="/style/admin/js/lrtk.js" type="text/javascript" ></script>
<title>退款管理</title>
</head>

<body>
<div class="margin clearfix">
 <div id="refund_style">
   <div class="search_style">
     
      <ul class="search_content clearfix">
       <li><label class="l_f">产品名称</label><input name="" type="text" class="text_add" placeholder="输入产品名称" style=" width:250px"></li>
       <li><label class="l_f">退款时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
       <li style="width:90px;"><button type="button" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
      </ul>
    </div>
 <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" class="btn btn-success Order_form"><i class="fa fa-check-square-o"></i>&nbsp;已退款订单</a>
        <a href="javascript:ovid()" class="btn btn-warning Order_form"><i class="fa fa-close"></i>&nbsp;未退款订单</a>
        <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;批量删除</a>
       </span>
       <span class="r_f">共：<b>2334</b>笔</span>
     </div>
     <!--退款列表-->
     <div class="refund_list">
        <table class="table table-striped table-bordered table-hover" id="sample-table">
        <thead>
         <tr>
                <th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="120px">订单编号</th>
                <th width="120px">商品名称</th>
                <th width="200px">商品图片</th>
                <th width="100px">申请时间</th>             
                <th width="180px">所属分类</th>
                <th width="100px">订单金额</th>             
                <th width="80px">数量(大人)</th>
                <th width="80px">数量(儿童)</th>
                <th width="80px">使用优惠卷(金额)</th>
                <th width="80px">优惠活动(金额)</th>
                <th width="80px">保险(金额)</th>
                <th width="70px">状态</th>              
                <th width="200px">操作</th>
            </tr>
     <?php $__currentLoopData = $turn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <tr>
     <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
     <td><?php echo e($v->order_num); ?></td>
     <td><?php echo e($v->goods_id); ?></td>
     <td class="order_product_name">
      <img src="<?php echo e($pic[$k]); ?>" width="50px" hieght="50px"  title="<?php echo e($v->goods_id); ?>"/>
     </td>

     <td><?php echo e($v->order_change_time); ?></td>
     <td><?php echo e($v->order_type); ?></td>
     <td><?php echo e($v->money); ?></td>
     <td><?php echo e($v->adult_num); ?></td>
     <td><?php echo e($v->child_num); ?></td>
     <td><?php echo e($v->coupon_id); ?></td>
     <td><?php echo e($v->discount); ?></td>
     <td><?php echo e($v->insurance); ?></td>

      <td class="td-status"><span class="label label-success radius">待退款</span></td>
     <td>
     <a onClick="Delivery_Refund(this,<?php echo e($v->id); ?>,5)"  href="javascript:;" title="退款"  class="btn btn-xs btn-success">退款</a> 
     <a title="退款订单详细"  href="/admin/order/form/<?php echo e($v->id); ?>"  class="btn btn-xs btn-info Refund_detailed" >详细</a> 
      
     </td>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table> 
     </div>



 </div>
</div>
</body>
</html>
<script>
 //订单列表
jQuery(function($) {
        var oTable1 = $('#sample-table').dataTable( {
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,2,3,4,5,6,8,9]}// 制定列不参与排序
        ] } );
                 //全选操作
                $('table th input:checkbox').on('click' , function(){
                    var that = this;
                    $(this).closest('table').find('tr > td:first-child input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });
                        
                });
            });
function Delivery_Refund(obj,id,i){
            
        layer.confirm('是否退款当前商品价格！',function(index){
            $.get('/admin/order/loading_order/status',{'id':id,'i':i},function(data){
                if(data == 1){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="已退款">退款</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt  radius">已退款</span>');
                    $(obj).remove();
                    layer.msg('已退款!',{icon: 6,time:1000});
                }else{
                     layer.msg('退款失败!',{icon: 6,time:1000});
                }
        
            });  
        });
    }
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Refund_detailed').on('click', function(){
    var cname = $(this).attr("title");
    var chref = $(this).attr("href");
    var cnames = parent.$('.Current_page').html();
    var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
    parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
    //parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);
    
});
</script>