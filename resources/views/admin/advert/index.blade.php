<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="renderer" content="webkit|ie-comp|ie-stand" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" /> 
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
  <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script> 
  <script src="/style/admin/js/lrtk.js" type="text/javascript"></script> 
  <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script> 
  <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script> 
  <script src="/style/admin/assets/layer/layer.js" type="text/javascript"></script> 
  <script type="text/javascript" src="/style/admin/Widget/swfupload/swfupload.js"></script> 
  <script type="text/javascript" src="/style/admin/Widget/swfupload/swfupload.queue.js"></script> 
  <script type="text/javascript" src="/style/admin/Widget/swfupload/swfupload.speed.js"></script> 
  <script type="text/javascript" src="/style/admin/Widget/swfupload/handlers.js"></script> 
  <title>广告管理</title> 
 </head> 
 <body> 
  <div class=" clearfix" id="advertising"> 
   <div id="scrollsidebar" class="left_Treeview"> 
    <div class="show_btn" id="rightArrow">
     <span></span>
    </div> 
    <div class="widget-box side_content"> 
     <div class="side_title">
      <a title="隐藏" class="close_btn"><span></span></a>
     </div> 
     <div class="side_list"> 
      <div class="widget-header header-color-green2"> 
       <h4 class="lighter smaller">广告图分类</h4> 
      </div> 
      <div class="widget-body"> 
       <ul class="b_P_Sort_list"> 
        <li><i class="orange  fa fa-university"></i><a href="/admin/advert">全部 ( {{$total}} )</a></li> 
       	@foreach($info as $k=>$v)
        <li><i class="fa fa-image pink "></i> <a href="/admin/advert?id={{$v->id}}">{{$v->name}}</a> ( {{$v->num}} )</li> 
        @endforeach
       </ul> 
      </div> 
     </div> 
    </div> 
   </div>
   <div class="Ads_list"> 
    <div class="border clearfix"> 
     <span class="l_f"> <a href="javascript:ovid()" id="ads_add" class="btn btn-warning"><i class="fa fa-plus"></i> 添加广告</a> <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a> <a href="javascript:ovid()" class="btn btn-info" onclick="return history.go(-1)"><i class="fa fa-reply-all"></i> 返回</a></span> 
     <span class="r_f">共：<b>{{$total}}</b>条广告</span> 
    </div> 
    <!-- 验证消息 -->
	@if (count($errors) > 0)
	<div class="alert alert-danger">
	    <div class="mws-form-message error">
	        <ul>
	        @foreach ($errors->all() as $error)
	          <script>layer.msg("{{$error}}",{icon: 5,time:1000});</script>
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
  @if(session('success'))
  <div class="alert alert-success">
  <div class="mws-form-message success">
      {{session('success')}}
  </div>
  </div>
  <script>
  setTimeout(function(){
      $('.alert-success').hide();
  },2000);
  </script>
  @endif
  @if(session('error'))
  <div class="alert alert-danger">
  <div class="mws-form-message warning">
      {{session('error')}}
  </div> 
  </div>  
  <script>
  setTimeout(function(){
      $('.alert-danger').hide();
  },2000);
  </script>
  @endif
    <div class="Ads_lists"> 
     <table class="table table-striped table-bordered table-hover" id="sample-table"> 
      <thead> 
       <tr> 
        <th width="25"><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></th> 
        <th width="80">ID</th> 
        <th>排序</th> 
        <th width="150">分类</th> 
        <th width="220px">图片</th> 
        <th width="100px">放置区域</th> 
        <th width="180px">添加时间</th> 
        <th width="180px">修改时间</th> 
        <th width="70px">状态</th> 
        <th width="100px">商品id</th> 
        <th width="250px">操作</th> 
       </tr> 
      </thead> 
      <tbody> 
       	@foreach($info as $k=>$v)
       <tr> 
        <td><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></td> 
        <td>{{$i++}}</td> 
        <td>
        	<input name="" readonly type="text" style=" width:50px" placeholder="{{$v->sort}}" />
        	<!-- <span class="cont_style"> 
	     	<select class="form-control" id="form-field-select-1" name="sort"> 
	     		<option value="0">选择分类</option> 
       			@foreach($v->sorts as $vv)
	     		<option value="{{$vv}}" @if($v->sort == $vv) selected @endif>{{$vv}}</option>
	     		@endforeach
	     	</select>
	    </span>  -->
        </td> 
        <td>{{$v->name}}</td> 
        <td><span class="ad_img">@if($v->img != '0')<img src="{{$v->img}}" width="100%" height="100%" />@else无@endif</span></td> 
        <td>{{$v->area}}</td> 
        <td>{{$v->addtime}}</td> 
        <td>{{$v->uptime}}</td>  
        <td class="td-status">
        	@if($v->status == '显示')
        		<span class="label label-success radius">{{$v->status}}</span>
	        @else
	            <span class="label label-defaunt radius">{{$v->status}}</span>
	        @endif
        </td> 
        <td>{{$v->gid}}</td> 
        <td class="td-manage"> 
        	@if($v->status == '显示')
            <a onclick="member_stop(this,{{$v->id}})"  href="javascript:;" title="隐藏"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>
            @else
            <a style="text-decoration:none" class="btn btn-xs " onclick="member_start(this,{{$v->id}})" href="javascript:;" title="显示"><i class="fa fa-close bigger-120"></i></a>
            @endif 
        	<a title="编辑"  value="{{$v->id}}" href="javascript:;" class="btn btn-xs btn-info ads_edit"><i class="fa fa-edit bigger-120"></i></a> 
        	<a title="删除" href="javascript:;" onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-warning"><i class="fa fa-trash  bigger-120"></i></a> </td> 
       </tr> 
        @endforeach
      </tbody> 
     </table> 
    </div> 
   </div> 
  </div> 
  <!--添加广告样式--> 
  <div id="add_ads_style" style="display:none"> 
  	<form action="/admin/advert" method="post" enctype="multipart/form-data" id="adderror">
  		{{csrf_field()}}
   <div class="add_adverts"> 
    <ul> 
     <li> <label class="label_name">所属分类</label> 
     	<span class="cont_style"> 
	     	<select class="form-control" id="form-field-select-1" name="pid"> 
	     		<option value="0">选择分类</option> 
       			@foreach($info as $k=>$v)
	     		<option value="{{$v->id}}">{{$v->name}}</option>
	     		@endforeach
	     	</select>
	    </span> 
	 </li> 
     <li><label class="label_name">广告名字</label>
     	<span class="cont_style">
     		<input name="name" type="text" id="form-field-3" placeholder="&nbsp;&nbsp;请输入名字..." class="col-xs-10 col-sm-6" style="width:200px" />
     	</span>
     </li> 
     <li><label class="label_name">商品ID</label>
     	<input name="gid" type="text" id="form-field-3" class="col-xs-10 col-sm-6" style="width:50px" />
 	 </li> 
     <li><label class="label_name">排序</label><span class="cont_style"><input name="sort" type="text" id="form-field-3" placeholder="0" class="col-xs-10 col-sm-5" style="width:50px" /></span></li>
     <li><label class="label_name">放置区域</label>
     	<span class="cont_style"> &nbsp;&nbsp;
     		<label>
     			<input name="area" type="radio" value="0" checked="checked" class="ace" /><span class="lbl">轮播区域</span>
     		</label>&nbsp;&nbsp;&nbsp; 
     		<label>
   				<input name="area" value="1" type="radio" class="ace" /><span class="lbl">头部区域</span>
   			</label>
   			<label>
   				<input name="area" value="2" type="radio" class="ace" /><span class="lbl">内容区域</span>
   			</label>
   			<label>
   				<input name="area" value="3" type="radio" class="ace" /><span class="lbl">尾部区域</span>
   			</label>
   			<label>
   				<input name="area" value="4" type="radio" class="ace" /><span class="lbl">商品区域</span>
   			</label>
     	</span>
     </li>  
     <li><label class="label_name">状&nbsp;&nbsp;态：</label> 
     	<span class="cont_style"> &nbsp;&nbsp;
     		<label>
     			<input name="status" type="radio" value="0" checked="checked" class="ace" /><span class="lbl">显示</span>
     		</label>&nbsp;&nbsp;&nbsp; 
     		<label>
   				<input name="status" type="radio" value="1" class="ace" /><span class="lbl">隐藏</span>
   			</label>
     	</span>
      <div class="prompt r_f"></div> 
  	 </li> 
 	 <li><label class="label_name">广告图片</label>
     	<input name="img" type="file" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px" />
 	 </li> 
 	 <li>
 	 	<div class="col-md-offset-1"><input type="submit" class="btn btn-success radius" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="btn btn-danger radius" value="重置"></div>
 	 </li>
    </ul> 
   </div> 
   </form>
  </div> 
  <!--修改广告样式--> 
    <div id="edit_ads_style" style="display:none"> 
	</div>  
  <script>
  $('#adderror').submit(function(){
    str=$('#adderror').serialize();
    var bool = false;
    $.ajax({
       type:"GET",
       url:"/admin/advert/checkup",
       data:{'str':str},
       async:false,
       success:function(data){
          if(data != 1){
            
            layer.msg(""+data+"",{icon: 5,time:1000});
            bool = false;
          }else{
            bool = true;
          }
      }

     }); 
    return bool;

});
//初始化宽度、高度  
 $(".widget-box").height($(window).height()); 
 $(".Ads_list").width($(window).width()-220);
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
	$(".widget-box").height($(window).height());
	 $(".Ads_list").width($(window).width()-220);
	});
	$(function() { 
	$("#advertising").fix({
		float : 'left',
		//minStatue : true,
		skin : 'green',	
		durationTime :false,
		stylewidth:'220',
		spacingw:30,//设置隐藏时的距离
	    spacingh:250,//设置显示时间距
		set_scrollsidebar:'.Ads_style',
		table_menu:'.Ads_list'
	});
});
/*广告图片-停用*/
function member_stop(obj,id){
	// alert(id);
	layer.confirm('确认要关闭吗？',function(index){
		$.get('/admin/advert/status',{'status':1,'id':id},function(data){
			// alert(data);
            if(data == 1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs " onclick="member_start(this,'+id+')" href="javascript:;" title="显示"><i class="fa fa-close bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">隐藏</span>');
                $(obj).remove();
                layer.msg('隐藏!',{icon: 5,time:1000});
            }else{
                layer.msg('修改失败',{icon: 5,time:1000});
            }          
        });

	});
}
/*广告图片-启用*/
function member_start(obj,id){
	layer.confirm('确认要显示吗？',function(index){
		$.get('/admin/advert/status',{'status':0,'id':id},function(data){
            if(data == 1){
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" class="btn btn-xs btn-success" onclick="member_stop(this,'+id+')" href="javascript:;" title="隐藏"><i class="fa fa-check  bigger-120"></i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">显示</span>');
                $(obj).remove();
                layer.msg('显示!',{icon: 6,time:1000});
            }else{
                layer.msg('修改失败',{icon: 6,time:1000});
            }          
        });
	});
}
/*广告图片-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',{icon:0,},function(index){
        $.get("/admin/advert/del",{'id':id},function(data){
        	// alert(data);
        	if(data == 1){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});    		
        	}else{	
	        	alert('删除失败,原因:该类下有子类');
        	}
		});
	})
}
/*******添加广告*********/
 $('#ads_add').on('click', function(){
	  layer.open({
        type: 1,
        title: '添加广告',
		maxmin: true, 
		shadeClose: false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#add_ads_style'),
     })

})
/*******修改广告*********/
$('.ads_edit').on('click', function(){
	// 获取当前对象的val值
	var id=$(this).attr('value');
	// alert(id);
	$.get('/admin/advert/'+id+'/edit',{},function(data){
		// console.log(data);
		$('#edit_ads_style').html(data);
		layer.open({
	        type: 1,
	        title: '修改广告',
			maxmin: true, 
			shadeClose: false, //点击遮罩关闭层
	        area : ['800px' , ''],
	        content:$('#edit_ads_style'),
	    });
	});

})
</script> 
  <script type="text/javascript">
