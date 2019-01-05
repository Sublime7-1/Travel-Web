<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet">
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/style/admin/font/css/font-awesome.min.css" />
        <!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
		<script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>   
        <script src="/style/admin/assets/js/ace-extra.min.js"></script>
		<script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>  
        <script src="/style/admin/assets/dist/echarts.js"></script>		 
        <script type="text/javascript" src="/style/admin/js/H-ui.js"></script>          	
		<script src="/style/admin/js/jquery-1.7.2.min.js"></script>
        
<title>支付方式</title>

<style>
	.cate_selected{
		/*border: 2px solid #333; */
		/*padding:5px 10px;*/
		/*cursor: pointer; */
		/*border-radius: 5px;*/
	}
	.form_box{
		padding: 10px 20px;
	}
	#cate_selected_box{
		margin-left: 10px;
		width: 500px;
		min-height: 10px;
		border: 1px solid #ddd; 
		padding: 10px;
		margin-top: -18px;
	}
	.del-btn{
		background: url('/imgs/del-btn.png');
		background-size: 100%;
		width: 15px;
		height: 14px;
		display: inline-block;
		margin-left: 5px;
		margin-right: -8px;

		visibility: hidden;
	}
	#cate_selected_box2{
		margin-left: 10px;
		width: 500px;
		min-height: 10px;
		border: 1px solid #ddd; 
		padding: 10px;
	}
	.del-btn2{
		background: url('/imgs/del-btn.png');
		background-size: 100%;
		width: 15px;
		height: 14px;
		display: inline-block;
		margin-left: 5px;
		margin-right: -8px;

		visibility: hidden;
	}
	.tag-i-display{
		margin-bottom: 5px;
	}
	.tag-i-display:hover i.del-btn{
		visibility: visible;
	}	
	.tag-i-display:hover i.del-btn2{
		visibility: visible;
	}
	.tag-i-display:hover i.del-btn3{
		visibility: visible;
	}
	.tag-i-display:hover i.del-btn4{
		visibility: visible;
	}
	.mws-form-message{
		width: 100%;
		background:pink;
	}
    .abc{
            z-index: 2;
            color: #fff;
            cursor: pointer;
           
           
    }
    .abc a{
        height:15px;
         border: 1px solid #ddd;
    }
    #list{
        padding-left:415px;
    }
   .pagination li{
        display:inline-block;
        float:left;
        border: 1px solid #ddd;
   }
	#place_selected_box{
		margin-left: 10px;
		width: 500px;
		min-height: 10px;
		border: 1px solid #ddd; 
		padding: 10px;
		margin-top: -18px;
	}
#place_selected_box2{
		margin-left: 10px;
		width: 500px;
		min-height: 10px;
		border: 1px solid #ddd; 
		padding: 10px;
		margin-top: -18px;
	}
	.del-btn3{
		background: url('/imgs/del-btn.png');
		background-size: 100%;
		width: 15px;
		height: 14px;
		display: inline-block;
		margin-left: 5px;
		margin-right: -8px;
		visibility: hidden;
	}
	.del-btn4{
		background: url('/imgs/del-btn.png');
		background-size: 100%;
		width: 15px;
		height: 14px;
		display: inline-block;
		margin-left: 5px;
		margin-right: -8px;
		visibility: hidden;
	}
</style>
</head>

