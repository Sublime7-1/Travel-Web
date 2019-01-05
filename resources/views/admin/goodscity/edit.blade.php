<!DOCTYPE html>
<html>
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
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->
      <script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/home/public/jquery-1.7.2.min.js"></script>
          <script src="/style/admin/assets/js/bootstrap.min.js"></script>
        <script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>                 
          <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
          <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
          <script src="/style/admin/js/H-ui.js" type="text/javascript"></script>
          <script src="/style/admin/selectcity/jquery.min.js"></script>
          <script src="/style/admin/selectcity/jquery.cxselect.min.js"></script>
      <title>添加旅游时间</title>
      <style>
        *{
            list-style:none;
        }
        .add{
          width:50px;
          height:50px;
          border-radius:50%;
          background:#b0b0b0;
          text-align:center;
          line-height:45px;
          font-size:29px;
          font-weight:700px;
          margin-left:25%;
        }
        .add :hover{
          color:#000;
          cursor:pointer;
        }
        .border{
          border:1px solid #b0b0b0;
          height:auto;

        }
      </style>
  </head> 
<body>
<div class="margin clearfix">
  <!-- 验证消息 -->
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
 <div class="article_style">
    <div class="add_content" id="form-article-add">
      <form action="/admin/goodsinfo/city/{{$goods_id}}" method="post" id="formtip">
        <input type="hidden" name="goods_id" value="{{$goods_id}}" />
        <input type="hidden" name="_method" value="PUT" />
        {{csrf_field()}}
       <ul>
        <li class="clearfix Mandatory"><label class="label_name" style="width:87px"><i>*</i>商品名称 :</label><span class="formControls col-10"><input style="width:auto" type="text" title="管理员" value="{{$goods_name}}" id="form-field-1" readonly class="col-xs-10 col-sm-1"></span>
        </li>
       <div id="content" >
        @foreach($goods_city as $k=>$v)
        <li class="clearfix Mandatory">
          @if($k % 2 ==0)
          <label class="label_name" style="float:left"><i>*</i>路线启程 </label>
          @else
          <label class="label_name" style="float:left"><i>*</i>路线返程 </label>

          @endif
        </li>
        <div class="border"  >
            @if($k <= 1)
            <button type="button" class="btn btn-default close" style="color:#393939; float: right; line-height: 15px; background:#b0b0b0 "onclick="layer.msg('最少保留俩个!',{icon: 5,time:1000});"><i class="fa fa-remove"></i>
            </button>
            @else
            <button type="button" class="btn btn-default close" style="color:#393939; float: right; line-height: 15px; background:#b0b0b0 "onclick="clock(this)"><i class="fa fa-remove"></i>
            </button>
            @endif
            
            
            <li class="clearfix Mandatory">
            <label class="label_name" style="float:left"><i>*</i>航空公司 :</label>
            <span class="formControls col-10"><input name="city_name[]" type="text" id="form-field-1" title="航空公司名字" class="col-xs-10 col-sm-5 " value="{{$v->city_name}}" style="width:542px" placeholder=" 请输入10字以内..." maxlength="30"></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name" style="float:left"><i>*</i>英文名(English) :</label>
            <span class="formControls col-10"><input name="englishname[]" value="{{$v->englishname}}" type="text" id="form-field-1" title="英文名" class="col-xs-10 col-sm-5 " style="width:542px" placeholder=" 请输入10字以内..." maxlength="30"></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>起飞机场 :</label><span class="formControls  end"><input name="begin_fei[]" value="{{$v->begin_fei}}" type="text" id="form-field-1" title="起飞机场"  placeholder=" 请输入10字以内..." maxlength="30"></span>
            <label class="label_name"><i>*</i>落地机场 :</label><span class="formControls  end"><input name="end_fei[]" type="text" value="{{$v->end_fei}}" id="form-field-1" title="日程机场"  placeholder=" 请输入10字以内..." maxlength="30"></span>

            </li>

             <li class="clearfix cates" ><label class="label_name" style="width:119px;text-align: left;">　<i>*</i>起飞时间 :</label>
              <input type="text" autocomplete="off" onclick="status(this)" name="begin_fei_time[]" title="日期" class="laydate-icon start" id="start" value="{{$v->begin_fei_time}}" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
            </li>

             <li class="clearfix Mandatory">
              <label class="label_name"><i>*</i>出发城市 :</label>
              <span class="formControls col-10 ">
              <select name="begin_city[]" id="form-field-1" value="{{$v->begin_city}}" title="出发城市" style="margin-left:10px" class="col-xs-10 col-sm-5 province" data-value='山西省' placeholder="请选择出发城市" maxlength="30">
              </select>
            </li>
            <li class="clearfix Mandatory">
              <label class="label_name"><i>*</i>到达城市 :</label>
              <span class="formControls col-10 ">
              <select name="end_city[]" id="form-field-1" value="{{$v->end_city}}" title="到达城市" style="margin-left:10px" class="col-xs-10 col-sm-5 province" data-value='山西省' placeholder="请选择到达城市" maxlength="30">
              </select>
            </li>
            <li class="clearfix cates" ><label class="label_name" style="width:119px;text-align: left;">　<i>*</i>路程时间 :</label>
              <input type="text" autocomplete="off" value="{{$v->begin_city_time}}" onclick="status(this)" name="begin_city_time[]" title="日期" class="laydate-icon start" id="startnv" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
              <em style="display:block; float:left;margin-right:10px;">至</em>
              <input type="text" autocomplete="off" value="{{$v->end_city_time}}" name="end_city_time[]" onclick="status(this)" class="laydate-icon" id="end" style="width:200px; padding-left:5px; display:block ;float:left" title="日期"></input>
            </li>
            
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>机票类型 :</label><span class="formControls col-10 ">
            <select name="type[]" id="form-field-1" title="状态" style="margin-left:10px" class="col-xs-10 col-sm-5 " placeholder="请填写价格" maxlength="30">
                
                <option {{$v->type == 0 ? 'selected' : ''}}  value="0">头等舱</option>
                <option {{$v->type == 1 ? 'selected' : ''}} value="1">公务舱</option>
                <option {{$v->type == 2 ? 'selected' : ''}} value="2">经济舱</option>
               
            </select>
            </li>
        </div>

        @endforeach
        </div>
       </ul>

       <div class="add" onclick="add()"><i class="fa fa-calendar-plus-o " aria-hidden="true"></i></div>
        <div class="Button_operation" style="width: 800px;margin-top:20px;">
                <button onclick="article_save_submit()" id="aaa" class="btn btn-primary radius" type="submit">保存并提交</button>
                <a class="btn btn-default radius" href="/admin/Goods" type="reset">&nbsp;&nbsp;取消&nbsp;&nbsp;</a>>
            </div>
      </form>
    </div>


    <div id="content1" style="height:auto;display:none">
         <li class="clearfix Mandatory">
          <label class="label_name" style="float:left"><i>*</i>路线启程 </label>
        </li>
        <div class="border" id="city" >
            <button type="button" class="btn btn-default close" style="color:#393939; float: right; line-height: 15px; background:#b0b0b0 "onclick="layer.msg('最少保留一个!',{icon: 5,time:1000});"><i class="fa fa-remove"></i>
            </button>
            
            
            <li class="clearfix Mandatory">
            <label class="label_name" style="float:left"><i>*</i>航空公司 :</label>

            <span class="formControls col-10"><input name="city_name[]" type="text" id="form-field-1" title="航空公司名字" class="col-xs-10 col-sm-5 " style="width:542px" placeholder=" 请输入10字以内..." maxlength="30"></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name" style="float:left"><i>*</i>英文名(English) :</label>
            <span class="formControls col-10"><input name="englishname[]" type="text" id="form-field-1" title="英文名" class="col-xs-10 col-sm-5 " style="width:542px" placeholder=" 请输入10字以内..." maxlength="30"></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>起飞机场 :</label><span class="formControls  end"><input name="begin_fei[]" type="text" id="form-field-1" title="起飞机场"  placeholder=" 请输入10字以内..." maxlength="30"></span>
            <label class="label_name"><i>*</i>落地机场 :</label><span class="formControls  end"><input name="end_fei[]" type="text" id="form-field-1" title="落地机场"  placeholder=" 请输入10字以内..." maxlength="30"></span>

            </li>

             <li class="clearfix cates" ><label class="label_name" style="width:119px;text-align: left;">　<i>*</i>起飞时间 :</label>
              <input type="text" autocomplete="off" onclick="status(this)" name="begin_fei_time[]" title="日期" class="laydate-icon start" biaoji="a" id="starta" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
            </li>

             <li class="clearfix Mandatory">
              <label class="label_name"><i>*</i>出发城市 :</label>
              <span class="formControls col-10 ">
              <select name="begin_city[]" id="form-field-1" title="出发城市" style="margin-left:10px" class="col-xs-10 col-sm-5 province" data-value='山西省' placeholder="请选择出发城市" maxlength="30">
              </select>
            </li>
            <li class="clearfix Mandatory">
              <label class="label_name"><i>*</i>到达城市 :</label>
              <span class="formControls col-10 ">
              <select name="end_city[]" id="form-field-1" title="到达城市" style="margin-left:10px" class="col-xs-10 col-sm-5 province" data-value='山西省' placeholder="请选择到达城市" maxlength="30">
              </select>
            </li>
            <li class="clearfix cates" ><label class="label_name" style="width:119px;text-align: left;">　<i>*</i>路程时间 :</label>
              <input type="text" autocomplete="off" biaoji="b" onclick="status(this)" name="begin_city_time[]" title="日期" class="laydate-icon start" id="startb" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
              <em style="display:block; float:left;margin-right:10px;">至</em>
              <input type="text" autocomplete="off" biaoji="c" name="end_city_time[]" onclick="status(this)" class="laydate-icon" id="end" style="width:200px; padding-left:5px; display:block ;float:left" title="日期"></input>
            </li>
            
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>机票类型 :</label><span class="formControls col-10 ">
            <select name="type[]" id="form-field-1" title="状态" style="margin-left:10px" class="col-xs-10 col-sm-5 " placeholder="请填写价格" maxlength="30">
                
                <option  value="0">头等舱</option>
                <option  value="1">公务舱</option>
                <option  value="2">经济舱</option>
               
            </select>
            </li>
        </div>

        <li class="clearfix Mandatory">
          <label class="label_name" style="float:left"><i>*</i>路线返程 </label>
        </li>
        <div class="border" id="city" >
            <button type="button" class="btn btn-default close" style="color:#393939; float: right; line-height: 15px; background:#b0b0b0 "onclick="layer.msg('最少保留一个!',{icon: 5,time:1000});"><i class="fa fa-remove"></i>
            </button>
            
            
            <li class="clearfix Mandatory">
            <label class="label_name" style="float:left"><i>*</i>航空公司 :</label>

            <span class="formControls col-10"><input name="city_name[]" type="text" id="form-field-1" title="航空公司名字" class="col-xs-10 col-sm-5 " style="width:542px" placeholder=" 请输入10字以内..." maxlength="30"></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name" style="float:left"><i>*</i>英文名(English) :</label>
            <span class="formControls col-10"><input name="englishname[]" type="text" id="form-field-1" title="英文名" class="col-xs-10 col-sm-5 " style="width:542px" placeholder=" 请输入10字以内..." maxlength="30"></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>起飞机场 :</label><span class="formControls  end"><input name="begin_fei[]" type="text" id="form-field-1" title="起飞机场"  placeholder=" 请输入10字以内..." maxlength="30"></span>
            <label class="label_name"><i>*</i>落地机场 :</label><span class="formControls  end"><input name="end_fei[]" type="text" id="form-field-1" title="落地机场"  placeholder=" 请输入10字以内..." maxlength="30"></span>

            </li>

             <li class="clearfix cates" ><label class="label_name"  style="width:119px;text-align: left;">　<i>*</i>起飞时间 :</label>
              <input type="text" autocomplete="off" biaoji="g" onclick="status(this)" name="begin_fei_time[]" title="日期" class="laydate-icon start" id="start" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
            </li>

             <li class="clearfix Mandatory">
              <label class="label_name"><i>*</i>出发城市 :</label>
              <span class="formControls col-10 ">
              <select name="begin_city[]" id="form-field-1" title="出发城市" style="margin-left:10px" class="col-xs-10 col-sm-5 province" data-value='山西省' placeholder="请选择出发城市" maxlength="30">
              </select>
            </li>
            <li class="clearfix Mandatory">
              <label class="label_name"><i>*</i>到达城市 :</label>
              <span class="formControls col-10 ">
              <select name="end_city[]" id="form-field-1" title="到达城市" style="margin-left:10px" class="col-xs-10 col-sm-5 province" data-value='山西省' placeholder="请选择到达城市" maxlength="30">
              </select>
            </li>
            <li class="clearfix cates" ><label class="label_name" style="width:119px;text-align: left;">　<i>*</i>路程时间 :</label>
              <input type="text" autocomplete="off" biaoji="e" onclick="status(this)" name="begin_city_time[]" title="日期" class="laydate-icon start" id="start" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
              <em style="display:block; float:left;margin-right:10px;">至</em>
              <input type="text" autocomplete="off" biaoji="f" name="end_city_time[]" onclick="status(this)" class="laydate-icon" id="end" style="width:200px; padding-left:5px; display:block ;float:left" title="日期"></input>
            </li>
           
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>机票类型 :</label><span class="formControls col-10 ">
            <select name="type[]" id="form-field-1" title="状态" style="margin-left:10px" class="col-xs-10 col-sm-5 " placeholder="请填写价格" maxlength="30">
                
                <option  value="0">头等舱</option>
                <option  value="1">公务舱</option>
                <option  value="2">经济舱</option>
               
            </select>
            </li>
        </div>
    </div>



 </div>
