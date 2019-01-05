<form action="/admin/message/{{$data->id}}" method="post" id="typeerror" >
  		{{csrf_field()}}
      {{method_field('PUT')}}
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
  },2000);
  </script>
  @endif
      <br>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>标题 : </label>
          <div class="formControls">
              <input type="text" class="input-text" value="{{$data->title}}" placeholder="" id="user-name" name="title" required style="margin-left: 0">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>内容详情 : </label>
          <div class="formControls">
              <script id="editor{{$data->id}}" type="text/plain" name="content" style="width:600px;height:400px;">{!!$data->content!!}</script>
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div> 
       <div class="form-group col-md-offset-1">
          <label class="form-label"><span class="c-red"></span></label>
          <div class="formControls">
              <input type="submit" class="btn btn-success" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="reset" class="btn btn-danger" value="重置">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
       </div> 
</form>
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
  
  var ue = UE.getEditor('editor'+{{$data->id}});
</script>
<script type="text/javascript">
  
  $('#typeerror').submit(function(){
    str=$('#typeerror').serialize();
    var bool = false;
    $.ajax({
       type:"GET",
       url:"/admin/message/checkup",
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