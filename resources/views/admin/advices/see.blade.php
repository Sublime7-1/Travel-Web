<!--    <input type="hidden" name="uid" value="{{$data->uid}}">
   <input type="hidden" name="advices_id" value="{{$data->id}}"> -->

   <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>反馈者：</label>
      <div class="formControls ">
        <input type="text" class="input-text" value="{{$data->uname}}" readonly id="user-name">
      </div>
    </div>
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>反馈类型：</label>
      <div class="formControls">
        <input type="text" class="input-text" value="{{$data->type}}" readonly id="user-name">
      </div>
    </div> 
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>反馈内容：</label>
      <div class="formControls">
        <textarea cols="8" rows="6" readonly>{{$data->content}}</textarea>
      </div>
    </div>
    @if($data->img != 0) 
    <div class="Operate_cont clearfix">
      <label class="form-label"><span class="c-red">*</span>相关截图：</label>
      <div class="formControls">
          <img src="{{$data->img}}}" width="500px">
      </div>
    </div>
    @endif 
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>Email：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="{{$data->email}}" readonly id="user-name">
        </div>
     </div>
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>Phone：</label>
        <div class="formControls">
          <input type="text" class="input-text" value="{{$data->phone}}" readonly id="user-name">
        </div>
     </div>
     <div class="Operate_cont clearfix">
        <label class="form-label"><span class="c-red">*</span>状态：</label> 
        <div class="formControls">
          @if($data->status == 0)
          <input type="text" class="input-text" value="未读" readonly id="user-name">
          @elseif($data->status == 1)
          <input type="text" class="input-text" value="已读" readonly id="user-name">
          @else
          <input type="text" class="input-text" value="已回复" readonly id="user-name">
          @endif
        </div>
     </div> 
    <div class="">
     <div class="" style=" text-align:center">
      {{csrf_field()}}
      @if($data->status == 2)
      <a class="btn btn-info radius" href="/admin/advices/seereply/{{$data->id}}">查看回复</a>
      @else
      <a class="btn btn-success radius" href="/admin/advices/reply/{{$data->uid}}-{{$data->id}}">回复</a>
      @endif
      <a class="btn btn-primary radius" href="/admin/advices/">返回</a>
      </div>
    </div>
</form>
