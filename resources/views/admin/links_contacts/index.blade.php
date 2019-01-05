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
      <link rel="stylesheet" href="/admin/assets/css/ace-ie.min.css" />
    <![endif]-->
    <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
    <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>            
    <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
    <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
<title>友情链接负责人</title>
</head>
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
    },3000);
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
<body>
 <div class="margin clearfix">
   <div class="border clearfix">
       <span class="l_f">
        <a href="javascript:ovid()" id="r_add" class="btn btn-warning" title="添加负责人"><i class="fa fa-plus"></i> 添加负责人</a>
        <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
       </span>
       <span class="r_f">共：<b>{{$total}} </b>位</span>
     </div>
     <div class="compete_list">
       <table id="sample-table-1" class="table table-striped table-bordered table-hover">
     <thead>
      <tr>
        <th class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
        <th>ID</th>
        <th>负责人</th>
        <th>管理区域</th>
        <th>手机号码</th>
        <th>邮箱地址</th>
        <th class="hidden-480">操作</th>
             </tr>
        </thead>
        <tbody>
            @foreach($data as $v)
            <tr>
                <td class="center"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
                <td>{{$v->id}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->business}}</td>
                <td>{{$v->phone}}</td>
                <td>{{$v->email}}</td>
                <td>
                     <a title="编辑" href="javascript:;" value="{{$v->id}}" class="btn btn-xs btn-info r_edit" ><i class="fa fa-edit bigger-120"></i></a>        
                     <a title="删除" href="javascript:;"  onclick="r_del(this,'{{$v->id}}')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
                </td>
            </tr> 
            @endforeach                   
          </tbody>
          </table>
     </div>
 </div>
 <div id="edit_ads_style"></div>
 <!--添加负责人样式-->
  <div id="Competence_add_style" style="display:none">
   <div class="Competence_add_style">
    <br>
    <form action="/admin/links_contacts" method="post" id="add_links_contacts">
      {{csrf_field()}}
     <div class="form-group">
      <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="c-red">*</span>负责人名称 </label>
       <div class="col-sm-9">
          <input type="text" id="form-field-1" placeholder=""  name="name" class="col-xs-10 col-sm-5">
       </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="c-red">*</span>权限名称 </label>
       <div class="col-sm-9">&nbsp;&nbsp;&nbsp; 
          <label>
            <input name="business" type="radio" checked value="0" class="ace"/><span class="lbl">国内业务</span>
          </label>&nbsp;&nbsp;&nbsp; 
          <label>
            <input name="business" value="1" type="radio" class="ace"/><span class="lbl">境外业务</span>
          </label>
       </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="c-red">*</span>手机号码 </label>
       <div class="col-sm-9">
          <input type="text" id="form-field-1" placeholder=""  name="phone" class="col-xs-10 col-sm-5">
       </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <span class="c-red">*</span>邮箱地址 </label>
       <div class="col-sm-9">
          <input type="text" id="form-field-1" placeholder=""  name="email" class="col-xs-10 col-sm-5">
       </div>
    </div>
    <div class="form-group">
       <div class="col-sm-9 col-md-offset-3">
          <input type="submit" id="form-field-1"  class="btn btn-success" value="提交">
          <input type="reset" id="form-field-1" class="btn btn-warning" value="重置">
       </div>
    </div>
    </form>
   </div> 
  </div>
</body>
</html>
<script type="text/javascript">
// 添加广告验证
$('#add_links_contacts').submit(function(){
  str=$('#add_links_contacts').serialize();
  var bool = false;
  $.ajax({
      type:"GET",
      url:"/admin/links_contacts/checkup",
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
/*******添加广告*********/
$('#r_add').on('click', function(){
    layer.open({
        type: 1,
        title: '添加负责人',
        maxmin: true, 
        shadeClose: false, //点击遮罩关闭层
        area : ['800px' , ''],
        content:$('#Competence_add_style'),
     })

})
/*******修改信息*********/
$('.r_edit').on('click', function(){
  // 获取当前对象的val值
  var id=$(this).attr('value');
  // alert(id);
  $.get('/admin/links_contacts/'+id+'/edit',{},function(data){
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
 /*负责人-删除*/
function r_del(obj,id){
  layer.confirm('确认要删除吗？',function(index){
        $.post("/admin/links_contacts/"+id,{"_token": "{{ csrf_token() }}","_method":"DELETE"},function(data){
            if(data == 1){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            }else{
                layer.msg('删除失败!',{icon:1,time:1000});
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
//面包屑返回值
var index = parent.layer.getFrameIndex(window.name);
parent.layer.iframeAuto(index);
$('.Order_form ,#Competence_add').on('click', function(){
  var cname = $(this).attr("title");
  var cnames = parent.$('.Current_page').html();
  var herf = parent.$("#iframe").attr("src");
    parent.$('#parentIframe span').html(cname);
  parent.$('#parentIframe').css("display","inline-block");
    parent.$('.Current_page').attr("name",herf).css({"color":"#4c8fbd","cursor":"pointer"});
  //parent.$('.Current_page').html("<a href='javascript:void(0)' name="+herf+">" + cnames + "</a>");
    parent.layer.close(index);
  
});
</script>