</div>
</body>
</html>
<script type="text/javascript">
i = 1;
b = '';
cnum = [ '一', '二', '三', '四', '五', '六', '七', '八', '九','十'];
  function add(){
    if(i>=3){
        layer.msg("最大不超过3个",{icon: 5,time:1000});
        return;
    }
     
      $('#content1 input').each(function(){
        if($(this).attr('biaoji')=='a'){
          $(this).attr('id','end'+i+'end')
        }
        if($(this).attr('biaoji')=='b'){
          $(this).attr('id','end'+i+i+'end')
        }
        if($(this).attr('biaoji')=='c'){
          $(this).attr('id','end'+i+i+i+'end')
        }
        if($(this).attr('biaoji')=='d'){
          $(this).attr('id','end1'+i+'end')
        }
        if($(this).attr('biaoji')=='e'){
          $(this).attr('id','end2'+i+'end')
        }
        if($(this).attr('biaoji')=='f'){
          $(this).attr('id','end3'+i+'end')
        }
        if($(this).attr('biaoji')=='g'){
          $(this).attr('id','end4'+i+'end')
        }
      });
      

      var a = $('#content1').html();


      $('#content').append(a);
      // $('#content1 li:first').html(content);  

      i++;
  };


</script>
<!-- 百度编辑器 -->
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/style/admin/Widget/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script> 
<!-- 百度编辑器 -->
<script type="text/javascript">
/**提交操作**/

