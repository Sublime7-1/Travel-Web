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
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
        <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>              
        <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
        <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/style/admin/js/lrtk.js" type="text/javascript" ></script>
<title>订单处理</title>
</head>

<body>
<div class="clearfix">

      

  <div class="search_style">
     
      <ul class="search_content clearfix">
       <li><label class="l_f">订单编号</label><input name="" type="text"  class="text_add" placeholder="输入订单编号"  style=" width:250px"/></li>
       <li><label class="l_f">交易时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
       <li style="width:90px;"><button type="button" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
      </ul>
    </div>
    <!--交易订单列表-->
    <div class="Orderform_list">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
        <thead>
         <tr>
                <th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="120px">订单编号</th>
                <th width="120px">商品名称</th>
                <th width="200px">商品图片</th>
                <th width="100px">申请时间</th>             
                <th width="50px">所属分类</th>
                <th width="100px">订单金额</th>             
                <th width="80px">数量(大人)</th>
                <th width="80px">数量(儿童)</th>
                <th width="80px">使用优惠卷(金额)</th>
                <th width="80px">优惠活动(金额)</th>
                <th width="80px">保险(金额)</th>
                <th width="70px">状态</th>              
                <th width="200px">操作</th>
            </tr>
        </thead>
    <tbody>
    @if($order->count())
    @foreach($order as $k=>$v)
   <tr>
     <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
     <td>{{$v->order_num}}</td>
     <td>{{$v->goods_id}}</td>
     <td class="order_product_name">
      <img src="{{$pic[$k]}}" width="50px" hieght="50px"  title="{{$v->goods_id}}"/>
     </td>

     <td>{{$v->order_change_time}}</td>
     <td>{{$v->order_type}}</td>
     <td>{{$v->money}}</td>
     <td>{{$v->adult_num}}</td>
     <td>{{$v->child_num}}</td>
     <td>{{$v->coupon_id}}</td>
     <td>{{$v->discount}}</td>
     <td>{{$v->insurance}}</td>
     <td class="td-status"><span class="label label-success radius">{{$v->order_status}}</span></td>
     <td>
     @if($v->order_status == '待处理')
     <a onClick="loading(this,{{$v->id}},1)"  href="javascript:;" title="待处理"  class="btn btn-xs btn-success"><i class="fa fa-cubes bigger-120"></i></a> 
     @elseif($v->order_status == '支付中')
      <a onClick="del(this,{{$v->id}},3)"  href="javascript:;" title="取消支付"  class="btn btn-xs btn-danger"><i class="fa fa-close bigger-120"></i></a> 
     @endif
     <a title="订单详细"  href="/admin/order/form/{{$v->id}}"  class="btn btn-xs btn-info order_detailed" ><i class="fa fa-list bigger-120"></i></a> 
     <a title="删除" href="javascript:;"  onclick="Order_form_del(this,{{$v->id}})" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>    
     </td>
     </tr>
     @endforeach
    @endif
    </tbody>
    </table>

    </div>


 </div>
 </div>
</div>
<!--发货-->
 
 </div>
</body>
</html>
<script>
$(function() { 
    $("#order_hand").fix({
        float : 'left',
        //minStatue : true,
        skin : 'green', 
        durationTime :false,
        spacingw:30,//设置隐藏时的距离
        spacingh:250,//设置显示时间距
        table_menu:'.order_list_style',
    });
});
@if($order->count())
function loading(obj,id,i){
    layer.confirm('确认用户进行支付吗?',function(){
        $.get('/admin/order/loading_order/status',{'id':id,'i':i},function(data){
            if(data == 1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success"  href="javascript:;" title="交易中"><i class="fa fa-cubes bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">支付中</span>');
                $(obj).before('<a onClick="del(this,{{$v->id}},3)"  href="javascript:;" title="取消支付"  class="btn btn-xs btn-danger"><i class="fa fa-close bigger-120"></i></a> ');
                $(obj).remove();
                layer.msg('开启交易!',{icon: 6,time:1000});
            }else{
                layer.msg('开启交易失败!',{icon: 5,time:1000});
            }
        });       
    });  

}
@endif
function del(obj,id,i){
    layer.confirm('取消支付吗?',function(){
        $.get('/admin/order/loading_order/status',{'id':id,'i':i},function(data){
            if(data == 1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success"  href="javascript:;" title="取消支付"><i class="fa fa-cubes bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">取消支付</span>');
                $(obj).remove();
                layer.msg('取消支付成功!',{icon: 6,time:1000});
            }else{
                layer.msg('取消支付失败!',{icon: 5,time:1000});
            }
        });       
    });  

}
function Order_form_del(obj,id){
    layer.confirm('确认删除订单吗?',function(){
        $.get('/admin/order/del/'+id,{},function(data){
            if(data == 1){
                
                $(obj).parents('tr').remove();
                layer.msg('删除成功!',{icon: 6,time:1000});
            }else{
                layer.msg('删除失败!',{icon: 5,time:1000});
            }
        });       
    });  

}
//时间
 laydate({
    elem: '#start',
    event: 'focus' 
});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
$(".order_list_style").width($(window).width()-220);
 $(".order_list_style").height($(window).height()-30);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
    $(".widget-box").height($(window).height());
     $(".order_list_style").width($(window).width()-234);
      $(".order_list_style").height($(window).height()-30);
});
/**发货**/
function Delivery_stop(obj,id){
    layer.open({
        type: 1,
        title: '发货',
        maxmin: true, 
        shadeClose:false,
        area : ['500px' , ''],
        content:$('#Delivery_stop'),
        btn:['确定','取消'],
        yes: function(index, layero){       
        if($('#form-field-1').val()==""){
            layer.alert('快递号不能为空！',{
               title: '提示框',                
              icon:0,       
              }) 
            
            }else{          
             layer.confirm('提交成功！',function(index){
        $(obj).parents("tr").find(".td-manage").prepend('<a style=" display:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="已发货"><i class="fa fa-cubes bigger-120"></i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发货</span>');
        $(obj).remove();
        layer.msg('已发货!',{icon: 6,time:1000});
            });  
            layer.close(index);           
          }
        
        }
    })
};
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
</script>
