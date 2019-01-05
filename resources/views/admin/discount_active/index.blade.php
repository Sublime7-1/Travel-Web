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
  <title>优惠活动列表</title> 
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
      <form action="/admin/discountActive" method="get">
        {{csrf_field()}}
        <ul class="search_content clearfix"> 
         <li><label class="l_f">商品名称 :</label><input name="title" type="text" class="text_add" placeholder="  输入商品名称..." value="{{$request->title or ''}}" style=" width:200px;height: 36px" /></li> 
         <!-- <li><label class="l_f">申请时间 :</label><input placeholder="  点击选择时间..." class="inline name="laydate-icon" id="start" style=" margin-left:10px;" /></li> --> 
         <li style="width:90px;"><button type="submit" class="btn_search"><i class="icon-search"></i>查询</button></li> 
        </ul> 
      </form>
     </div> 
     <!----> 
     <div class="border clearfix">
      <a class="btn btn-info" href="/admin/discountActive/create">添加优惠活动</a> 
      <a class="btn btn-success" href="/admin/discountActive">查看所有优惠活动</a>
      <span class="r_f">共：<b>{{$num or '0'}} </b>条</span> 
     </div> 
     <!----> 
     <div class="table_menu_list">
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
      <table class="table table-striped table-bordered table-hover" id="sample-table"> 
       <thead> 
        <tr> 
         <th width="10"><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></th> 
         <th width="250">优惠名称</th> 
         <th width="250">商品名称</th> 
         <th width="100">优惠金额(<b style="color: black"> 元</b> )</th> 
         <th>优惠详情</th> 
         <th width="90">开始时间</th> 
         <th width="90">结束时间</th>  
         <th width="120">操作</th> 
        </tr> 
       </thead> 
       <tbody>
        @foreach($data as $v)
        <tr> 
         <td><label><input type="checkbox" class="ace" /><span class="lbl"></span></label></td> 
         <td>{{$v->name}}</td> 
         <td>{{$v->goods_id}}</td> 
         <td>{{$v->discount_amount}}</td> 
         <td>{!!$v->content!!}</td> 
         <td>{{$v->begin_time}}</td> 
         <td>{{$v->end_time}}</td>   
       	 <td>
          <a title="编辑" href="/admin/discountActive/{{$v->id}}/edit" class="btn btn-xs btn-info"><i class="icon-edit  bigger-120"></i></a> 
          <a title="删除" href="javascript:;" onclick="member_del(this,{{$v->id}})" class="btn btn-xs btn-danger"><i class="icon-trash  bigger-120"></i></a> 
       	 </td> 
        </tr> 
        @endforeach
       </tbody> 
       <div class="clear:both"></div>
       
      </table>
    </div> 
    <div style="margin:0 auto;text-align:center" id="list">
         {{$data->render()}}
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
// function member_edit(id){
// 	$.get('/admin/coupon/'+id+'/edit',{},function(data){
// 		$('#edit_menber_style').html(data);
// 		layer.open({
// 	        type: 1,
// 	        title: '修改优惠券信息',
// 			maxmin: true, 
// 			shadeClose:false, //点击遮罩关闭层
// 	        area : ['800px' , ''],
// 	        content:$('#edit_menber_style'),
// 		})
// 	})	
// }
/*优惠券-删除*/
function member_del(obj,id){
  // alert(id);
	layer.confirm('确认要删除吗？',function(index){
    $.post('/admin/discountActive/'+id,{"_token": "{{ csrf_token() }}","_method":"DELETE"},function(data){
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