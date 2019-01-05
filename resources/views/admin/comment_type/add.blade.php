<form action="/admin/adverttype/doadd" method="post" class="form form-horizontal" id="form-user-add" enctype="multipart/form-data">
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>分类名称：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="" placeholder="请输入适合的名称..." id="user-name" name="name">
      </div>
    </div>
    <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>排序：</label>
        <div class="formControls">
            <input name="sort" placeholder="0" type="text" id="form-field-3" class="col-xs-10 col-sm-6" style="width:50px" />
        </div>
     </div> 
    <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>商品ID：</label>
        <div class="formControls">
            <input name="gid" placeholder="0" type="text" id="form-field-3" class="col-xs-10 col-sm-6" style="width:50px" />
        </div>
     </div> 
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>PID：</label>
        <div class="formControls">
            <input name="pid" readonly value="{{$data->id}}" type="text" id="form-field-3" class="col-xs-10 col-sm-6" style="width:80px" />
        </div>
     </div> 
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>PATH：</label>
        <div class="formControls">
            <input name="path" readonly value="{{$data->path}},{{$data->id}}" type="text" id="form-field-3" class="col-xs-10 col-sm-6" style="width:80px" />
        </div>
     </div>
     <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>状态：</label> 
      <span class="cont_style"> &nbsp;&nbsp;
        <label>
          <input name="status" type="radio" value="0" checked="checked" class="ace" /><span class="lbl">显示</span>
        </label>&nbsp;&nbsp;&nbsp; 
        <label>
          <input name="status" type="radio" value="1" class="ace" /><span class="lbl">隐藏</span>
        </label>
      </span>
     </div> 
     <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>放置区域：</label>
      <div class="formControls " style="width: 500px">
        <span class="cont_style">
        <label>
          <input name="area" type="radio" value="0" checked class="ace"/><span class="lbl">轮播区域</span>
        </label>
        <label>
          <input name="area" value="1" type="radio" class="ace"/><span class="lbl">头部区域</span>
        </label>
        <label>
          <input name="area" value="2" type="radio" class="ace"/><span class="lbl">内容区域</span>
        </label>
        <label>
          <input name="area" value="3" type="radio" class="ace" /><span class="lbl">尾部区域</span>
        </label>
        <label>
           <input name="area" value="4" type="radio" class="ace"/><span class="lbl">商品区域</span>
        </label>
        </span>
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>当前图片：</label>
      <div class="formControls ">
          <input name="img" type="file" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px" />
      </div>
    </div>
    <div class="">
     <div class="" style=" text-align:center">
      {{csrf_field()}}
      <input class="btn btn-primary radius" type="submit" value="提交">
      <input class="btn btn-primary radius" type="reset" value="重置">
      </div>
    </div>
</form>
<script type="text/javascript">
  $('#form-user-add').submit(function(){
    // 将表单提交的所有的值序列化
    str=$('#form-user-add').serialize();
    var bool = false;
   $.ajax({
         type:"GET",
         url:"/admin/adverttype/checkup",
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
</script>
