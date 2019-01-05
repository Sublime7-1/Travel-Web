<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		    <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
		    <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>  	         	
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/style/admin/js/H-ui.js" type="text/javascript"></script>
<title>修改文章</title>
</head>

<body>
<div class="margin clearfix">
 <div class="article_style">
    <?php $errorss='错误信息 :' ?>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
        <?php $errorss = $errorss."<br>".$error ?>
      @endforeach
      <script>layer.msg("{!!$errorss!!}",{icon: 5,time:5000});</script>
    @endif
    <div class="add_content" id="form-article-add">
    <form action="/admin/article/{{$data->id}}" method="post" enctype="multipart/form-data" id="bb">
      {{csrf_field()}}
      {{method_field('put')}}
     <ul>
      <li class="clearfix Mandatory">
      <label class="label_name"><i>*</i>文章标题</label><span class="formControls col-10"><input name="title" type="text" value="{{$data->title}}" id="form-field-1" required class="col-xs-10 col-sm-5 "></span>
      </li>
      <li class="clearfix"><label class="label_name"><i>*</i>文章分类</label>
       <span class="formControls col-4"><select class="form-control" id="form-field-select-1" name="cid">
          <option value="">--选择所属分类--</option>
          @foreach($type as $k=>$v)
          <option value="{{$v->id}}" @if($v->id == $data->cid) selected @endif>{{$v->name}}</option>
          @endforeach
       </select>
       </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i></i>文章商品</label>
      <span class="formControls col-10"><input value="{{$data->gname}}" readonly type="text" id="form-field-1" class="col-xs-10 col-sm-2 "></span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>文章来源</label>
      <span class="formControls col-10"><input name="source" value="{{$data->source}}" required type="text" id="form-field-1" class="col-xs-10 col-sm-2 "></span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i></i>文章缩略图</label>
      <span class="formControls col-10"><img src="{{$data->thumb}}" width="100px"></span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>新缩略图</label>
      <span class="formControls col-10"><input name="thumb" type="file" id="form-field-1" class="col-xs-10 col-sm-2 "></span>
      </li>
      <li class="clearfix"><label class="label_name">文章内容</label>
      <span class="formControls col-10"><script id="editor" name="content" type="text/plain" style="width:80%;height:400px; margin-left:10px;">{!!$data->content!!}</script> </span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i></i>发布时间</label>
      <span class="formControls col-10"><input readonly value="{{$data->add_time}}" type="text" id="form-field-1" class="col-xs-10 col-sm-2 "></span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i></i>修改时间</label>
      <span class="formControls col-10"><input readonly value="{{$data->up_time}}" type="text" id="form-field-1" class="col-xs-10 col-sm-2 "></span>
      </li>
      <li class="clearfix Mandatory"><label class="label_name"><i>*</i>发布状态</label>
        <span class="formControls col-6" style="width: 100px">
          <input name="status" value="0" type="radio" id="form-field-1" class="col-xs-10 col-sm-4" @if($data->status == 0) checked @endif>已发布       
        </span>
        <span class="formControls col-6" style="width: 100px">
          <input name="status" value="1" type="radio" id="form-field-1" class="col-xs-10 col-sm-4" @if($data->status == 1) checked @endif>未发布          
        </span>
      </li>
     </ul>
    <div class="Button_operation" style="width: 600px">
				<button class="btn btn-primary radius" type="submit">保存并提交</button>
				<button onclick="return history.go(-1)" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消并返回&nbsp;&nbsp;</button>
		</div>
  </form>
    </div>
 </div>
</div>
</body>
</html>
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script> 
<script type="text/javascript">
/**提交操作**/
$('#bb').submit(function(){
      var num=0;
      var str="";
     $(".Mandatory input[type$='text']").each(function(n){
        if($(this).val()==""){
          layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',       
                icon:0,               
          }); 
            num++;
            return false;            
        } 
     });

      if(num>0){  
        return false;
      }else{
        // layer.alert('添加成功！',{
        //        title: '提示框',        
        //        icon:1,    
        // });
        //  layer.close(index);  
      } 
})

function article_save_submit(){
	   var num=0;
		 var str="";
     $(".Mandatory input[type$='text']").each(function(n){
        if($(this).val()==""){
          layer.alert(str+=""+$(this).attr("name")+"不能为空！\r\n",{
                title: '提示框',				
				        icon:0,								
          }); 
		        num++;
            return false;            
        } 
		 });
		  if(num>0){  
        return false;
      }else{
			  layer.alert('添加成功！',{
               title: '提示框',				
			         icon:1,		
			  });
			   layer.close(index);	
		  }		  		     					
}
$(function(){
	var ue = UE.getEditor('editor');
});
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
