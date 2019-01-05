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
          <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
        <![endif]-->
        <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
        <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>              
        <script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
        <script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
        <script src="/style/admin/js/dragDivResize.js" type="text/javascript"></script>
<title>添加权限</title>
</head>

<body>
<div class="Competence_add_style clearfix">
  <div class="left_Competence_add">
  <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <div class="mws-form-message error">
            <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <script>
    setTimeout(function(){
        $('.alert-danger').hide();
    },2000);
    </script>
    <?php endif; ?>
   <div class="title_name">添加权限</div>
    <div class="Competence_add">
    
    <form action='/admin/level/update' method="post" id="submit2" >

     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限名称 </label>
       <div class="col-sm-9"><input type="text" id="form-field-1" placeholder="" top="权限名称"  name="username" class="col-xs-10 col-sm-5 top" value="<?php echo e($levelinfo->username); ?>"></div>
    </div>
     <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 权限描述 </label>
      <div class="col-sm-9"><textarea name="desc" class="form-control" id="form_textarea" placeholder="" onkeyup="checkLength(this);"><?php echo e($levelinfo->desc); ?></textarea><span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span></div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户选择 </label>
       <div class="col-sm-9">
       <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <label class="middle"><input class="ace top" top="用户选择" <?php echo e($levelinfo->userid == $value->id ? 'checked' : ''); ?> type="radio" name="userid" value="<?php echo e($value->id); ?>" id="id-disable-check"><span class="lbl"> <?php echo e($value->name); ?></span></label>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>   
   </div>
   <?php echo e(csrf_field()); ?>

   <input type="hidden" name="_method" value="PUT" />
   <input type="hidden" name="id" value="<?php echo e($levelinfo->id); ?>" />

   <!--按钮操作-->
   <div class="Button_operation">
        <button onclick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="fa fa-save "></i> 保存并提交</button>
        <a  href="/admin/level" class="btn btn-secondary  btn-warning" type="button"><i class="fa fa-reply"></i> 返回上一步</a>
        <a href="/admin/level" onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</a>
    </div>
   </div>
   </div>
   <!--权限分配-->
   <div class="Assign_style">
      <div class="title_name">权限分配</div>
      <div class="Select_Competence">

      <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <dl class="permission-list">
        <dt><label class="middle"><input  class="ace top1" type="checkbox" name="ids[]" <?php echo e(in_array($value->ac,$ids)  ? "checked" : ""); ?> value="<?php echo e($value->ac); ?>" id="id-disable-check"><span class="lbl"><?php echo e($value->typename); ?></span></label></dt>
        <dd>

            <?php $__currentLoopData = $type_two; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($val->pid == $value->id): ?>
             <dl class="cl permission-list2">
             <dt><label class="middle"><input type="checkbox" value="<?php echo e($val->ac); ?>" <?php echo e(in_array($val->ac,$ids)  ? "checked" : ""); ?> class="ace top1"  name="ids[]" id="id-disable-check"><span class="lbl"><?php echo e($val->typename); ?></span></label></dt>
                <dd>
                <?php $__currentLoopData = $type_two; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($v->pid == $val->id): ?>
                  
                   <label class="middle"><input type="checkbox" value="<?php echo e($val->ac); ?><?php echo e($v->ac); ?>" <?php echo e(in_array($val->ac.$v->ac,$ids)  ? "checked" : ""); ?> class="ace top1" name="ids[]" id="<?php echo e($v->id); ?>"><span class="lbl"><?php echo e($v->typename); ?></span></label>       
  
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </dd>
            </dl>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </dl> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div> 
      </form>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
//初始化宽度、高度  
 $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();; 
 $(".Assign_style").width($(window).width()-500).height($(window).height()).val();
 $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
  //当文档窗口发生改变时 触发  
    $(window).resize(function(){
    
    $(".Assign_style").width($(window).width()-500).height($(window).height()).val();
    $(".Select_Competence").width($(window).width()-500).height($(window).height()-40).val();
    $(".left_Competence_add,.Competence_add_style").height($(window).height()).val();;
    });
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
/*按钮选择*/
$(function(){
    $(".permission-list dt input:checkbox").click(function(){
        $(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
    });
    $(".permission-list2 dd input:checkbox").click(function(){
        var l =$(this).parent().parent().find("input:checked").length;
        var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
        if($(this).prop("checked")){
            $(this).closest("dl").find("dt input:checkbox").prop("checked",true);
            $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
        }
        else{
            if(l==0){
                $(this).closest("dl").find("dt input:checkbox").prop("checked",false);
            }
            if(l2==0){
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
            }
        }
        
    });
});

$('#submit2').submit(function(){
    var num=0;
    var str="";
    $(".top").each(function(n){
        if($(this).val()==""){
            layer.alert(str+=""+$(this).attr("top")+"不能为空！\r\n",{
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
    } 
    
});
        

    
</script>
