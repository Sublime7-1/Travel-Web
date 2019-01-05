<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/css/style.css" /> 
  <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" /> 
  <!--[if IE 7]>
		  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome-ie7.min.css" />
		<![endif]--> 
  <!--[if lte IE 8]>
		  <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
		<![endif]--> 
  <script src="/style/admin/assets/js/jquery.min.js"></script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]--> 
  <!--[if !IE]> --> 
  <script type="text/javascript">
			window.jQuery || document.write("<script src='/style/admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script> 
  <!-- <![endif]--> 
  <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/style/admin/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]--> 
  <script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/style/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script> 
  <script src="/style/admin/assets/js/bootstrap.min.js"></script> 
  <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script> 
  <!-- page specific plugin scripts --> 
  <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script> 
  <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script> 
  <script type="text/javascript" src="/style/admin/js/H-ui.js"></script> 
  <script type="text/javascript" src="/style/admin/js/H-ui.admin.js"></script> 
  <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script> 
  <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script> 
  <title>用户列表</title> 
 </head> 
 <body> 
  <!-- 验证消息 -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <div class="mws-form-message error">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
</div>
<script>
setTimeout(function(){
    $('.alert-danger').hide();
},2000);
</script>
@endif
  <div class="page-content clearfix"> 
   <div id="Member_Ratings"> 
    <div class="d_Confirm_Order_style"> 
     <div class="search_style"> 
      <form action="/admin/links" method="get">
        {{csrf_field()}}
        <ul class="search_content clearfix"> 
         <li><label class="l_f">链接名称 :</label><input name="name" type="text" class="text_add" placeholder="  输入链接名称..." value="{{$request->name or ''}}" style=" width:200px;height: 36px" /></li> 
         <!-- <li><label class="l_f">申请时间 :</label><input placeholder="  点击选择时间..." class="inline name="laydate-icon" id="start" style=" margin-left:10px;" /></li> --> 
         <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li> 
        </ul> 
      </form>
     </div> 
     <!----> 
     <div class="border clearfix"> 
      <span class="l_f"><a href="javascript:ovid()" class="btn btn-danger"><i class="icon-trash"></i>批量删除</a> </span> 
      <span class="r_f">共：<b>{{$total}} </b>条</span> 
     </div> 
     <!----> 
     <div class="table_menu_list"> 
      <table class="table table-striped table-bordered table-hover" id="sample-table"> 
       <thead> 
        <tr> 
         <th width="25"><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></th> 
         <th width="80">ID</th> 
         <th width="120">链接名称</th> 
         <th width="150">链接地址</th> 
         <th width="150">品牌图</th> 
         <th width="120">展示图</th> 
         <th width="120">公司名称</th> 
         <th width="100">申请人</th> 
         <th width="120">申请人手机</th> 
         <th width="150">申请人邮箱</th> 
         <th width="100">申请区域</th> 
         <th width="150">申请时间</th> 
         <th width="100">审核状态</th> 
         <th width="180">操作</th> 
        </tr> 
       </thead> 
       <tbody>
       @foreach($data as $v) 
        <tr> 
         <td><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></td> 
         <td>{{$v->id}}</td> 
         <td>{{$v->name}}</td> 
         <td>{{$v->url}}</td> 
         <td><img src="{{$v->brand_img}}" title="品牌图" width="100%"></td> 
         <td><img src="{{$v->show_img}}" title="展示图" width="100%"></td> 
         <td class="text-l">{{$v->company}}</td> 
         <td>{{$v->contacts}}</td> 
         <td>{{$v->phone}}</td> 
         <td>{{$v->email}}</td> 
         <td>{{$v->area}}</td> 
         <td>{{$v->apply_time}}</td> 
         <td class="td-status">
          @if($v->status == '未通过')
          <span class="label radius">{{$v->status}}</span></td> 
          @else
          <span class="label label-success radius">{{$v->status}}</span></td> 
          @endif 
         <td class="td-manage"> 
          @if($v->status == '未通过')
          <a style="text-decoration:none" class="btn btn-xs btn-success" onclick="member_start(this,{{$v->id}})" href="javascript:;" title="通过"><i class="icon-ok bigger-120"></i></a>
          @else
          <a style="text-decoration:none" class="btn btn-xs btn-success" onclick="member_stop(this,{{$v->id}})" href="javascript:;" title="失效"><i class="icon-remove bigger-120"></i></a>
          @endif  
          <a title="删除" href="javascript:;" onclick="member_del(this,{{$v->id}})" class="btn btn-xs btn-warning"><i class="icon-trash  bigger-120"></i></a> </td> 
        </tr> 
        @endforeach
       </tbody> 
      </table> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--添加用户图层--> 
  <div class="add_menber" id="add_menber_style" style="display:none"> 
   <ul class=" page-content"> 
    <li><label class="label_name">用&nbsp;&nbsp;户 &nbsp;名：</label><span class="add_name"><input value="" name="用户名" type="text" class="text_add" /></span>
     <div class="prompt r_f"></div></li> 
    <li><label class="label_name">真实姓名：</label><span class="add_name"><input name="真实姓名" type="text" class="text_add" /></span>
     <div class="prompt r_f"></div></li> 
    <li><label class="label_name">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</label><span class="add_name"> <label><input name="form-field-radio" type="radio" checked="checked" class="ace" /><span class="lbl">男</span></label>&nbsp;&nbsp;&nbsp; <label><input name="form-field-radio" type="radio" class="ace" /><span class="lbl">女</span></label>&nbsp;&nbsp;&nbsp; <label><input name="form-field-radio" type="radio" class="ace" /><span class="lbl">保密</span></label> </span> 
     <div class="prompt r_f"></div> </li> 
    <li><label class="label_name">固定电话：</label><span class="add_name"><input name="固定电话" type="text" class="text_add" /></span>
     <div class="prompt r_f"></div></li> 
    <li><label class="label_name">移动电话：</label><span class="add_name"><input name="移动电话" type="text" class="text_add" /></span>
     <div class="prompt r_f"></div></li> 
    <li><label class="label_name">电子邮箱：</label><span class="add_name"><input name="电子邮箱" type="text" class="text_add" /></span>
     <div class="prompt r_f"></div></li> 
    <li class="adderss"><label class="label_name">家庭住址：</label><span class="add_name"><input name="家庭住址" type="text" class="text_add" style=" width:350px" /></span>
     <div class="prompt r_f"></div></li> 
    <li><label class="label_name">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态：</label><span class="add_name"> <label><input name="form-field-radio1" type="radio" checked="checked" class="ace" /><span class="lbl">开启</span></label>&nbsp;&nbsp;&nbsp; <label><input name="form-field-radio1" type="radio" class="ace" /><span class="lbl">关闭</span></label></span>
     <div class="prompt r_f"></div></li> 
   </ul> 
  </div>   
  <script>
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "DESC" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6,7,8,9,10,11,12,13]}// 制定列不参与排序
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
			})
