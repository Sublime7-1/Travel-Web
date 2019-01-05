
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
        <script type="text/javascript" src="/style/admin/Widget/Validform/5.3.2/Validform.min.js"></script>
		<script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>           	
		<script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
		<script src="/style/admin/js/lrtk.js" type="text/javascript" ></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script>	
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
<title>管理员</title>
</head>

<body>
<!-- 验证消息 -->
@if (count($errors) > 0)

        @foreach ($errors->all() as $error)
          <script>layer.msg('{{$error}}',{icon:5,time:2000});</script>
     
        @endforeach


@endif
  <div class="administrator">
       <div class="d_Confirm_Order_style">
    <div class="search_style">
     
        <ul class="search_content clearfix">
          <form action="/admin/admin" method="get">
           <li><label class="l_f">管理员名称</label><input name="keywords" type="text"  class="text_add" placeholder=""  style=" width:400px"/></li>
           <li><label class="l_f">添加时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
           <li style="width:90px;"><button type="submit" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
           </form>
        </ul>
      
    </div>
    <!--操作-->
     <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="administrator_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加管理员</a>
        <a href="javascript:;" onclick="delAll()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
       </span>
       <span class="r_f">共：<b>{{$count}}</b>人</span>
     </div>
     <!--管理员列表-->
     <div class="clearfix administrator_style" id="administrator">
      <div class="left_style">
      <div id="scrollsidebar" class="left_Treeview">
        <div class="show_btn" id="rightArrow"><span></span></div>
        <div class="widget-box side_content" >
         <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
         <div class="side_list"><div class="widget-header header-color-green2"><h4 class="lighter smaller">管理员分类列表</h4></div>
         <div class="widget-body">
           <ul class="b_P_Sort_list">
           <li><i class="fa fa-users green"></i> <a href="/admin/admin">全部管理员（{{$count}}）</a></li>
            <li><i class="fa fa-users orange"></i> <a href="/admin/admin?status=3">超级管理员（{{$d_count}}）</a></li>
            <li><i class="fa fa-users orange"></i> <a href="/admin/admin?status=2">普通管理员（{{$c_count}}）</a></li>
            <li><i class="fa fa-users orange"></i> <a href="/admin/admin?status=1">编辑管理员（{{$b_count}}）</a></li>
            <li><i class="fa fa-users orange"></i> <a href="/admin/admin?status=0">客服管理员（{{$a_count}}）</a></li>
           </ul>
        </div>
       </div>
      </div>  
      </div>
      </div>
      <div class="table_menu_list ajax_page"  id="testIframe">
            <div id="ajax_page">
               <table class="table table-striped table-bordered table-hover" id="sample_table">
        		<thead>
        		 <tr>
        				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
        				<th width="80px">编号</th>
        				<th width="250px">登录名</th>
        				<th width="100px">手机</th>
        				<th width="100px">邮箱</th>
                <th width="100px">角色</th>				
        				<th width="180px">加入时间</th>
        				<th width="70px">状态</th>                
        				<th width="200px">操作</th>
        			</tr>
        		</thead>
            	<tbody>
            	@foreach($user as $v)
                 <tr>
                  <td><label><input type="checkbox" value="{{$v->id}}" class="ace checks"><span class="lbl"></span></label></td>
                  <td>{{$v->id}}</td>
                  <td>{{$v->name}}</td>
                  <td>{{$v->phone}}</td>
                  <td>{{$v->email}}</td>
                  <td>{{$v->status}}</td>
                  <td>{{$v->time}}</td>
                  @if($v->display == '已开启')
                    <td class="td-status"><span class="label label-success radius">{{$v->display}}</span></td>
                  @else
                    <td class="td-status"><span class="label label-defaunt radius">已停用</span></td>
                  @endif
                  
                  <td class="td-manage">
                    @if($v->display == '已开启')
                    <a onClick="member_stop(this,{{$v->id}})"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>
                    @else
                    <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{$v->id}})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
                    @endif  
                    <a title="编辑"  value="{{$v->id}}"  href="javascript:;"  class="btn btn-xs btn-info administrator_edit" ><i class="fa fa-edit bigger-120"></i></a>       
                    <a title="删除" href="javascript:;"  onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
                   </td>
                 </tr>
                 @endforeach
                </tbody>
                </table>
            <div style="margin:0 auto;text-align:center" id="list">{{ $user->links() }}</div>
        </div>
      </div>
     </div>
  </div>