function updateProgress(file) {
	$('.progress-box .progress-bar > div').css('width', parseInt(file.percentUploaded) + '%');
	$('.progress-box .progress-num > b').html(SWFUpload.speed.formatPercent(file.percentUploaded));
	if(parseInt(file.percentUploaded) == 100) {
		// 如果上传完成了
		$('.progress-box').hide();
	}
}

function initProgress() {
	$('.progress-box').show();
	$('.progress-box .progress-bar > div').css('width', '0%');
	$('.progress-box .progress-num > b').html('0%');
}

function successAction(fileInfo) {
	var up_path = fileInfo.path;
	var up_width = fileInfo.width;
	var up_height = fileInfo.height;
	var _up_width,_up_height;
	if(up_width > 120) {
		_up_width = 120;
		_up_height = _up_width*up_height/up_width;
	}
	$(".logobox .resizebox").css({width: _up_width, height: _up_height});
	$(".logobox .resizebox > img").attr('src', up_path);
	$(".logobox .resizebox > img").attr('width', _up_width);
	$(".logobox .resizebox > img").attr('height', _up_height);
}

var swfImageUpload;
$(document).ready(function() {
	var settings = {
		flash_url : "Widget/swfupload/swfupload.swf",
		flash9_url : "Widget/swfupload/swfupload_fp9.swf",
		upload_url: "upload.php",// 接受上传的地址
		file_size_limit : "5MB",// 文件大小限制
		file_types : "*.jpg;*.gif;*.png;*.jpeg;",// 限制文件类型
		file_types_description : "图片",// 说明，自己定义
		file_upload_limit : 100,
		file_queue_limit : 0,
		custom_settings : {},
		debug: false,
		// Button settings
		button_image_url: "Widget/swfupload/upload-btn.png",
		button_width: "95",
		button_height: "30 ",
		button_placeholder_id: 'uploadBtnHolder',
		button_window_mode : SWFUpload.WINDOW_MODE.TRANSPARENT,
		button_cursor : SWFUpload.CURSOR.HAND,
		button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,
		
		moving_average_history_size: 40,
		
		// The event handler functions are defined in handlers.js
		// swfupload_preload_handler : preLoad,
		// swfupload_load_failed_handler : loadFailed,
		file_queued_handler : fileQueued,
		file_dialog_complete_handler: fileDialogComplete,
		upload_start_handler : function (file) {
			initProgress();
			updateProgress(file);
		},
		upload_progress_handler : function(file, bytesComplete, bytesTotal) {
			updateProgress(file);
		},
		upload_success_handler : function(file, data, response) {
			// 上传成功后处理函数
			var fileInfo = eval("(" + data + ")");
			successAction(fileInfo);
		},
		upload_error_handler : function(file, errorCode, message) {
			alert('上传发生了错误！');
		},
		file_queue_error_handler : function(file, errorCode, message) {
			if(errorCode == -110) {
				alert('您选择的文件太大了。');	
			}
		}
	};
	swfImageUpload = new SWFUpload(settings);
});
</script> 
  <script>
jQuery(function($) {
				var oTable1 = $('#sample-table').dataTable( {
				"aaSorting": [[ 1, "asc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,3,4,5,6,7,8,10]}// 制定列不参与排序
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
 </body>
</html>