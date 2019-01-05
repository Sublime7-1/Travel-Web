<!DOCTYPE html>
<html>
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
  		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
  		<![endif]-->
      <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
  		<script src="/style/home/public/jquery-1.7.2.min.js"></script>
          <script src="/style/admin/assets/js/bootstrap.min.js"></script>
  		<script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>  	         	
          <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
          <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
          <script src="/style/admin/js/H-ui.js" type="text/javascript"></script>
      <title>编辑优惠券</title>
  </head> 
<body>
<div class="margin clearfix">
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
 <div class="article_style">
    <div class="add_content" id="form-article-add">
      <form action="/admin/coupon/{{$data->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
       <ul>
        <li class="clearfix Mandatory"><label class="label_name"><i>*</i>管理员 :</label>
        <span class="formControls col-10"><input type="text" title="管理员" value="{{$admininfo->name}}" id="form-field-1" readonly class="col-xs-10 col-sm-1"></span>
        </li>

        <li class="clearfix cates" id="goods">
          <label class="label_name"><i>*</i>商品名 :</label>
          <span class="formControls col-10"><input type="text" title="商品" value="{{$data->gname}}" id="form-field-1" readonly class="col-xs-10 col-sm-1"></span>
        </li>

        <li class="clearfix cates"><label class="label_name"><i>*</i>劵分类 :</label>
         <span class="formControls col-4">
          <select class="form-control" id="form-field-select-1" title="劵分类" name="pid">
            <option value="">--请选择--</option>
            @foreach($cate as $v)
            <option value="{{$v->id}}" @if($v->id == $data->pid) selected @endif>{{$v->name}}</option>
            @endforeach
          </select>
         </span>
        </li>

        <li class="clearfix Mandatory money"><label class="label_name"><i>*</i>券面值 :</label><span class="formControls col-10"><input type="text" title="券面值" name="money" value="{{$data->money}}" id="form-field-1" required class="col-xs-1"><b>&nbsp;元</b></span></li>

        <li class="clearfix Mandatory money"><label class="label_name"><i>*</i>满足金额 :</label><span class="formControls col-10"><input type="text" title="满足金额" name="max_money" value="{{$data->max_money}}" id="form-field-1" required class="col-xs-1"><b>&nbsp;元</b></span></li>

        <li class="clearfix Mandatory"><label class="label_name"><i>*</i>券描述 :</label><span class="formControls col-10"><input type="text" value="{{$data->desc}}" title="劵描述" name="desc" required placeholder=" 请输入20字以内的描述..." maxlength="20" id="form-field-1" required class="col-xs-10 col-sm-3"></span></li>

        <li class="clearfix"><label class="label_name"><i>*</i>显示时间 :</label>
          <span class="formControls col-10">
          <span class="add_date l_f">
         <label><input type="radio" class="ace" onclick="Enable()"><span class="lbl">显示</span></label>&nbsp;
         <label><input type="radio" class="ace" onclick="closes()"><span class="lbl">不显示</span></label></span>
          <span class="date_Select">
          <input type="text" autocomplete="off" value="{{$data->start_time}}" name="start_time" class="laydate-icon" id="start" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
          <em style="display:block; float:left;margin-right:10px;">至</em>
          <input type="text" autocomplete="off" value="{{$data->end_time}}" name="end_time" class="laydate-icon" id="end" style="width:200px; padding-left:5px; display:block ;float:left"></input>
          </span>
          <b  style=" margin-left:10px; font-weight:normal; color:#F63">注：(该时间用于设置优惠劵是否可以使用的时间段，过了最后的时间段则该优惠劵将失效，无需再次操作，适合活动使用)</b>
         </span>
        </li>
        <li class="clearfix Mandatory">
        <label class="label_name"><i>*</i>活动标题 :</label><span class="formControls col-10"><input name="title" type="text" id="form-field-1" title="活动标题" value="{{$data->title}}" class="col-xs-10 col-sm-5 " placeholder=" 请输入30字以内的标题..." maxlength="30"></span>
        </li>
        <li class="clearfix"><label class="label_name"><i>*</i>活动规则 :</label>
        <span class="formControls col-10"><script id="editor" name="content" type="text/plain" style="width:80%;height:300px; margin-left:10px;">{!!$data->content!!}</script></span>
        </li>
       </ul>
        <div class="Button_operation" style="width: 800px">
  				<button onclick="article_save_submit();" class="btn btn-primary radius" type="submit">保存并提交</button>
  				<button class="btn btn-default radius" type="reset">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
  			</div>
      </form>
    </div>
 </div>