<body>
<div class="margin clearfix">
 <div class="defray_style">
  	<div class="search_style">
     <form action="/admin/Goods/" method="get">
	      <ul class="search_content clearfix">
	       <li><label class="l_f">商品名称</label><input name="keyword" type="text"  class="text_add" placeholder="输入商品名称"  value="<?php echo e(isset($keyword) ? $keyword : ''); ?>" style=" width:250px"/></li>
	       <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li>
	      </ul>
      </form>
    </div>
    <div class="border clearfix">
     <span class="l_f">
     	<a href="/admin/Goods" class="btn btn-primary">查看所有商品</a>
        <a href="javascript:ovid()" onclick="add_payment()" class="btn btn-warning Pay_add"><i class="fa fa-credit-card"></i>&nbsp;添加商品</a>
        <a href="javascript:;" id="updateBtn" class="btn btn-success">更新中文分词</a>
        
       </span>
    </div>
    <!--商品列表-->
    <div class="defray_list cover_style clearfix" >
     <div class="type_title">商品列表</div>
      <div class="defray_content clearfix">
      <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <ul class="defray_info" style="width:240px">
           <li class="defray_name" style="overflow:auto; line-height: 40px; width:100%;font-size:14px">
            <a title="编辑" value="" onclick="member_edit(<?php echo e($v->id); ?>)" href="javascript:;"  class="" style="float: left; font-size: 25px; color: white; padding-top: 5px; padding-left: 5px;    font-size: 14px;"><i class="fa fa-pencil"></i></a>
            第 <?php echo e($k+1); ?> 件商品
            <button type="button" class="btn btn-info close" style="color:#393939; float: right; line-height: 30px; background:#b0b0b0; width: 22px;height: 22px;align-content: center;line-height: 19px;padding: 1px 1px;" onclick="clock(this,<?php echo e($v->id); ?>)"><i class="fa fa-remove" style="font-size: 12px;"></i>
            </button>
            </li>
            <li class="name_logo" style="height:115px"><img src="<?php echo e($v->pic); ?>"  height="100%" width="100%"/> </li>
            <li class="description" style="height: 45px;overflow: hidden;    font-size: 12px;
    padding: 4px 16px;">商品名称：<?php echo e($v->title); ?></li>
            <li class="select" style="    font-size: 12px;    height: 21px;">
            <label><input name="status<?php echo e($v->id); ?>" type="radio" value="1" onchange="changeStatus(this,<?php echo e($v->id); ?>)" class="ace" <?php if($v->status==1): ?> checked <?php endif; ?>><span class="lbl">上架</span></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <label><input name="status<?php echo e($v->id); ?>" type="radio" value="2" onchange="changeStatus(this,<?php echo e($v->id); ?>)" class="ace" <?php if($v->status==2): ?> checked <?php endif; ?>><span class="lbl">下架</span></label>
            </li>
            <li class="operating" style="border-bottom: 1px solid #dddddd;">
             <a href="/admin/goodsinfo/travel/<?php echo e($v->id); ?>" class="btn btn-success" style="font-size:12px"><i class="fa  fa-edit "></i>&nbsp;旅游时间</a><a href="/admin/goodsinfo/city/<?php echo e($v->id); ?>" class="btn btn-info" style="font-size:12px"><i class="fa  fa-edit "></i>&nbsp;选择交通</a>
             </li>
             <li class="operating" style="">
             	收藏人数:<?php echo e($v->collect_num); ?>     
            </li>
       </ul>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
      </div>
    </div>
 </div>
</div>
<div style="margin:0 auto;text-align:center" id="list"><?php echo e($goods->appends($request)->render()); ?></div>
<!--添加商品-->

<?php if(count($errors)>0): ?>
	<script>
		layer.alert('<?php echo e($errors->all()[0]); ?>',{
               title: '提示框',				
			  icon:5,		
			  })  
	</script>
