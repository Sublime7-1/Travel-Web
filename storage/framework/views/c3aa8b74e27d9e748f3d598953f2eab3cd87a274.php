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
      <form action="/admin/coupon/indexs" method="get">
        <?php echo e(csrf_field()); ?>

        <ul class="search_content clearfix"> 
         <li><label class="l_f">商品旅程 :</label><input name="money" type="text" class="text_add" placeholder="  输入数字..." value="<?php echo e(isset($request->money) ? $request->money : ''); ?>" style=" width:200px;height: 36px" /></li> 
         <!-- <li><label class="l_f">申请时间 :</label><input placeholder="  点击选择时间..." class="inline name="laydate-icon" id="start" style=" margin-left:10px;" /></li> --> 
         <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li> 
        </ul> 
      </form>
     </div> 
     <!----> 
     <div class="border clearfix"> 
      <button class="btn btn-success">查看商品旅程城市</button>
      <span class="r_f">共：<b><?php echo e($count); ?> </b>条</span> 
     </div> 
     <!----> 
     <div class="table_menu_list">
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
      <table class="table table-striped table-bordered table-hover" id="sample-table"> 
       <thead> 
        <tr> 
         <th width="25"><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></th> 
         <th width="100">商品名称</th> 
         <th width="100">航空公司</th> 
         <th width="100">起飞机场</th> 
         <th width="120">落地机场</th> 
         <th width="80">起飞时间</th> 
         <th width="160">出发城市</th> 
         <th width="300">到达城市</th> 
         <th width="300">路程时间</th> 
         <th width="300">机票类型</th> 
         <th width="140">操作</th> 
        </tr> 
       </thead> 
       <tbody>
       <?php $__currentLoopData = $goods_city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <tr> 
        
         <td><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></td> 
         <td><?php echo e($v->goods_id); ?></td> 
         <td><?php echo e($v->city_name); ?></td> 
         <td><?php echo e($v->begin_fei); ?></td> 
         <td><?php echo e($v->end_fei); ?></td> 
         <td><?php echo e($v->begin_fei_time); ?></td> 
         <td><?php echo e($v->begin_city); ?></td> 
         <td><?php echo e($v->end_city); ?></td> 
         <td><?php echo e($v->begin_city_time); ?> -- <?php echo e($v->end_city_time); ?></td> 
        
          <td id="shou"><button class="btn btn-success"><?php echo e($v->type); ?></button></td>
       
         
      
       	 <td>
          <a title="编辑" href="/admin/goodsinfo/city/<?php echo e($city_id[$k]['goods_id']); ?>" class="btn btn-xs btn-info"><i class="icon-edit  bigger-120"></i></a> 
         
       	 </td> 
        </tr> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody> 
       <div class="clear:both"></div>
       <div style="margin:0 auto;text-align:center" id="list"><?php echo e($goods_city->links()); ?></div>
      </table> 
    </div> 
    </div> 
   </div> 
  </div> 
  <div class="add_menber" id="edit_menber_style" style="display:none"></div>
    
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


/*优惠券-编辑*/
function member_edit(id){
	$.get('/admin/coupon/'+id+'/edit',{},function(data){
		$('#edit_menber_style').html(data);
		layer.open({
	        type: 1,
	        title: '修改优惠券信息',
			maxmin: true, 
			shadeClose:false, //点击遮罩关闭层
	        area : ['800px' , ''],
	        content:$('#edit_menber_style'),
		})
	})	
}
/*优惠券-删除*/
function member_del(obj,id){
  // alert(id);
	layer.confirm('确认要删除吗？',function(index){
    $.post('/admin/coupon/'+id,{"_token": "<?php echo e(csrf_token()); ?>","_method":"DELETE"},function(data){
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

function shou(i){
    
}
</script>
 </body>
</html>