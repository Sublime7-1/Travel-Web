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
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>  
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
        <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>              
        <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
        <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
                      
<title>个人信息管理</title>
</head>

<body>
<div class="clearfix">
 <div class="admin_info_style">
   <div class="admin_modify_style" id="Personal">
     <div class="type_title">管理员信息 </div>
      <div class="xinxi">
        <form onsubmit="return false" id="submit2">
            <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">用户名： </label>
              <div class="col-sm-9"><input type="text" name="name" id="website-title" value="{{$admin->name}}" class="col-xs-7 text_info" disabled="disabled">
              &nbsp;&nbsp;&nbsp;<a href="javascript:ovid()" onclick="change_Password()" class="btn btn-warning btn-xs">修改密码</a></div>
              
              </div>
              <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">性别： </label>
              <div class="col-sm-9">
              <span class="sex">{{$admin->sex}}</span>
                <div class="add_sex">
                <label><input name="sex" type="radio" class="ace" value="0" checked="checked"><span class="lbl" >保密</span></label>&nbsp;&nbsp;
                <label><input name="sex" type="radio" class="ace" value="1" ><span class="lbl">男</span></label>&nbsp;&nbsp;
                <label><input name="sex" type="radio" class="ace" value="2"><span class="lbl">女</span></label>
                </div>
               </div>
              </div>
              <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">移动电话： </label>
              <div class="col-sm-9"><input type="text" name="phone" id="website-title" value="{{$admin->phone}}" class="col-xs-7 text_info" disabled="disabled"></div>
              </div>
              <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">电子邮箱： </label>
              <div class="col-sm-9"><input type="text" name="email" id="website-title" value="{{$admin->email}}" class="col-xs-7 text_info" disabled="disabled"></div>
              </div>
          </form>
          <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">管理员QQ： </label>
          <div class="col-sm-9"><input type="text" name="qq" id="website-title" value="874188156" class="col-xs-7 text_info" disabled="disabled"> </div>
          </div>
           <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">权限： </label>
          <div class="col-sm-9" > <span>{{$admin->status}}</span></div>
          </div>
           <div class="form-group"><label class="col-sm-3 control-label no-padding-right" for="form-field-1">注册时间： </label>
          <div class="col-sm-9" > <span>{{$admin->time}}</span></div>
          </div>
           <div class="Button_operation clearfix"> 
                <button onclick="modify();" class="btn btn-danger radius" type="submit">修改信息</button>               
                <button onclick="save_info();" class="btn btn-success radius" type="button">保存修改</button>              
            </div>
            </div>
        
    </div>
    <div class="recording_style">
    <div class="type_title">管理员登录记录 </div>
    <div class="recording_list">
     <table class="table table-border table-bordered table-bg table-hover table-sort" id="sample-table">
    <thead>
      <tr class="text-c">
        <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
        <th width="80">ID</th>
        <th width="100">类型</th>
        <th>内容</th>
        <th width="17%">登录地点</th>
        <th width="10%">用户名</th>
        <th width="120">客户端IP</th>
        <th width="150">时间</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
        <td>{{$admin->id}}</td>
        <td>1</td>
        <td>登录成功!</td>
        <td>广州天河</td>
        <td>{{$admin->name}}</td>
        <td>{{$ip}}</td>
        <td>{{$admin->lasttime}}</td>      
      </tr>
      
    </tbody>
  </table>
    </div>
    </div>
 </div>
</div>
 <!--修改密码样式-->
         <div class="change_Pass_style" id="change_Pass">
            <ul class="xg_style">
            <form id="submit1" onsubmit="return false">
             <li><label class="label_name">原&nbsp;&nbsp;密&nbsp;码</label><input name="oldpass" type="password" class="" id="password"></li>
             <li><label class="label_name">新&nbsp;&nbsp;密&nbsp;码</label><input name="newpass" type="password" class="" id="Nes_pas"></li>
             <li><label class="label_name">确认密码</label><input type="password" name="renewpass" class="" id="c_mew_pas"></li>
            </form>
            </ul>
     <!--       <div class="center"> <button class="btn btn-primary" type="button" id="submit">确认修改</button></div>-->
         </div>
</body>
</html>
<script>

 //按钮点击事件
function modify(){
     $('.text_info').attr("disabled", false);
     $('.text_info').addClass("add");
      $('#Personal').find('.xinxi').addClass("hover");
      $('#Personal').find('.btn-success').css({'display':'block'});
    };
function save_info(){
        var num=0;
         var str="";
     $(".xinxi input[type$='text']").each(function(n){
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
          if(num>0){  return false;}        
          else{
                var str=$('#submit2').serialize();
                $.get('/admin/personal/doedit',{str:str},function(data){
                    if(data == 1){
                        layer.alert('修改成功！',{
                           title: '提示框',                
                           icon:1,                  
                          });
                        $('#Personal').find('.xinxi').removeClass("hover");
                        $('#Personal').find('.text_info').removeClass("add").attr("disabled", true);
                        $('#Personal').find('.btn-success').css({'display':'none'});
                           layer.close(index);
                    }else{
                        layer.alert('修改失败！',{
                           title: '提示框',                
                           icon:2,                  
                          });
                    }
                });
               
              
            
          }             
    };  
 //初始化宽度、高度    
    $(".admin_modify_style").height($(window).height()); 
    $(".recording_style").width($(window).width()-400); 
    //当文档窗口发生改变时 触发  
    $(window).resize(function(){
    $(".admin_modify_style").height($(window).height()); 
    $(".recording_style").width($(window).width()-400); 
  });
  //修改密码
  function change_Password(){
       layer.open({
    type: 1,
    title:'修改密码',
    area: ['300px','300px'],
    shadeClose: true,
    content: $('#change_Pass'),
    btn:['确认修改'],
    yes:function(index, layero){        
           if ($("#password").val()==""){
              layer.alert('原密码不能为空!',{
              title: '提示框',             
                icon:0,
                
             });
            return false;
          } 
          if ($("#Nes_pas").val()==""){
              layer.alert('新密码不能为空!',{
              title: '提示框',             
                icon:0,
                
             });
            return false;
          } 
           
          if ($("#c_mew_pas").val()==""){
              layer.alert('确认新密码不能为空!',{
              title: '提示框',             
                icon:0,
                
             });
            return false;
          }
            if(!$("#c_mew_pas").val || $("#c_mew_pas").val() != $("#Nes_pas").val() )
        {
            layer.alert('密码不一致!',{
              title: '提示框',             
                icon:0,
                
             });
             return false;
        }   
         else{            
                str=$('#submit1').serialize();
                $.get('/admin/personal/newpass',{str:str},function(data){
                    if(data == 1){
                        layer.alert('修改成功！',{
                        title: '提示框',                
                        icon:1,     
                        }); 
                        layer.close(index); 
                    }else{
                        layer.alert(data.error,{
                        title: '提示框',                
                        icon:2,     
                        }); 
                        layer.close(index);
                    }
                
                });
                   
            }  
    }
    });
      }
</script>
<script>
jQuery(function($) {
        var oTable1 = $('#sample-table').dataTable( {
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,2,3,4,5,6]}// 制定列不参与排序
        ] } );
                
                
                $('table th input:checkbox').on('click' , function(){
                    var that = this;
                    $(this).closest('table').find('tr > td:first-child input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });
                        
                });
});</script>