<?php endif; ?>
<div id="add_payment_style" style ="display:none"> 
   <form id="payment_checkbox" action="/admin/Goods" method="post" enctype="multipart/form-data">
    


    <?php echo e(csrf_field()); ?>

    <ul class="margin payment_list  clearfix"> 
      <div class="Operate_cont clearfix">
        <label class="form-label" style="width: 107px;"><span class="c-red">*</span>标题：</label>
        <div class="formControls ">
          <input type="text" class="input-text" id="user-name" name="title" value="<?php echo e(old('title')); ?>">
        </div>
      </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>商品价格：</label>
          <div class="formControls">
            <input type="text" class="input-text" placeholder="" value="<?php echo e(old('price')); ?>" id="user-name" name="price">
          </div>
       </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>商品图片：</label>
          <div class="formControls">
              <input name="pic" type="file" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px; margin-left: 10px;" />
          </div>
       </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>是否有接待商：</label>
          <div class="formControls" style="height: 30px; line-height: 30px;">
              <input name="has_receptionist" type="radio" id="form-ield-3" class="col-xs-10 col-sm-6" style="margin-left: 10px;" value="1" />是
              <input name="has_receptionist" type="radio" id="form-ield-3" class="col-xs-10 col-sm-6" checked style="margin-left: 10px;" value="2" />否
              <select name="receptionist" id="receptionist_select" style="display: none;">
              <option value="0">--请选择--</option>
              	<?php $__currentLoopData = $receptionist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receptionist_v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              	<option value="<?php echo e($receptionist_v->id); ?>"><?php echo e($receptionist_v->name); ?></option>
              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
       </div> 
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>是否有品牌：</label>
          <div class="formControls" style="height: 30px; line-height: 30px;">
              <input name="has_brand" type="radio" id="form-field-3" class="col-xs-10 col-sm-6" style="margin-left: 10px;" value="1" />是
              <input name="has_brand" type="radio" id="form-field-3" class="col-xs-10 col-sm-6" checked style="margin-left: 10px;" value="2" />否
               <select name="brand" id="brand_select" style="display: none;">
               <option value="0">--请选择--</option>
              	<?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand_v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              	<option value="<?php echo e($brand_v->id); ?>"><?php echo e($brand_v->name); ?></option>
              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
          </div>
       </div> 
       <!-- 商品分类 -->
      <div class="Operate_cont clearfix">
        <label class="form-label" style="width: 107px;"><span class="c-red">*</span>商品标签：</label>
        <div class="formControls ">
        	<select class="form-control" id="cate_select" style="margin-left: 10px;">
	            <option value="" disabled selected>--请选择--</option>
	            <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
      </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red"></span>选中标签：</label>
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <div id="cate_selected_box"></div>
          </div>
       </div>
		<!-- 景点 -->
		<div class="Operate_cont clearfix">
        <label class="form-label" style="width: 107px;"><span class="c-red">*</span>包含景点：</label>
        <div class="formControls ">
        	<select class="form-control" id="place_select" style="margin-left: 10px;">
	            <option value="" disabled selected>--请选择--</option>
	            <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            <option value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></option>
	            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
      </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red"></span>选中景点：</label>
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <div id="place_selected_box"></div>
          </div>
       </div>

       <input type="hidden" name="admin_id" value="<?php echo e(session('AdminUserInfo.id')); ?>" />
       <div class="Operate_cont clearfix">
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <button class="btn btn-success">提交</button>
          </div>
       </div>
    </ul>

   </form> 
  </div>
  <div class="add_menber" id="edit_menber_style" style="display:none"></div>
    <?php if(session('goods_msg')): ?>
    <script>layer.msg('<?php echo e(session("goods_msg")); ?>',{icon: '<?php echo e(session("tips_code")); ?>',time:1000});</script>
    <?php endif; ?>