/*用户-添加*/
 $('#member_add').on('click', function(){
    layer.open({
        type: 1,
        title: '添加用户',
		maxmin: true, 
		shadeClose: true, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
          else{
			  layer.alert('添加成功！',{
               title: '提示框',				
			icon:1,		
			  });
			   layer.close(index);	
		  }		  		     				
		}
    });
});

/*友情链接-未通过*/
function member_stop(obj,id){
	layer.confirm('确认要失效吗？',function(index){
    $.get('/admin/links/status',{'id':id,'status':0},function(data){
      if(data == 1){
    		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_start(this,{{$v->id}})" href="javascript:;" title="通过"><i class="icon-ok bigger-120"></i></a>');
    		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">未通过</span>');
    		$(obj).remove();
    		layer.msg('已失效!',{icon: 5,time:1000});
      }else{
        layer.msg('修改失败',{icon: 5,time:1000});
      }
    })  
	});
}
/*友情链接-通过*/
function member_start(obj,id){
	layer.confirm('确认要通过吗？',function(index){
    $.get('/admin/links/status',{'id':id,'status':1},function(data){
        if(data == 1){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onClick="member_stop(this,{{$v->id}})" href="javascript:;" title="失效"><i class="icon-remove bigger-120"></i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已通过</span>');
            $(obj).remove();
            layer.msg('已通过!',{icon: 6,time:1000});
        }else{
          layer.msg('修改失败',{icon: 5,time:1000});
        }
    })

	});
}
/*用户-编辑*/
function member_edit(id){
	  layer.open({
        type: 1,
        title: '修改用户信息',
		maxmin: true, 
		shadeClose:false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_menber_style'),
		btn:['提交','取消'],
		yes:function(index,layero){	
		 var num=0;
		 var str="";
     $(".add_menber input[type$='text']").each(function(n){
          if($(this).val()=="")
          {
               
			   layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',				
				icon:0,								
          }); 
		    num++;
            return false;            
          } 
		 });
		  if(num>0){  return false;}	 	
          else{
			  layer.alert('添加成功！',{
               title: '提示框',				
			icon:1,		
			  });
			   layer.close(index);	
		  }		  		     				
		}
    });
}
/*友情链接-删除*/
function member_del(obj,id){
  // alert(id);
	layer.confirm('确认要删除吗？',function(index){
    $.post('/admin/links/'+id,{"_token": "{{ csrf_token() }}","_method":"DELETE"},function(data){
      alert(data);
      if(data == 1){

        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
      }else{
        layer.msg('删除失败',{icon: 5,time:1000});
      }
    })
		
	});
}
laydate({
    elem: '#start',
    event: 'focus' 
});

</script>
 </body>
</html>