</div>
 <!--添加管理员-->
 <div id="add_administrator_style" class="add_menber" style="display:none">
    <form action="" method="post" id="form-admin-add" >
		<div class="form-group">
			<label class="form-label"><span class="c-red">*</span>管理员：</label>
			<div class="formControls">
				<input type="text" class="input-text" value="" placeholder="" id="user-name" name="name" datatype="*2-16" nullmsg="用户名不能为空">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label"><span class="c-red">*</span>初始密码：</label>
			<div class="formControls">
			<input type="password" placeholder="密码" name="pass" autocomplete="off" value="" class="input-text" datatype="*6-20" nullmsg="密码不能为空">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label "><span class="c-red">*</span>确认密码：</label>
			<div class="formControls ">
		<input type="password" placeholder="确认新密码" autocomplete="off" class="input-text Validform_error" errormsg="您两次输入的新密码不一致！" datatype="*" nullmsg="请再输入一次新密码！" recheck="pass" id="newpassword2" name="repass">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label "><span class="c-red">*</span>性别：</label>
			<div class="formControls  skin-minimal">
		      <label><input name="sex" type="radio" value="0" class="ace" checked="checked"><span class="lbl">保密</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" value="1" class="ace"><span class="lbl">男</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" value="2" class="ace"><span class="lbl">女</span></label>
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label "><span class="c-red">*</span>手机：</label>
			<div class="formControls ">
				<input type="text" class="input-text" value="" placeholder="" id="user-tel" name="phone" datatype="m" nullmsg="手机不能为空">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls ">
				<input type="text" class="input-text" placeholder="@" name="email" id="email" datatype="e" nullmsg="请输入邮箱！">
			</div>
			<div class="col-4"> <span class="Validform_checktip"></span></div>
		</div>
		<div class="form-group">
			<label class="form-label">角色：</label>
			<div class="formControls "> <span class="select-box" style="width:150px;">
				<select class="select" name="status" size="1">
					<option value="0">客服管理员</option>
					<option value="1">栏目管理员</option>
					<option value="2">普通管理员</option>
					<option value="3">超级管理员</option>
				</select>
				</span> </div>
		</div>
		<div class="form-group">
			<label class="form-label">备注：</label>
			<div class="formControls">
				<textarea name="top" cols="" rows="" class="textarea" placeholder="说点什么...100个字符以内" dragonfly="true" onkeyup="checkLength(this);"></textarea>
				<span class="wordage">剩余字数：<span id="sy" style="color:Red;">100</span>字</span>
			</div>
			<div class="col-4"> </div>

		</div>
        <input type="hidden" name="display" value="0" />
        {{csrf_field()}}
		<div> 
        <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" >
	</form>
   </div>
    </div>

    <!-- 修改框 -->
    <!--添加管理员-->
    <div id="edit_administrator_style" class="add_menber" style="display:none">
        
    </div>



</body>
</html>
<script type="text/javascript">



jQuery(function($) {
				
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

</script>
<script type="text/javascript">
$(function() { 
	$("#administrator").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		spacingw:50,//设置隐藏时的距离
	    spacingh:270,//设置显示时间距
	});
});
//字数限制
function checkLength(which) {
	var maxChars = 100; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您输入的字数超过限制!',	
    });
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
};
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
 laydate({
    elem: '#start',
    event: 'focus' 
});
/*产品-删除*/
function member_del(obj,id){
    
    layer.confirm('确认要删除吗？',function(index){
        $.post("{{ url('admin/admin') }}/"+id,{"_token": "{{ csrf_token() }}","_method":"DELETE"},function(data){
            if(data == 1){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            }else{
                layer.msg('删除失败!',{icon:1,time:1000});
            }
        });
        
    });
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
        $.get('/admin/admin/status',{'status':1,'id':id},function(data){
            if(data == 1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,'+id+')" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                $(obj).remove();
                layer.msg('已停用!',{icon: 5,time:1000});
            }else{
                layer.msg('修改失败',{icon: 5,time:1000});
            }
            
        });
	});
}
/*用户-启用*/
function member_start(obj,id){
    layer.confirm('确认要启用吗？',function(index){
        $.get('/admin/admin/status',{'status':0,'id':id},function(data){
            if(data == 1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,'+id+')" href="javascript:;" title="停用"><i class="fa fa-check  bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!',{icon: 6,time:1000});
            }else{
                layer.msg('修改失败',{icon: 6,time:1000});
            }
    		
    	});
    });
}
/*产品-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}


/*添加管理员*/
$('#administrator_add').on('click', function(){
	layer.open({
    type: 1,
	title:'添加管理员',
	area: ['700px',''],
	shadeClose: false,
	content: $('#add_administrator_style'),
	
	});
})
//修改管理员
$('.administrator_edit').on('click', function(){
    var id = $(this).attr('value');
    $.get("/admin/admin/"+id+"/edit",{},function(data){
        console.log(data);
        $("#edit_administrator_style").html(data);
        layer.open({
            type: 1,
            title:'修改管理员',
            area: ['700px',''],
            shadeClose: false,
            content: $('#edit_administrator_style'),
        });
    });
    
})
	//表单验证提交
$("#form-admin-add").Validform({
		
		 tiptype:2,
	
		callback:function(data){
		//form[0].submit();
		if(data.status==1){ 

                layer.msg(data.info, {icon: data.status,time: 1000}, function(){ 

                    location.reload();//刷新页面 

                    });   
                
            } 
            else{ 
                layer.msg(data.info, {icon: data.status,time: 3000}); 
            } 		  
			var index =parent.$("#iframe").attr("src");
			parent.layer.close(index);
		}
		
		
	});	
    // 无刷新分页
    
</script>
<script>
    $(function () {
    //给id为list的元素代理绑定下面所有的a元素"click"事件      
        $("#list").on("click",".pagination a",function() {

            // alert($(this).attr('href'));
        //取a标签的href即url发送ajax请求
        $.get($(this).attr('href'),function(html){
        //返回数据输出到id为list的元素中
                $('#ajax_page').html(html);
                
            });
            //阻止默认事件和冒泡，即禁止跳转
            return false;
        })
    })

    function delAll(){
        datas = $('.checks:checked');
        
        arr = new Array();
        for(i=0;i<datas.length;i++){
            arr[i]=datas.eq(i).val();
        }
        
        str = arr.join(',',arr);
        
        $.get("{{url('admin/style/admin/delAll')}}",{str:str},function(data){
            console.log(data);
            if(data == 1){
                for(i=0;i<arr.length;i++){
                    $('#a'+arr[i]).remove();
                }
            }else{
               layer.msg('删除失败',{icon: 5,time:1000});
            }
        });
    }

    
</script>

