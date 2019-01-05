<div class="type_style">
 <div class="type_title">修改评论分类信息</div>
  <div class="type_content">
  <div class="Operate_btn">
    @if($data->status == '启用')
    <b id="statuss">
    <a onclick="member_stops(this,{{$data->id}})"  href="javascript:;" title="停用"  class="btn btn-success"><i class="icon-ok align-top bigger-125"></i>停用该类型</a>
    @else
    <a style="text-decoration:none" class="btn" onclick="member_starts(this,{{$data->id}})" href="javascript:;" title="启用"><i class="icon-ok align-top bigger-125"></i>启用该类型</a>
    @endif  
    </b>
    <a href="javascript:ovid()" class="btn  btn-danger" onclick="member_del(this,'{{$data->id}}')"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
  </div>
  <form action="/admin/comment_type/{{$data->id}}" method="post" class="form form-horizontal" id="form-user-add">
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="{{$data->name}}" required maxlength="8" id="user-name" name="name">
      </div>
    </div>
    <div class="">
     <div class="" style=" text-align:center">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <input class="btn btn-primary radius" type="submit" value="提交">
      <input class="btn btn-danger radius" type="reset" value="重置">
      </div>
    </div>
  </form>
  </div>
</div> 
<script type="text/javascript">
  /*广告图片-停用*/
function member_stops(obj,id){
  // alert(id);
  layer.confirm('确认要停用吗？',function(index){
    $.get('/admin/comment_type/status',{'status':1,'id':id},function(data){
      // alert(data);
            if(data == 1){
                $(obj).parents(".Operate_btn").find("#statuss").prepend('<a style="text-decoration:none" class="btn" onclick="member_starts(this,{{$data->id}})" href="javascript:;" title="启用"><i class="icon-ok align-top bigger-125"></i>启用该类型</a>');
                $(obj).remove();
                layer.msg('停用!',{icon: 5,time:1000});
            }else{
                layer.msg('修改失败',{icon: 5,time:1000});
            }          
        });

  });
}
/*广告图片-启用*/
function member_starts(obj,id){
  layer.confirm('确认要启用吗？',function(index){
    $.get('/admin/comment_type/status',{'status':0,'id':id},function(data){
            if(data == 1){
                $(obj).parents(".Operate_btn").find("#statuss").prepend('<a onclick="member_stops(this,{{$data->id}})"  href="javascript:;" title="停用"  class="btn btn-success"><i class="icon-ok align-top bigger-125"></i>停用该类型</a>');
                $(obj).remove();
                layer.msg('启用!',{icon: 6,time:1000});
            }else{
                layer.msg('修改失败',{icon: 6,time:1000});
            }          
        });
  });
}
</script>