</html>
<script>
function select_payment(ojb,id){
	if($('input[name="checkbox"]').prop("checked")){
		 $('.add_content').css('display','block');
		/*  var num=0;
		var str="";
		  $(".add_content input[type$='text']").each(function(n){
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
		  if(num>0){  return false;}	*/
		}
	else{
		 $('.add_content').css('display','none');
		}
}
// 删除商品
function clock(obj,id){
    layer.confirm('确认要删除吗？',function(index){
    	$.post('/admin/Goods/'+id,{'_token':'<?php echo e(csrf_token()); ?>' , '_method':'DELETE'},function(data){
    		if (data==1) {
    			$(obj).parents("ul").remove();
       			layer.msg('修改成功',{icon:1,time:1000});
    		}else{
    			layer.msg('删除失败!',{icon:5,time:1000});
    		}
    	});
    });
}
/*字数限制*/
function checkLength(which) {
	var maxChars = 200; //
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
/**添加支付方式0**/
function add_payment(index ){
        layer.open({
        type: 1,
        title: '添加商品',
		maxmin: true, 
		shadeClose:false,
        area : ['830px' , ''],
        content:$('#add_payment_style'),
		
		yes: function(index){
			var checkbox=$('input[name="checkbox"]');		    			
			if(checkbox.length){
			 var b = false;				
			 for(var i=0; i<checkbox.length; i++){
				if(checkbox[i].checked){
					b = true;
					layer.alert('添加成功！',{
               title: '提示框',				
			  icon:0,		
			  })  
			  layer.close(index);
			   break;	
				}
 		
			 }
			 if(!b){
				   layer.alert('请选择所需要的支付方式！',{
               title: '提示框',				
			icon:0,		
			  }); 

			 }
		  }
			else{
							
			}
			
		}
	})
	
	}
/**面包屑**/
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.details_btn').on('click', function(){
	var cname = $(this).attr("title");
	var cnames = parent.$('.Current_page').html();
	var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
	parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
	//parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
	
});
function Paymentdetails(id){
	window.location.href = "Payment_details.html?="+id;
};

/*产品-编辑*/
function member_edit(id){
	$.get('/admin/Goods/'+id+'/edit',{},function(data){
		$('#edit_menber_style').html(data);
		layer.open({
	        type: 1,
	        title: '修改商品信息',
			maxmin: true, 
			shadeClose:false, //点击遮罩关闭层
	        area : ['800px' , ''],
	        content:$('#edit_menber_style'),
		});
	});
}

// 显示隐藏 receptionist 下拉框
$('input[name=has_receptionist]').change(function(){
	var val = $(this).val();
	switch(val){
		case '1':
			$('#receptionist_select').show();
			break;
		case '2':
			$('#receptionist_select').hide();
			break;
	}
});

// 显示隐藏 brand 下拉框
$('input[name=has_brand]').change(function(){
	var val = $(this).val();
	switch(val){
		case '1':
			$('#brand_select').show();
			break;
		case '2':
			$('#brand_select').hide();
			break;
	}
});

/****************编辑框的显示****************/
// 显示隐藏 receptionist 下拉框
$('input[name=has_receptionist]').live('change',function(){
	var val = $(this).val();
	switch(val){
		case '1':
			$('#receptionist_select2').show();
			break;
		case '2':
			$('#receptionist_select2').hide();
			break;
	}
});

// 显示隐藏 brand 下拉框
$('input[name=has_brand]').live('change',function(){
	var val = $(this).val();
	switch(val){
		case '1':
			$('#brand_select2').show();
			break;
		case '2':
			$('#brand_select2').hide();
			break;
	}
});
/*******************************************/
// 添加分类
$('#cate_select').change(function(){
	var select_obj = $(this);
	var option_obj = $(this).find('option:selected');
	var str = option_obj.text();
	var val = option_obj.val();
	$.get('/admin/getCateName/',{str:str},function(data){
		// 创建一个span对象,追加到盒子中
		$('<span class="btn-info btn tag-i-display">'+data+'<i class="del-btn" title="删除"></i><input type="hidden" name="cate_id[]" value="'+val+'" /></span>').appendTo('#cate_selected_box');
		// 删除select表单中选中的option选项
		option_obj.remove();
		// 将第一个option删除(请选择)
		select_obj.find('option:first').remove();
		// 创建一个option(请选择)放到select表单最前
  		$('<option value="" disabled selected>--请选择--</option>').prependTo(select_obj);
	})
});

// 删除选中的分类
$('.del-btn').live('click',function(){
	// 获取分类id
	var id = $(this).next().val();
	// 获取分类名称
	var name = $(this).parent().text();
	// 创建一个新的option 追加到select表单中
	$('<option value="'+id+'">'+name+'</option>').appendTo($('#cate_select'));
	// 删除当前选中的分类
	$(this).parent().remove();
});

