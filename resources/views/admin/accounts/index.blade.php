<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="renderer" content="webkit|ie-comp|ie-stand" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/css/style.css" /> 
  <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" /> 
  <link rel="stylesheet" href="/style/admin/font/css/font-awesome.min.css" /> 
  <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]--> 
  <script src="/style/admin/js/jquery-1.9.1.min.js"></script> 
  <script src="/style/admin/assets/js/bootstrap.min.js"></script> 
  <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script> 
  <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script> 
  <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script> 
  <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script> 
  <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script> 
  <script src="/style/admin/js/lrtk.js" type="text/javascript"></script> 
  <title>个人账户</title> 
 </head> 
 <body> 
  <div class="margin clearfix"> 
   <div class="cover_style" id="cover_style"> 
    <div class="search_style"> 
     <ul class="search_content clearfix"> 
      <form action="/admin/accounts" method="get">
        <li><label class="l_f">用户</label><input name="keyword" value="{{$keyword or ''}}" type="text" class="text_add" placeholder="用户名称" style=" width:250px" /></li> 
        <li style="width:90px;"><button type="submit" class="btn_search"><i class="fa fa-search"></i>查询</button></li> 
      </form>
     </ul> 
    </div> 
    <!--操作--> 
    <div class="border clearfix"> 
     <span class="l_f"> <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-bar-chart"></i>&nbsp;图表展示</a> </span> 
     <span class="r_f">共：<b>{{$total}} </b>个账户</span> 
    </div> 
    <!--账户管理--> 
    <div class=""> 
     <table class="table table-striped table-bordered table-hover" id="sample-table"> 
      <thead> 
       <tr> 
        <th width=""><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></th> 
        <th width="">ID</th> 
        <th width="">用户名</th> 
        <th width="">消费总金额</th> 
        <th width="">单次消费金额</th>
        <th width="">消费原因</th>         
        <th width="">消费时间</th> 
        <th width="">账户状态</th> 
        <th width="">操作</th> 
       </tr> 
      </thead> 
      <tbody> 
        @foreach($data as $v)
       <tr> 
        <td> <label><input type="checkbox" class="ace" /><span class="lbl"></span></label></td> 
        <td>{{$v->id}}</td> 
        <td><u style="cursor:pointer" class="text-primary" onclick="member_show('{{$v->uname}}','member-show.html','1031','500','400')">{{$v->uname}}</u></td> 
        <td>{{$v->pay_total}}<span> ￥</span></td> 
        <td>{{$v->pay_money}}<span> ￥</span></td> 
        <td>{{$v->pay_why}}</td> 
        <td>{{$v->pay_time}}</td> 
        <td class="td-status">
            @if($v->status == '启用')
              <span class="label label-success radius">{{$v->status}}</span>
            @else
              <span class="label label-defaunt radius">{{$v->status}}</span>
            @endif
        </td> 
        <td class="td-manage"> 
          @if($v->status == '停用')
          <a onclick="member_start(this,{{$v->id}})" href="javascript:;" title="启用" class="btn btn-xs btn-close"><i class="fa fa-check  bigger-120"></i></a>
          @else
          <a onclick="member_stop(this,{{$v->id}})" href="javascript:;" title="停用" class="btn btn-xs btn-success"><i class="fa fa-close  bigger-120"></i></a>
          @endif 
          <a href="javascript:ovid()" name="Account_Details.html" class="btn btn-xs  btn-warning Account_Details" onclick="generateOrders({{$v->id}});" title="{{$v->uname}}用户详细"> <i class="fa fa-list-ul bigger-120"></i></a> 
        </td> 
       </tr> 
       @endforeach
      </tbody> 
     </table> 
    </div> 
   </div> 
  </div>   
  <script type="text/javascript">
/*用户-停用*/
function member_stop(obj,id){
  layer.confirm('确认要停用该账户吗？',function(index){
    $.get('/admin/accounts/status',{'status':1,'id':id},function(data){
      if(data == 1){
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">停用</span>');
        $(obj).remove();
        layer.msg('停用成功!',{icon: 5,time:1000});
      }else{
         layer.msg('修改失败',{icon: 5,time:1000});
      }
    });
  })
}

/*用户-启用*/
function member_start(obj,id){
  layer.confirm('确认要启用该账户吗？',function(index){
    $.get('/admin/accounts/status',{'status':0,'id':id},function(data){
        if(data == 1){
          $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="fa fa-times bigger-120"></i></a>');
          $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">启用</span>');
          $(obj).remove();
          layer.msg('启用成功!',{icon: 6,time:1000});
        }else{
           layer.msg('修改失败',{icon: 5,time:1000});
        }
     });
  })
}
jQuery(function($) {
    var oTable1 = $('#sample-table').dataTable( {
    "aaSorting": [ 1, "DESC" ],//默认第几个排序
    "bStateSave": true,//状态保存
    "bAutoWidth":true,
    "aoColumnDefs": [
      //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
      {"orderable":false,"aTargets":[0,2,3,4,5,6,7,8]}// 制定列不参与排序
    ] } );
        $('table th input:checkbox').on('click' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
            
        }); 
});
      //面包屑返回值
//var index = parent.layer.getFrameIndex(window.name);
//parent.layer.iframeAuto(index);
//$('.Order_form ,.Account_Details').on('click', function(){
//  var cname = $(this).attr("title");
//  var chref = $(this).attr("href");
//  var cnames = parent.$('.Current_page').html();
//  var herf = parent.$("#iframe").attr("src");
//    parent.$('#parentIfour').html(cname);
//    parent.$('#iframe').attr("src",chref).ready();;
//  parent.$('#parentIfour').css("display","inline-block");
//    parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
//  parent.$('.parentIframe').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
//  parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
//    parent.layer.close(index);
//  
//});
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.Account_Details').on('click', function(){
  var cname = $(this).attr("title");
  var cnames = parent.$('.Current_page').html();
  var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
  parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
  //parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
  
});
function generateOrders(id){
  window.location.href = "/admin/user/"+id;
};
</script>
 </body>
</html>