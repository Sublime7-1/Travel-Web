<div class="type_style">
 <div class="type_title">修改广告信息</div>
  <div class="type_content">
  <div class="Operate_btn">
    <a href="javascript:ovid()" class="btn  btn-warning"><i class="icon-edit align-top bigger-125"></i>新增子类型</a>
    @if($info->status == '显示')
    <b id="statuss">
    <a onclick="member_stops(this,{{$info->id}})"  href="javascript:;" title="隐藏"  class="btn btn-success"><i class="icon-ok align-top bigger-125"></i>禁用该类型</a>
    @else
    <a style="text-decoration:none" class="btn" onclick="member_starts(this,{{$info->id}})" href="javascript:;" title="显示"><i class="icon-ok align-top bigger-125"></i>显示该类型</a>
    @endif  
    </b>
    <a href="javascript:ovid()" class="btn  btn-danger" onclick="member_del(this,'{{$info->id}}')"><i class="icon-trash   align-top bigger-125"></i>删除该类型</a>
  </div>
  <form action="/admin/adverttype/{{$info->id}}" method="post" class="form form-horizontal" id="form-user-add" enctype="multipart/form-data">
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="{{$info->name}}" required placeholder="" id="user-name" name="name">
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>子类数量：</label>
      <div class="formControls ">
        <input type="text" readonly class="input-text" value="{{$count}}" placeholder="" id="user-name">
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>放置区域：</label>
      <div class="formControls " style="width: 300px">
        <span class="cont_style"> &nbsp;&nbsp;
        <label>
          <input name="area" type="radio" value="0" class="ace" {{$info->area}} @if($info->area == 0) checked @endif/><span class="lbl">轮播区域</span>
        </label>
        <label>
          <input name="area" value="1" type="radio" class="ace" @if($info->area == 1) checked @endif/><span class="lbl">头部区域</span>
        </label>
        <label>
          <input name="area" value="2" type="radio" class="ace" @if($info->area == 2) checked @endif/><span class="lbl">内容区域</span>
        </label>
        <label>
          <input name="area" value="3" type="radio" class="ace" @if($info->area == 3) checked @endif/><span class="lbl">尾部区域</span>
        </label>
        <label>
           &nbsp;&nbsp;<input name="area" value="4" type="radio" class="ace" @if($info->area == 4) checked @endif/><span class="lbl">商品区域</span>
        </label>
      </span>
        </div>
       </div>
        @if($info->pid != 0)
          <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>当前图片:</label>
          <div class="formControls">
              <img src="{{$info->img}}" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px" />
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
         <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>重置图片:</label>
            <div class="formControls">
                <input name="img" type="file" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px" />
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
         </div>
         <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>排序:</label>
            <div class="formControls">
                <input name="sort" value="{{$info->sort}}" required type="text" id="form-field-3" class="col-xs-10 col-sm-6" style="width:50px" />
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
         </div> 
         <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>商品ID:</label>
            <div class="formControls">
                <input name="gid" value="{{$info->gid}}" required type="text" id="form-field-3" class="col-xs-10 col-sm-6" style="width:50px" />
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
         </div>
        @endif
        <input type="hidden" name="pid" value="{{$info->pid}}">
 
    <div class="">
     <div class="" style=" text-align:center">
      {{csrf_field()}}
      {{method_field('put')}}
      <input class="btn btn-primary radius" type="submit" value="提交">
      <input class="btn btn-primary radius" type="reset" value="重置">
      </div>
    </div>
  </form>
  </div>
</div> 
<script type="text/javascript">
  /*广告图片-停用*/
function member_stops(obj,id){
  // alert(id);
  layer.confirm('确认要关闭吗？',function(index){
    $.get('/admin/advert/status',{'status':1,'id':id},function(data){
      // alert(data);
            if(data == 1){
                $(obj).parents(".Operate_btn").find("#statuss").prepend('<a style="text-decoration:none" class="btn" onclick="member_starts(this,{{$info->id}})" href="javascript:;" title="显示"><i class="icon-ok align-top bigger-125"></i>显示该类型</a>');
                $(obj).remove();
                layer.msg('隐藏!',{icon: 5,time:1000});
            }else{
                layer.msg('修改失败',{icon: 5,time:1000});
            }          
        });

  });
}
/*广告图片-启用*/
function member_starts(obj,id){
  layer.confirm('确认要显示吗？',function(index){
    $.get('/admin/advert/status',{'status':0,'id':id},function(data){
            if(data == 1){
                $(obj).parents(".Operate_btn").find("#statuss").prepend('<a onclick="member_stops(this,{{$info->id}})"  href="javascript:;" title="隐藏"  class="btn btn-success"><i class="icon-ok align-top bigger-125"></i>禁用该类型</a>');
                $(obj).remove();
                layer.msg('显示!',{icon: 6,time:1000});
            }else{
                layer.msg('修改失败',{icon: 6,time:1000});
            }          
        });
  });
}
</script>