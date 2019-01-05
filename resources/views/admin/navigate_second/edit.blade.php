<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
 <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/style/admin/css/style.css"/>       
        <link rel="stylesheet" href="/style/admin/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" />
        <link href="/style/admin/Widget/icheck/icheck.css" rel="stylesheet" type="text/css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="/style/admin/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->
        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
<title>添加产品分类</title>
</head>
<body>
<div class="type_style">

  <div class="type_content">

  <form action="/admin/NavigateSecond/{{$data->id}}" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-user-add">
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="{{$data->name}}" placeholder="" id="user-name" name="name">
      </div>
      <span style="color: red;">
        @if(count($errors) > 0)
          @foreach($errors->all() as $error)
            {{$error}}
          @endforeach
        @endif
        </span>
    </div>
    @if(is_file('.'.$data->pic))
    <div class="Operate_cont clearfix">
      <label class="form-label">图片：</label>
      <div class="formControls " >
        <img src="{{$data->pic}}" width="100px" name="pic" style="margin-left: 10px;">
      </div>
    </div>
    @endif
    <div class="Operate_cont clearfix">
      <label class="form-label" style="width: 100px; margin-left: -20px;">上传新图片：</label>
      <div class="formControls " >
        <input type="file" name="pic" style="margin-left: 10px;">
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label" style="margin-left: -10px; width: 90px;"><span class="c-red">*</span>国内/国外：</label>
      <div class="formControls " >
        <input type="radio" name="is_chinese" value="1" style="margin-left: 10px;" @if($data->is_chinese=='国内') checked @endif>国内
        <input type="radio" name="is_chinese" value="2" style="margin-left: 10px;" @if($data->is_chinese=='国外') checked @endif>国外
        <input type="radio" name="is_chinese" value="3" style="margin-left: 10px;" @if($data->is_chinese=='其他') checked @endif>其他
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>热门玩法：</label>
      <div class="formControls " >
        <input type="radio" name="is_popular_game" value="1" style="margin-left: 10px;" @if($data->is_popular_game=='是') checked @endif>是
        <input type="radio" name="is_popular_game" value="0" style="margin-left: 10px;" @if($data->is_popular_game=='否') checked @endif>否
      </div>
    </div>
    <input type="hidden" name="ac" value="0" />
    <div class="">
     <div class="" style=" text-align:center">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <input class="btn btn-primary radius" type="submit" value="提交">
      </div>
    </div>
  </form>
  </div>
</div> 
</div>
<script type="text/javascript" src="/style/admin/Widget/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="Widget/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript" src="/style/admin/assets/layer/layer.js"></script>
<script type="text/javascript" src="/style/admin/js/H-ui.js"></script> 
<script type="text/javascript" src="/style/admin/js/H-ui.admin.js"></script>
<script type="text/javascript">
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#form-user-add").Validform({
        tiptype:2,
        callback:function(form){
            form[0].submit();
            var index = parent.layer.getFrameIndex(window.name);
            parent.$('.btn-refresh').click();
            parent.layer.close(index);
        }
    });
});

$('#user-name').focus(function(){
  $(this).parent().next().html('');
});
</script>
</body>
</html>