// 更改商品上下架状态
function changeStatus(obj,id){
	// 获取修改后的status值
	var status = $(obj).val();
	$.get('/admin/chan_goods_status/'+id,{'status':status},function(data){
		if (data==1) {
       		layer.msg('修改成功',{icon:1,time:1000});
		}else{
       		layer.msg('修改失败',{icon:1,time:1000});	
		}
	});
}

  // 添加分类
$(document).on("change",'select#cate_select2',function(){
  var select_obj = $(this);
  var option_obj = $(this).find('option:selected');
  var str = option_obj.text();
  var val = option_obj.val();
  $.get('/admin/getCateName',{str:str},function(data){
    // 创建一个span对象,追加到盒子中
    $('<span class="btn-info btn tag-i-display">'+data+'<i class="del-btn2" title="删除"></i><input type="hidden" name="cate_id[]" value="'+val+'" /></span>').appendTo('#cate_selected_box2');
    // 删除select表单中选中的option选项
    option_obj.remove();
    // 将第一个option删除(请选择)
    select_obj.find('option:first').remove();
    // 创建一个option(请选择)放到select表单最前
      $('<option value="" disabled selected>--请选择--</option>').prependTo(select_obj);
  });
 });


// 删除选中的分类
$('.del-btn2').live('click',function(){
  // 获取分类id
  var id = $(this).next().val();
  // 获取分类名称
  var name = $(this).parent().text();
  // 创建一个新的option 追加到select表单中
  $('<option value="'+id+'">'+name+'</option>').appendTo($('#cate_select2'));
  // 删除当前选中的分类
  $(this).parent().remove();
});


// 添加景点
$('#place_select').change(function(){
	var select_obj = $(this);
	var option_obj = $(this).find('option:selected');
	var str = option_obj.text();
	var val = option_obj.val();
	
		// 创建一个span对象,追加到盒子中
		$('<span class="btn-info btn tag-i-display">'+str+'<i class="del-btn3" title="删除"></i><input type="hidden" name="place_id[]" value="'+val+'" /></span>').appendTo('#place_selected_box');
		// 删除select表单中选中的option选项
		option_obj.remove();
		// 将第一个option删除(请选择)
		select_obj.find('option:first').remove();
		// 创建一个option(请选择)放到select表单最前
  		$('<option value="" disabled selected>--请选择--</option>').prependTo(select_obj);
	
});
// 删除选中的景点
$('.del-btn3').live('click',function(){
  // 获取分类id
  var id = $(this).next().val();
  // 获取分类名称
  var name = $(this).parent().text();
  // 创建一个新的option 追加到select表单中
  $('<option value="'+id+'">'+name+'</option>').appendTo($('#place_select'));
  // 删除当前选中的分类
  $(this).parent().remove();
});

// 修改景点页面
$(document).on("change",'select#place_select2',function(){
  var select_obj = $(this);
  var option_obj = $(this).find('option:selected');
  var str = option_obj.text();
  var val = option_obj.val();
    // 创建一个span对象,追加到盒子中
    $('<span class="btn-info btn tag-i-display">'+str+'<i class="del-btn4" title="删除"></i><input type="hidden" name="place_id[]" value="'+val+'" /></span>').appendTo('#place_selected_box2');
    // 删除select表单中选中的option选项
    option_obj.remove();
    // 将第一个option删除(请选择)
    select_obj.find('option:first').remove();
    // 创建一个option(请选择)放到select表单最前
      $('<option value="" disabled selected>--请选择--</option>').prependTo(select_obj);
 });
// 删除选中的景点
$('.del-btn4').live('click',function(){
  // 获取分类id
  var id = $(this).next().val();
  // 获取分类名称
  var name = $(this).parent().text();
  // 创建一个新的option 追加到select表单中
  $('<option value="'+id+'">'+name+'</option>').appendTo($('#place_select2'));
  // 删除当前选中的分类
  $(this).parent().remove();
});

$('#updateBtn').click(function(){
	$.get('/updateParticiple',{},function(data){
		if(data==1){
			layer.msg('更新成功',{icon:1,time:1000});
		}else{
			layer.msg('更新失败',{icon:5,time:1000});
		}
	});
});
</script>





