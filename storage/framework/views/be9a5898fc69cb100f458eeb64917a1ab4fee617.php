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
<title>留言</title>
</head>

<body>
<div class="margin clearfix">
 <div class="Guestbook_style">
 <div class="search_style">
     
      <ul class="search_content clearfix">
       <li><label class="l_f">留言</label><input name="" type="text" class="text_add" placeholder="输入留言信息" style=" width:250px"></li>
       <li><label class="l_f">时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
       <li style="width:90px;"><button type="button" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
      </ul>
    </div>
    <div class="border clearfix">
       <span class="l_f">
        
            <a href="javascript:ovid()" class="btn btn-sm btn-primary"><i class="fa fa-check"></i>&nbsp;用户有消息来电</a>
        
       </span>
       <span class="r_f">共：<b><?php echo e(count($list)); ?></b>条</span>
     </div>
    <!--留言列表-->
    <div class="Guestbook_list">
      <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
         <tr>
          <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
          <th width="80">ID</th>
          <th width="150px">聊天用户</th>
          <th width="70">客服管理员</th>                
          <th width="250">进入聊天室</th>
          <th width="250">删除(清空聊天记录)</th>
          </tr>
      </thead>
    <tbody>
        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
          <td><?php echo e($k); ?></td>
          <td class="text-l">
          <a href="javascript:;" ><?php echo e($value->user_id); ?></a>
          <td class="td-status"><span class="label label-success radius"><?php echo e($value->service_id); ?></span></td>
          <td> <a href="/admin/servicenews/news/<?php echo e($value->service_id); ?>-<?php echo e($value->user_id); ?>" class="btn btn-success btn-xs">进入聊天室</a></td>
          <td> <a onclick="member_del(this,'<?php echo e($value->service_id); ?>,<?php echo e($value->user_id); ?>')" class="btn btn-danger btn-xs">删除</a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
 </div>
</div>
<!--留言详细-->
<div id="Guestbook" style="display:none">
 <div class="content_style">
  <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1">留言用户 </label>
       <div class="col-sm-9">胡海天堂</div>
    </div>
   <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 留言内容 </label>
       <div class="col-sm-9">三年同窗，一起沐浴了一片金色的阳光，一起度过了一千个日夜，我们共同谱写了多少友谊的篇章?愿逝去的那些闪亮的日子，都化作美好的记忆，永远留在心房。认识您，不论是生命中的一段插曲，还是永久的知已，我都会珍惜，当我疲倦或老去，不再拥有青春的时候，这段旋律会滋润我生命的每一刻。在此我只想说：有您真好!无论你身在何方，我的祝福永远在您身边!</div>
    </div>
    <div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="form-field-1">是否回复 </label>
       <div class="col-sm-9">
       <label><input name="checkbox" type="checkbox" class="ace" id="checkbox"><span class="lbl"> 回复</span></label>
       <div class="Reply_style">
          <textarea name="权限描述" class="form-control" id="form_textarea" placeholder="" onkeyup="checkLength(this);"></textarea>
          <span class="wordage">剩余字数：<span id="sy" style="color:Red;">200</span>字</span>
       </div>
       </div>
    </div>
 </div>
</div>
</body>
</html>
<script type="text/javascript">
 /*用户-查看*/
function member_show(title,url,id,w,h){
    layer_show(title,url+'#?='+id,w,h);
}
/*留言-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
    });
}

/*checkbox激发事件*/
$('#checkbox').on('click',function(){
    if($('input[name="checkbox"]').prop("checked")){
         $('.Reply_style').css('display','block');
        }
    else{
        
         $('.Reply_style').css('display','none');
        }   
    })
/*留言查看*/
function Guestbook_iew(id){
    var index = layer.open({
        type: 1,
        title: '留言信息',
        maxmin: true, 
        shadeClose:false,
        area : ['600px' , ''],
        content:$('#Guestbook'),
        btn:['确定','取消'],
        yes: function(index, layero){        
          if($('input[name="checkbox"]').prop("checked")){           
             if($('.form-control').val()==""){
                layer.alert('回复内容不能为空！',{
               title: '提示框',                
              icon:0,       
              }) 
             }else{         
                  layer.alert('确定回复该内容？',{
                   title: '提示框',                
                   icon:0,  
                   btn:['确定','取消'], 
                   yes: function(index){                       
                         layer.closeAll();
                       }
                  });         
           }            
          }else{            
             layer.alert('是否要取消回复！',{
               title: '提示框',                
            icon:0,     
              }); 
              layer.close(index);             
          }
       }
    })  
};
    /*字数限制*/
function checkLength(which) {
    var maxChars = 200; //
    if(which.value.length > maxChars){
       layer.open({
       icon:2,
       title:'提示框',
       content:'您输入的字数超过限制!',   
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
</script>
<script type="text/javascript">
jQuery(function($) {
        var oTable1 = $('#sample-table').dataTable( {
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,2,3,5,6]}// 制定列不参与排序
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

    function member_del(obj,serviceid,userid){
    
    layer.confirm('确认要删除吗？',function(index){
        $.post("<?php echo e(url('admin/servicenews')); ?>/"+serviceid,{"_token": "<?php echo e(csrf_token()); ?>","_method":"DELETE",'userid':userid},function(data){
            
            if(data == 1){
                $(obj).parents("tr").remove();
                layer.msg('已删除!',{icon:1,time:1000});
            }else{
                layer.msg('删除失败!',{icon:1,time:1000});
            }
        });
        
    });
}
</script>
