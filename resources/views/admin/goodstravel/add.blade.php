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
      <form action="/admin/goodsinfo/travel" method="post" id="formtip">
        <input type="hidden" name="goods_id" value="{{$goods_id}}" />
        {{csrf_field()}}
       <ul>
        <li class="clearfix Mandatory"><label class="label_name" style="width:87px"><i>*</i>管理员名称 :</label><span class="formControls col-10"><input style="width:auto" type="text" title="管理员" value="{{$goods_name}}" id="form-field-1" readonly class="col-xs-10 col-sm-1"></span>
        </li>
       <div id="content">
        <div class="border" >
            <button type="button" class="btn btn-default close" style="color:#393939; float: right; line-height: 15px; background:#b0b0b0 "onclick="layer.msg('最少保留一个!',{icon: 5,time:1000});"><i class="fa fa-remove"></i>
            </button>
            <li class="clearfix cates" ><label class="label_name" style="width:119px"><i>*</i>第一次旅游时间</label>
              <input type="text" autocomplete="off" onclick="status(this)" name="begin_time[]" title="日期" class="laydate-icon start" id="start" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
              <em style="display:block; float:left;margin-right:10px;">至</em>
              <input type="text" autocomplete="off" name="end_time[]" class="laydate-icon" id="end" style="width:200px; padding-left:5px; display:block ;float:left" title="日期"></input>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>日程描述 :</label><span class="formControls col-10 end"><input name="content[]" type="text" id="form-field-1" title="日程描述" class="col-xs-10 col-sm-5 " placeholder=" 请输入30字以内的标题..." maxlength="30"></span>

            </li>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>发售数量 :</label><span class="formControls col-10 "><input name="num[]" type="text" id="form-field-1" title="数量" class="col-xs-10 col-sm-5 " placeholder="请填写数量" maxlength="30" value=""></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>优惠价格 :</label><span class="formControls col-10 ">
            <select name="percent[]" id="form-field-1" title="状态" style="margin-left:10px" class="col-xs-10 col-sm-5 " placeholder="请填写价格" maxlength="30">
                @for($i=10;$i>0;$i--)
                <option  value="{{$i}}0">{{$i}}0%</option>
                @endfor
            </select>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>状态 :</label><span class="formControls col-10 ">
            <select name="status[]" id="form-field-1" title="状态" style="margin-left:10px" class="col-xs-10 col-sm-5 " placeholder="请填写数量" maxlength="30" >
                <option value="0">发售</option>
                <option value="1">取消发售</option>
            </select>
            </li>
        </div>
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
        <div class="border add_content">
              <button type="button" class="btn btn-default close" style="color:#393939; float: right; line-height: 15px; background:#b0b0b0 " onclick="clock(this)"><i class="fa fa-remove"></i>
              </button>
              <li class="clearfix cates " ><label class="label_name abc" style="width:119px;float:left" ><i>*</i>第一次旅游时间 :</label>

              <input type="text" autocomplete="off" name="begin_time[]" title="日期" class="laydate-icon start" id="start" onclick="status(this)" style="width:200px; margin-left:10px; padding-left:5px; margin-right:10px; display:block; float:left"></input>
              <em style="display:block; float:left;margin-right:10px;">至</em>
              <input type="text" autocomplete="off" onclick="status(this)" name="end_time[]" title="日期" class="laydate-icon end" id="end" style="width:200px; padding-left:5px; display:block ;float:left"></input>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name" style="float:left"><i>*</i>日程描述 :</label>

            <span class="formControls col-10"><input name="content[]" type="text" id="form-field-1" title="日程描述" class="col-xs-10 col-sm-5 " style="width:542px" placeholder=" 请输入30字以内的标题..." maxlength="30"></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>发售数量 :</label><span class="formControls col-10 "><input name="num[]" type="text" id="form-field-1" title="数量" class="col-xs-10 col-sm-5 " placeholder="请填写数量" maxlength="30" value=""></span>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>优惠价格 :</label><span class="formControls col-10 ">
            <select name="percent[]" id="form-field-1" title="状态" style="margin-left:10px" class="col-xs-10 col-sm-5 " placeholder="请填写数量" maxlength="30" value="">
                @for($i=10;$i>0;$i--)
                <option value="{{$i}}0">{{$i}}0%</option>
                @endfor
            </select>
            </li>
            <li class="clearfix Mandatory">
            <label class="label_name"><i>*</i>状态 :</label><span class="formControls col-10 ">
            <select name="status[]" id="form-field-1" title="状态" style="margin-left:10px" class="col-xs-10 col-sm-5 " placeholder="请填写数量" maxlength="30" value="">
                <option value="0">发售</option>
                <option value="1">取消发售</option>
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
    if(i>=10){
        layer.msg("最大不超过十天",{icon: 5,time:1000});
        return;
    }
      var day = cnum[''+i+''];
      $('#content1 .abc').html('<i>*</i>第'+day+'次旅游时间 :');
      $('#content1 input:first').attr('id','status'+i+'');
      $('#content1 input:eq(1)').attr('id','end'+i+'');

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

</script>
