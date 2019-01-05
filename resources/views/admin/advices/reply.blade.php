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

  <title>意见回复</title> 
 </head> 
 <body> 
  <div class="page-content clearfix"> 
   <div id="Member_Ratings"> 
    <div class="d_Confirm_Order_style"> 
      <!-- 验证消息 -->
      <!-- 验证消息 -->
      <?php $errorss='错误信息 :' ?>
      @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
              <?php $errorss = $errorss."<br>".$error ?>
            @endforeach
            <script>layer.msg("{!!$errorss!!}",{icon: 5,time:5000});</script>
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
     <!----> 
     <div class="table_menu_list container"> 
      <form action="/admin/advices" method="post">

        <input type="hidden" name="uid" value="{{$data['uid']}}">
        <input type="hidden" name="advices_id" value="{{$data['advices_id']}}">
        <input type="hidden" name="admin_id" value="{{session('AdminUserInfo.id')}}">

        {{csrf_field()}}
        <br>  
        <h2 style="text-align: center;">意见回复</h2>
        <br>
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>接收者 : </label>
            <div class="formControls" style="width: 500px">
                <input type="text" class="input-text" id="user-name" value="{{$data['uname']}}" readonly style="margin-left: 0;width: 500px;height: 40px">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>回复者 : </label>
            <div class="formControls" style="width: 500px">
                <input type="text" class="input-text" id="user-name" value="{{session('AdminUserInfo.name')}}" readonly style="margin-left: 0;width: 500px;height: 40px">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>标题 : </label>
            <div class="formControls" style="width: 500px">
                <input type="text" class="input-text" id="user-name" name="title" value="&nbsp;&nbsp;尊敬的用户,您的反馈已得到回复,请点击查看 ! ! !" required style="margin-left: 0;width: 500px;height: 40px">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label" style="font-size: 16px;width: 120px"><span class="c-red">* </span>回复内容 : </label>
            <div class="formControls">
                <script id="editor" type="text/plain" name="content" style="width:1000px;height:400px;">{{old('content')}}</script>
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div> 
         <div class="form-group col-md-offset-1">
            <label class="form-label"><span class="c-red"></span></label>
            <div class="formControls" style="margin-left: 36px">
                <input type="submit" class="btn btn-success" value="发送">&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" class="btn btn-danger" value="重置">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
         </div> 
        </form>   
     </div> 

    </div> 
   </div> 
  </div>   
 </body>
  <script type="text/javascript">
  //实例化编辑器
  //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');



  </script>
</html>