$('#aaa').click(function(){
    var num=0;
    var str="";
     // 判断其他是否为空
     $("#content input[type$='text']").each(function(n){
        if($(this).val()==""){           
                 layer.alert(str+=""+$(this).attr("title")+"不能为空！\r\n",{
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
            // layer.alert('添加成功！',{
   //      title: '提示框',                
            //    icon:1,       
            // });
            // layer.close(index);  
      return true;
    }        
});


// 百度编辑器
$(function(){
    var ue = UE.getEditor('editor');
});
// 百度编辑器

/*radio激发事件*/
function Enable(){ $('.date_Select').css('display','block');}
function closes(){$('.date_Select').css('display','none')}
/**日期选择**/

function status(obj){
    var id = $(obj).attr('id');
    laydate({
        elem: '#'+id,
        format: 'YYYY/MM/DD',
        min: laydate.now(),
        max: '2099-06-16 ',
        istime: true,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    });
    }

laydate({
    elem: '.end',
    format: 'YYYY/MM/DD',
    min: laydate.now(),
    max: '2099-06-16 ',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
});

function clock(obj){
    layer.confirm('确实要删除吗！\r\n',function(){
        $(obj).parents('.border').remove();
        layer.msg('删除成功!',{icon: 6,time:1000});                           
    }); 
}

$('#content').cxSelect({ 
  url: '/style/admin/selectcity/cityData.json',
  selects: ['province'], 
  // nodata: 'none' 
}); 

</script>
