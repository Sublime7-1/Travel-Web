<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" /> 
        <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/style/admin/Widget/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
        <link href="/style/admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />   
        <!--[if IE 7]>
          <link rel="stylesheet" href="/style/admin/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="/style/admin/js/jquery-1.9.1.min.js"></script>   
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
        <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>
        <!-- page specific plugin scripts -->
        <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
        <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="/style/admin/js/H-ui.js"></script> 
        <script type="text/javascript" src="/style/admin/js/H-ui.admin.js"></script> 
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script type="text/javascript" src="/style/admin/Widget/zTree/js/jquery.ztree.all-3.5.min.js"></script> 
        <script src="/style/admin/js/lrtk.js" type="text/javascript" ></script>
<title>优惠劵列表</title>
</head>
<body>
<div class=" page-content clearfix">
 <div id="products_style">
    <div class="search_style">
     
      <ul class="search_content clearfix">
        <form action="/admin/coupontype" method="get">
           <li><label class="l_f">分类名称</label><input name="name" value="{{$request->name or ''}}" type="text"  class="text_add" placeholder="  输入优惠劵分类名称..."  style=" width:250px"/></li>
           <!-- <li><label class="l_f">添加时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li> -->
           <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li>
       </form>
      </ul>
    </div>
     <div class="border clearfix">
       <span class="l_f">
        <button onclick="member_edit('添加','/admin/coupontype/create','4','','300')" title="添加优惠劵分类" class="btn btn-warning Order_form"><i class="icon-plus"></i>添加分类</button>
        <a href="javascript:void()" class="btn btn-danger"><i class="icon-trash"></i>批量删除</a>
       </span>
       <span class="r_f">共：<b>{{$num}}</b>个分类</span>
     </div>
    <div class="table_menu_list" id="testIframe">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
        <thead>
         <tr>
            <th><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
            <th>分类id</th>
            <th>分类名称</th>
            <th>pid</th>
            <th>path</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $v)   
         <tr>
            <td><label><input type="checkbox" class="ace" ><span class="lbl"></span></label></td>
            <td>{{$v->id}}</td>               
            <td><u style="cursor:pointer" class="text-primary" onclick="">{{$v->name}}</u></td>
            <td>{{$v->pid}}</td>
            <td>{{$v->path}}</td>
            <td class="td-manage">
            <a title="编辑" onclick="member_edit('编辑','/admin/coupontype/{{$v->id}}/edit','4','','300')" href="javascript:;"  class="btn btn-xs btn-info" ><i class="icon-edit bigger-120"></i></a> 
            <a title="删除" href="javascript:;"  onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-warning" ><i class="icon-trash  bigger-120"></i></a>
           </td>
          </tr>
        @endforeach
        </tbody>
        </table>
    </div>     
  </div>
 </div>
</div>
</body>
</html>
@if(session('navigate_msg'))
<script>layer.msg('{{session("navigate_msg")}}',{icon: '{{session("tips_code")}}',time:1000});</script>
@endif

<script>
jQuery(function($) {
        var oTable1 = $('#sample-table').dataTable( {
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,2,3,4,5,8,9]}// 制定列不参与排序
        ] } );
                
                
                $('table th input:checkbox').on('click' , function(){
                    var that = this;
                    $(this).closest('table').find('tr > td:first-child input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });
                        
                });
            
            
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();
            
                    var off2 = $source.offset();
                    var w2 = $source.width();
            
                    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
                    return 'left';
                }
            });
 laydate({
    elem: '#start',
    event: 'focus' 
});
$(function() { 
    $("#products_style").fix({
        float : 'left',
        //minStatue : true,
        skin : 'green', 
        durationTime :false,
        spacingw:30,//设置隐藏时的距离
        spacingh:260,//设置显示时间距
    });
});
</script>
<script type="text/javascript">
//初始化宽度、高度  
 $(".widget-box").height($(window).height()-215); 
$(".table_menu_list").width($(window).width()-260);
 $(".table_menu_list").height($(window).height()-215);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
    $(".widget-box").height($(window).height()-215);
     $(".table_menu_list").width($(window).width()-260);
      $(".table_menu_list").height($(window).height()-215);
    })
 
/*******树状图*******/
var setting = {
    view: {
        dblClickExpand: false,
        showLine: false,
        selectedMulti: false
    },
    data: {
        simpleData: {
            enable:true,
            idKey: "id",
            pIdKey: "pId",
            rootPId: ""
        }
    },
    callback: {
        beforeClick: function(treeId, treeNode) {
            var zTree = $.fn.zTree.getZTreeObj("tree");
            if (treeNode.isParent) {
                zTree.expandNode(treeNode);
                return false;
            } else {
                demoIframe.attr("src",treeNode.file + ".html");
                return true;
            }
        }
    }
};

        
var code;
        
function showCode(str) {
    if (!code) code = $("#code");
    code.empty();
    code.append("<li>"+str+"</li>");
}
        
$(document).ready(function(){
    var t = $("#treeDemo");
    t = $.fn.zTree.init(t, setting, zNodes);
    demoIframe = $("#testIframe");
    demoIframe.bind("load", loadReady);
    var zTree = $.fn.zTree.getZTreeObj("tree");
    zTree.selectNode(zTree.getNodeByParam("id",'11'));
}); 
/*产品-停用*/
function member_stop(obj,id){
    layer.confirm('确认要停用吗？',function(index){
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="icon-ok bigger-120"></i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
        $(obj).remove();
        layer.msg('已停用!',{icon: 5,time:1000});
    });
}

/*产品-启用*/
function member_start(obj,id){
    layer.confirm('确认要启用吗？',function(index){
        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="icon-ok bigger-120"></i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
        $(obj).remove();
        layer.msg('已启用!',{icon: 6,time:1000});
    });
}
/*产品-编辑*/
function member_edit(title,url,id,w,h){
    var index = layer_show(title,url,w,h);
    if (true) {}
}

/*优惠劵类-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
      $.post("/admin/coupontype/"+id,{"_token": "{{ csrf_token() }}","_method":"DELETE"},function(data){
            if(data == 1){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            }else if(data == 2){
                layer.msg('该分类有子类,不能删除',{icon:5,time:1000});
            }else{
                layer.msg('服务器繁忙，请稍后再试！',{icon:5,time:1000});
            }
        });
    });
}
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Orde r_form').on('click', function(){
    var cname = $(this).attr("title");
    var chref = $(this).attr("href"); var cnames = parent.$('.Current_page').html();
    var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe').html(cname);
    parent.$('#iframe').attr("src",chref).ready();;
    parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr({"name":herf,"href":"javascript:void(0)"}).css({"color":"#4c8fbd","cursor":"pointer"});
    //parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+" class='iframeurl'>" + cnames + "</a>");
    parent.layer.close(index);
    
});

// 更改分类状态
function changeStatus(obj){
    var td = $(obj).parent();
    var pid = $(obj).parents('tr').find('td:nth-child(3)').html();
    var id = $(obj).parents('tr').find('td:nth-child(2)').html();
    var sta_val = $(obj).attr('status-val');
    $.get('/admin/chan_goodslabel_status/'+id,{'status':sta_val},function(data){
           if (data == 1) {
                if (sta_val == 1) {
                    td.html('<a href="javascript:;" onclick="changeStatus(this)" status-val="2" class="btn btn-warning">隐藏</a>');
                }else{
                    td.html('<a href="javascript:;" onclick="changeStatus(this)" status-val="1" class="btn btn-success">显示</a>');
                }
           }    
        
    });
}
</script>
