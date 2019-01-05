<form action="/admin/links_contacts/{{$data->id}}" method="post" id="typeerror" >
  		{{csrf_field()}}
      {{method_field('PUT')}}
      <br>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>负责人</label>
          <div class="formControls">
              <input type="text" class="input-text" value="{{$data->name}}" readonly id="user-name" name="name">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>手机号码</label>
          <div class="formControls">
              <input type="text" class="input-text" value="{{$data->phone}}" id="user-name" name="phone">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>邮箱地址</label>
          <div class="formControls">
              <input type="text" class="input-text" value="{{$data->email}}" id="user-name" name="email">
          </div>
          <div class="col-4"> <span class="Validform_checktip"></span></div>
      </div>
      <div class="form-group">
          <label class="form-label"><span class="c-red">*</span>放置区域</label>
          <div class="formControls" style="width: 500px">&nbsp;&nbsp;
              <label>
                <input name="business" type="radio" value="0" class="ace" @if($data->business==0) checked @endif /><span class="lbl">国内业务</span>
              </label>&nbsp;&nbsp;&nbsp; 
              <label>
                <input name="business" value="1" type="radio" class="ace" @if($data->business==1) checked @endif /><span class="lbl">境外业务</span>
              </label>
          </div>
          <div class="col-2"> <span class="Validform_checktip"></span></div>
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
$('#typeerror').submit(function(){
    str=$('#typeerror').serialize();
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
</script>