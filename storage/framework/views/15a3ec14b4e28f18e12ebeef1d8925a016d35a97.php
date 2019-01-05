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

  <script type="text/javascript" charset="utf-8" src="/style/admin/ueditor/ueditor.config.js"></script>
  <script type="text/javascript" charset="utf-8" src="/style/admin/ueditor/ueditor.all.min.js">
  </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加
    载的中文，那最后就是中文-->
  <script type="text/javascript" charset="utf-8" src="/style/admin/ueditor/lang/zh-cn/zh-cn.js">
  </script>

  <title>用户列表</title> 
 </head> 
 <body> 
  <!-- 验证消息 -->
<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
    <div class="mws-form-message error">
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<script>
setTimeout(function(){
    $('.alert-danger').hide();
},2000);
</script>
<?php endif; ?>
  <div class="page-content clearfix"> 
   <div id="Member_Ratings"> 
    <div class="d_Confirm_Order_style"> 
     <div class="search_style"> 
      <form action="/admin/message" method="get">
        <?php echo e(csrf_field()); ?>

        <ul class="search_content clearfix"> 
         <li><label class="l_f">链接名称 :</label><input name="title" type="text" class="text_add" placeholder="  输入链接名称..." value="<?php echo e(isset($request->title) ? $request->title : ''); ?>" style=" width:200px;height: 36px" /></li>
         <!-- <li><label class="l_f">发送时间 :</label><input placeholder="  点击选择时间..." class="inline name="laydate-icon" id="start" style=" margin-left:10px;" /></li> --> 
         <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li> 
        </ul> 
      </form>
     </div> 
     <!----> 
     <div class="border clearfix"> 
      <span class="l_f"><a href="javascript:ovid()" class="btn btn-danger"><i class="icon-trash"></i>批量删除</a> </span> 
      <span class="r_f">共：<b><?php echo e($total); ?> </b>条</span> 
     </div>
       <?php if(session('success')): ?>
  <div class="alert alert-success">
  <div class="mws-form-message success">
      <?php echo e(session('success')); ?>

  </div>
  </div>
  <script>
  setTimeout(function(){
      $('.alert-success').hide();
  },2000);
  </script>
  <?php endif; ?>
  <?php if(session('error')): ?>
  <div class="alert alert-danger">
  <div class="mws-form-message warning">
      <?php echo e(session('error')); ?>

  </div> 
  </div>  
  <script>
  setTimeout(function(){
      $('.alert-danger').hide();
  },2000);
  </script>
  <?php endif; ?>
     <!----> 
     <div class="table_menu_list"> 
      <table class="table table-striped table-bordered table-hover" id="sample-table"> 
       <thead> 
        <tr> 
         <th width="25"><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></th> 
         <th width="80">ID</th> 
         <th>发送者</th>          
         <th width="120">标题</th> 
         <th>发布内容</th> 
         <th>接受者</th>          
         <th width="200">发布时间</th> 
         <th width="200">修改时间</th> 
         <th width="180">操作</th> 
        </tr> 
       </thead> 
       <tbody>
       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <tr> 
         <td><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></td> 
         <td><?php echo e($v->id); ?></td> 
         <td><?php echo e($v->a_name); ?></td>
         <td><?php echo $v->title; ?></td> 
         <td><?php echo $v->content; ?></td> 
         <td><?php echo e($v->u_name); ?></td>
         <td class="text-l"><?php echo e($v->send_time); ?></td> 
         <td class="text-l"><?php echo e($v->up_time); ?></td> 
         <td class="td-manage"> 
          <a title="编辑" href="javascript:;" onclick="member_edit(<?php echo e($v->id); ?>)" class="btn btn-xs btn-info"><i class="icon-edit  bigger-120"></i></a>
          <a title="删除" href="javascript:;" onclick="member_del(this,<?php echo e($v->id); ?>)" class="btn btn-xs btn-warning"><i class="icon-trash  bigger-120"></i></a> 
        </td> 
        </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody> 
      </table> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- 修改消息 -->
  <div class="add_menber" id="edit_menber_style" style="display:none"></div>
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
		  {"orderable":false,"aTargets":[0,2,3,4,5,6]}// 制定列不参与排序
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


/*消息-编辑*/
function member_edit(id){
  $.get('/admin/message/'+id+'/edit',{},function(data){
    // alert(data);
    $('#edit_menber_style').html(data);
	  layer.open({
        type: 1,
        title: '修改发布信息',
    		maxmin: true, 
    		shadeClose:false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#edit_menber_style'), 		
    });    
  })
}
/*站内信息-删除*/
function member_del(obj,id){
  // alert(id);
	layer.confirm('确认要删除吗？',function(index){
    $.post('/admin/message/'+id,{"_token": "<?php echo e(csrf_token()); ?>","_method":"DELETE"},function(data){
      // alert(data);
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