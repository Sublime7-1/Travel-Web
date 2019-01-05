<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改商品</title>
    <script src="/style/admin/js/jquery-1.7.2.min.js"></script>
</head>
<body>
  <div id="add_payment_style" style=""> 
   <form id="payment_checkbox" action="/admin/Goods/{{$data->id}}" method="post" enctype="multipart/form-data"> 
    {{csrf_field()}}
    {{method_field('PUT')}}
    <ul class="margin payment_list  clearfix"> 
      <div class="Operate_cont clearfix">
        <label class="form-label" style="width: 107px;"><span class="c-red">*</span>标题：</label>
        <div class="formControls ">
          <input type="text" class="input-text" value="{{$data->title}}" id="user-name" name="title">
        </div>
      </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>商品价格：</label>
          <div class="formControls">
            <input type="text" class="input-text" value="{{$data->price}}" placeholder="" id="user-name" name="price">
          </div>
       </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>商品图片：</label>
          <div class="formControls">
              <img src="{{$data->pic}}" style="margin-left: 10px;" width="100px" alt="">
              <br>
              <br>
              <input name="pic" type="file" id="form-field-3" class="col-xs-10 col-sm-6" style="width:200px; margin-left: 10px;" />
          </div>
       </div> 
       <div class="Operate_cont clearfix">
          @if($data->receptionist == 0)
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>是否有接待商：</label>
          <div class="formControls" style="height: 30px; line-height: 30px;">
              <input name="has_receptionist" type="radio" id="form-ield-3" class="col-xs-10 col-sm-6" style="margin-left: 10px;" value="1" />是
              <input name="has_receptionist" type="radio" id="form-ield-3" class="col-xs-10 col-sm-6" checked style="margin-left: 10px;" value="2" />否
              <select name="receptionist" id="receptionist_select2" style="display: none;">
              <option value="0" selected>--请选择--</option>
                @foreach($receptionist as $receptionist_v)
                <option value="{{$receptionist_v->id}}">{{$receptionist_v->name}}</option>
                @endforeach
              </select>
          </div>
          @else
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>接待商：</label>
          <div class="formControls" style="height: 30px; line-height: 30px; margin-left: 20px;">
              <select name="receptionist" id="receptionist_select2" style="">
                @foreach($receptionist as $receptionist_v)
                <option value="{{$receptionist_v->id}}" @if($receptionist_v->id == $data->receptionist) selected @endif>{{$receptionist_v->name}}</option>
                @endforeach
              </select>
          </div>
          @endif
       </div> 
       <div class="Operate_cont clearfix">
          @if($data->brand == 0)
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span> 是否有品牌：</label>
          <div class="formControls" style="height: 30px; line-height: 30px;">
              <input name="has_brand" type="radio" id="form-field-3" class="col-xs-10 col-sm-6" style="margin-left: 10px;" value="1" />是
              <input name="has_brand" type="radio" id="form-field-3" class="col-xs-10 col-sm-6" checked style="margin-left: 10px;" value="2" />否
               <select name="brand" id="brand_select2" style="display: none;">
               <option value="0" selected>--请选择--</option>
                @foreach($brand as $brand_v)
                <option value="{{$brand_v->id}}">{{$brand_v->name}}</option>
                @endforeach
              </select>
          </div>
          @else
          <label class="form-label" style="width: 107px;"><span class="c-red">*</span>品牌：</label>
          <div class="formControls" style="height: 30px; line-height: 30px; margin-left: 20px;">
               <select name="brand" id="brand_select2" style="">
                @foreach($brand as $brand_v)
                <option value="{{$brand_v->id}}" @if($brand_v->id == $data->brand) selected @endif>{{$brand_v->name}}</option>
                @endforeach
              </select>
          </div>
          @endif
       </div> 
       <!-- 商品标签 -->
      <div class="Operate_cont clearfix">
        <label class="form-label" style="width: 107px;"><span class="c-red">*</span>商品标签：</label>
        <div class="formControls ">
          <select class="form-control" id="cate_select2" style="margin-left: 10px;">
              <option value="" disabled selected>--请选择--</option>
              @foreach($cates as $v)
              <option value="{{$v->id}}">{{$v->name}}</option>
              @endforeach
            </select>
        </div>
      </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red"></span>选中标签：</label>
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <div id="cate_selected_box2">
                @foreach($cates_selected as $cates_v)
                <span class="btn-info btn tag-i-display">{{$cates_v->name}}<i class="del-btn2" title="删除"></i><input type="hidden" name="cate_id[]" value="{{$cates_v->id}}" /></span>
                @endforeach
              </div>
          </div>
       </div>
       <!-- 商品景点 -->
       <div class="Operate_cont clearfix">
        <label class="form-label" style="width: 107px;"><span class="c-red">*</span>包含景点：</label>
        <div class="formControls ">
          <select class="form-control" id="place_select2" style="margin-left: 10px;">
              <option value="" disabled selected>--请选择--</option>
              @foreach($places as $v)
              <option value="{{$v->id}}">{{$v->name}}</option>
              @endforeach
            </select>
        </div>
      </div>
       <div class="Operate_cont clearfix">
          <label class="form-label" style="width: 107px;"><span class="c-red"></span>选中景点：</label>
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <div id="place_selected_box2">
                @foreach($places_selected as $places_v)
                <span class="btn-info btn tag-i-display">{{$places_v->name}}<i class="del-btn4" title="删除"></i><input type="hidden" name="place_id[]" value="{{$places_v->id}}" /></span>
                @endforeach
              </div>
          </div>
       </div>

       <input type="hidden" name="admin_id" value="{{session('AdminUserInfo.id')}}" />
       <div class="Operate_cont clearfix">
          <div class="formControls">&nbsp;&nbsp;&nbsp;
              <button class="btn btn-success">提交</button>
          </div>
       </div>
    </ul>
   </form> 
  </div>
</body>
<script>

// // 显示隐藏 receptionist 下拉框
// $('input[name=has_receptionist]').live('change',function(){
//   var val = $(this).val();
//   switch(val){
//     case '1':
//       $('#receptionist_select').show();
//       break;
//     case '2':
//       $('#receptionist_select').hide();
//       break;
//   }
// });

// // 显示隐藏 brand 下拉框
// $('input[name=has_brand]').change(function(){
//   var val = $(this).val();
//   switch(val){
//     case '1':
//       $('#brand_select').show();
//       break;
//     case '2':
//       $('#brand_select').hide();
//       break;
//   }
// });

</script>
</html>
