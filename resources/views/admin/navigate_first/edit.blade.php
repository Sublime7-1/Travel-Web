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
 <div class="type_title">导航一级分类信息</div>
  <div class="type_content">
  <div class="Operate_btn">
  <a href="javascript:ovid()" class="btn  btn-warning"><i class="icon-edit align-top bigger-125"></i>新增子类型</a>
  <a href="javascript:ovid()" class="btn  btn-success"><i class="icon-ok align-top bigger-125"></i>禁用该类型</a>
  <a href="javascript:ovid()" class="btn  btn-danger"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
  </div>
  <form action="/admin/NavigateFirst/{{$data->id}}" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-user-add">
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
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>层数：</label>
      <div class="formControls ">
        <select name="level" class="input-text" style="margin-left: 10px;" id="">
          <option value="0">没有层数</option>
          @for($i=1; $i<10; $i++)
          <option value="{{$i}}" @if($data->level == $i) selected @endif>第{{$i}}层</option>
          @endfor
        </select>
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red"></span>图片：</label>
      <div class="formControls " >
        @if(is_file('.'.$data->pic))
          <img src="../../../{{$data->pic}}" width="80" alt="">
        @else
          无
        @endif
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label" style="width: 95px;">上传新图片：</label>
      <div class="formControls " >
        <input type="file" name="pic">
      </div>
    </div>
    <input type="hidden" name="ac" value="0" />
    <div class="">
     <div class="" style=" text-align:center">
      {{csrf_field()}}
      {{method_field('put')}}
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