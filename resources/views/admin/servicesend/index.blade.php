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
        <script src="/style/admin/js/displayPart.js" type="text/javascript"></script>
<title>交易金额</title>
</head>

<body>
<div class="margin clearfix">
 <div class="Shops_Audit">
   <div class="prompt">当前共有<b>{{$num}}</b>家店铺申请入住</div>
   <!--申请列表-->
   <div class="audit_list">
     <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
         
        <tbody>
        
        <tr>
                <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="80px">排序</th>
                <th width="180">客服名称</th>
                <th width="120px">所属分类</th>
                <th width="120px">客服类型</th>
                <th width="">客服简介</th>
                <th width="150px">添加时间</th>
                <th width="100px">审核状态</th>                
                <th width="150px">操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($list as $v)
         <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td>1</td>
          <td>{{$v->user_id}}</td>
          <td>{{$v->type}}</td>
           <td>{{$v->level}}</td>
          <td class="displayPart" displayLength="60">{{$v->content}}</td>
          <td>{{$v->time}}</td>
          <td>{{$v->status}}</td>
          <td class="td-manage">        
           <form action="/admin/serviceinfo" method="get">
           <input type="hidden" name="id" value="{{$v->id}}"  />
           <button type="submit" title="客服详细" href="/admin/serviceinfo" class="btn btn-xs btn-info Refund_detailed">详细</button>  
           <a title="删除" href="javascript:;"  onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a>
           </form>
          </td>
         </tr>
         @endforeach
        </tbody>
        </table>
   
   </div>
 </div>
</div>
</body>
</html>
<script>
$(function () {  
        $(".displayPart").displayPart();  
   });
$(function() {
        var oTable1 = $('#sample-table').dataTable( {
        //"aaSorting": [],//默认第几个排序
        "bStateSave": true,//状态保存
        //"dom": 't',
        "bFilter":false,
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,1,2,3,4,5,6]}// 制定列不参与排序
        ] } );
                $('table th input:checkbox').on('click' , function(){
                    var that = this;
                    $(this).closest('table').find('tr > td:first-child input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });
                        
                });
})
/*店铺-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',{icon:0,},function(index){
        $.post("{{ url('admin/servicelist') }}/"+id,{"_token": "{{ csrf_token() }}","_method":"DELETE"},function(data){
            if(data == 1){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            }else{
                layer.msg('删除失败!',{icon:1,time:1000});
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
