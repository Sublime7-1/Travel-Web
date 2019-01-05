<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
        <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/style/admin/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/style/admin/js/jquery-1.9.1.min.js"></script>
		<script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>   
        <script src="/style/admin/js/lrtk.js" type="text/javascript" ></script>		
		<script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>                 
<title>意见列表</title>
</head>

<body>
<div class="page-content clearfix">
 <div class="sort_style">
 	 <div class="search_style"> 
      <form action="/admin/links" method="get">
        <input type="hidden" name="_token" value="asb3PQMoft9KLZz4VM70GW06EBcGVoZfiT0nDoh6">
        <ul class="search_content clearfix"> 
         <li><label class="l_f">链接名称 :</label><input name="name" type="text" class="text_add" placeholder="  输入链接名称..." value="" style=" width:200px;height: 36px"></li> 
         <!-- <li><label class="l_f">申请时间 :</label><input placeholder="  点击选择时间..." class="inline name="laydate-icon" id="start" style=" margin-left:10px;" /></li> --> 
         <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li> 
        </ul> 
      </form>
     </div>
     <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
        <a href="javascript:ovid()" class="btn btn-info" onclick="return history.go(-1)"><i class="fa fa-reply-all"></i> 返回</a>        
       </span>
       <span class="r_f">共：<b><?php echo e(isset($total) ? $total : '0'); ?> </b>条</span>
     </div>
	<!-- 验证消息 -->
      <?php $errorss='错误信息 :' ?>
      <?php if(count($errors) > 0): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $errorss = $errorss."<br>".$error ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <script>layer.msg("<?php echo $errorss; ?>",{icon: 5,time:5000});</script>
      <?php endif; ?>
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
  <div class="sort_list">
  <?php if(isset($data)): ?>
    <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 	<tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
				<th width="100px">留言者</th>
				<th width="100px">管理者</th>
				<th width="100px">意见类型</th>                
				<th>留言内容</th>
				<th width="200px">相关截图</th>
				<th width="120px">邮箱地址</th>
				<th width="120px">手机号码</th>
				<th width="120px">查看详情</th>
				<th width="120px">状态</th>
				<th width="120px">操作</th>
			</tr>
		</thead>
		<tbody>
		  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      <tr>
	       <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
	       <td><?php echo e($v->id); ?></td>
	       <td><?php echo e($v->uname); ?></td>
	       <td><?php echo e(session('AdminUserInfo.name')); ?></td>
	       <td><?php echo e($v->type); ?></td>
	       <td><?php echo e($v->content); ?></td>	       
	       <td>
	       		<?php if($v->img == ''): ?>
	       			<?php echo e($v->img); ?>

	       		<?php else: ?>
	       			<img src="<?php echo e($v->img); ?>" width="100px">
	       		<?php endif; ?>
	       </td>
	       <td><?php echo e($v->email); ?></td>
	       <td><?php echo e($v->phone); ?></td>
	       <td class="td-manage">
	         <a title="查看" href="javascript:;" onclick="member_see('<?php echo e($v->uname); ?>','<?php echo e($v->id); ?>')" class="btn btn-xs btn-info" >点击查看</a>   
	       </td>
	       <td class="td-status">
	        	<?php if($v->status == '未读'): ?>
	        		<span class="label label-success radius"><?php echo e($v->status); ?></span>
		        <?php elseif($v->status == '已读'): ?>
	        		<span class="label label-info radius"><?php echo e($v->status); ?></span>
		        <?php else: ?>
		            <span class="label label-defaunt radius"><?php echo e($v->status); ?></span>
		        <?php endif; ?>
	       </td>
	       <td class="td-manage td-manages"> 
	        <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo e($v->id); ?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash  bigger-120"></i></a>
	       </td>
	      </tr>
	      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    </tbody>
    </table>
    <?php else: ?>
    <table class="table table-striped table-bordered table-hover" id="sample-table">
		<thead>
		 	<tr>
				<th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
				<th width="80px">ID</th>
				<th width="100px">留言者</th>
				<th width="100px">管理者</th>
				<th width="100px">意见类型</th>                
				<th>留言内容</th>
				<th>相关截图</th>
				<th width="120px">邮箱地址</th>
				<th width="120px">手机号码</th>
				<th width="100px">查看详情</th>
				<th width="100px">状态</th>
				<th width="160px">操作</th>
			</tr>
		</thead>
		<tbody>
	      <tr>
	      	<td colspan="12" style="padding: 20px 0">
	       		<b style="font-size: 20px;">您所拥有的权限暂且不允许查看本页面,请联系超级管理员 ! ! !</b>
	       	</td>
	      </tr>
	    </tbody>
    </table>
    <?php endif; ?>
  </div>
 </div>
</div>

<!--查看意见-->
<div class="sort_style_edit margin" id="sort_style_see" style="display:none">

</div>

</body>
</html>
<script type="text/javascript">
function checkLength(which) {
	var maxChars = 200; //
	if(which.value.length > maxChars){
	   layer.open({
	   icon:2,
	   title:'提示框',
	   content:'您出入的字数超多限制!',	
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


/*意见-查看*/
function member_see(name,id){
	$.get('/admin/advices/'+id,{},function(data){
		$('#sort_style_see').html(data);
		layer.open({
	        type: 1,
	        title: '查看用户:'+name+' 的意见',
			maxmin: true, 
			shadeClose: false, //点击遮罩关闭层
	        area : ['750px' , ''],
	        content:$('#sort_style_see'),
	    })
	})
}

/*意见-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
        $.get("/admin/advices/del",{'id':id},function(data){
        	// alert(data);
        	if(data == 1){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});    		
        	}else{
				layer.msg('删除失败!',{icon:1,time:1000});    		
        	}
		});
	})
}

//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,.ads_link').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
	
});
function AdlistOrders(id){
	window.location.href = "Ads_list.html?="+id;
};
</script>
<script type="text/javascript">
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6,7,8,9,11]}// 制定列不参与排序
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
</script>