</div>
</body>
</html>
<script type="text/javascript">
// 获取第一级
$.get('/admin/coupon',{'pid':0},function(data){
  // console.log(data);
  $('.ss').attr('disabled','true');
  for (var i = 0; i < data.length; i++) {
    var info = $('<option value='+data[i].id+'>'+data[i].name+'</option>');
    $('#sid').append(info);
  }
},'json')

// 获取其他级别
$('.chang').live('change',function(){
  var obj = $(this);
  // 获取id来查找下一个
  var pid = $(this).val();
  // 每次点击都清除后面的东西
  obj.nextAll('.chang').remove();

  $.get('/admin/coupon',{'pid':pid},function(result){
    // console.log(result);
    if(result != ''){
      // 创建一个标签
      var select =  $('<select class="form-control chang" style="width:30%;display:inline-block"></select>');
      // 创建请选择
      var op = $('<option class="mm">--请选择 --</option>');
      op.appendTo(select);

      for (var i = 0; i < result.length; i++) {
        // 创建option
        var info = $('<option value='+result[i].id+'>'+result[i].name+'</option>');
        // 添加进新的标签
        select.append(info);
      }
      // 添加下一个兄弟元素
      obj.after(select);
      $('.mm').attr('disabled','true');
    }
  },'json')

  $('#goods').show();
  $('.sss').nextAll().remove();
  $.get('/admin/coupon/'+pid,{},function(data){
    // console.log(data);
    if(data != ''){
      $('.sss').attr('disabled','true');
      for (var i = 0; i < data.length; i++) {
        var info = $('<option value='+data[i].id+'>'+data[i].title+'</option>');
        $('#gid').append(info);
      }
    }
  },'json')


})



</script>
<!-- 百度编辑器 -->
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script> 
<!-- 百度编辑器 -->
<script type="text/javascript">
/**提交操作**/
function article_save_submit(){
	   var num=0;
		 var str="";
     // 判断其他是否为空
     $(".Mandatory input[type$='text']").each(function(n){
        if($(this).val()==""){           
			     layer.alert(str+=""+$(this).attr("title")+"不能为空！\r\n",{
                title: '提示框',				
    				    icon:0,								
            }); 
		        num++;
            return false;            
        } 
		 });
     // 判断分类是否空
     $(".cates select").each(function(n){
      if($(this).val()==""){
        layer.alert(str+=""+$(this).attr("title")+"不能为空！\r\n",{
            title: '提示框',       
            icon:0,               
        }); 
        num++;
        return false; 
      }
    })


		if(num>0){  
      return false;
    }else{
			// layer.alert('添加成功！',{
   //      title: '提示框',				
			//    icon:1,		
			// });
			// layer.close(index);	
      return true;
		}		  		     					
	}

// 百度编辑器
$(function(){
	var ue = UE.getEditor('editor');
});
// 百度编辑器

/*radio激发事件*/
function Enable(){ $('.date_Select').css('display','block');}
function closes(){$('.date_Select').css('display','none')}
/**日期选择**/
var start = {
    elem: '#start',
    format: 'YYYY/MM/DD',
    min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY/MM/DD',
    min: laydate.now(),
    max: '2099-06-16 ',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(start);
laydate(end);

</script>
