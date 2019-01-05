@extends('home.member_public.index')
@section('title','个人资料')
@section('main')
<link rel="stylesheet" type="text/css" href="/style/home/p_data/userinfoconfirm.css">
<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
<style type="text/css">
  .mainDiv .J_button #save {
    width: 100px;
    height: 32px;
    font-size: 16px;
    line-height: 32px;
    text-align: center;
    border-radius: 2px;
    cursor: pointer;
    border:1px solid #ff6700;
  }
  .alert{
    width: 100%;
    height: 50px;
    border-radius: 10px;
    color: white;
    font-size: 22px;
    line-height: 50px;
    text-align: center;
  }
  .warning{
    border-radius: 10px;
    background: #E85858;
  }
  .success{
    border-radius: 10px;
    background: #A0F0A7;
  }
</style>
  <form name="add_place_form" id="user_info_edit_form" enctype="multipart/form-data" method="post" action="/home/personaldata/save"> 
    {{csrf_field()}}
   <div class="mainDiv"> 
    <div class="info-title"> 
     <ul> 
      <li class="basic-info active">基本信息</li> 
      <li class="extend-info">团队信息</li> 
     </ul> 
    </div> 
    @if(session('success'))
    <div class="alert alert-success">
      <div class="mws-form-message success">
          {{session('success')}}
      </div>
    </div>
    <script>
    setTimeout(function(){
        $('.alert-success').hide();
    },5000);
    </script>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
      <div class="mws-form-message warning">
          {{session('error')}}
      </div> 
    </div>  
    <script>
    setTimeout(function(){
        $('.alert-danger').hide();
    },5000);
    </script>
    @endif

    <table class="show-and-edit">
     <tbody>
      <tr class="head-img"> 
       <td> 
          @if($userinfo->pic == '') 
            <img src="/style/home/p_data/default.png" /> 
          @else 
            <img src="{{$userinfo->pic}}" /> 
          @endif
          <p class="name-tip hide">
            <input type="file" name="pic">
          </p> 
        </td> 
      </tr>
      <!-- 昵称  -->
      <tr class="personal-info"> 
         <td class="title-name"> <span style="color:red">*&nbsp;</span>昵称： </td> 
         <td class="title-val">
          @if($userinfo->nickname == '') 
            未设置 
          @else 
            {{$userinfo->nickname}} 
          @endif 
            <input type="hidden" class="old-nick-name" value="{{$userinfo->nickname}}" /> 
          </td> 
         <td class="input-val hide"> 
            <input type="text" id="nickname" name="nickname" class="nick-name fill-box" title="{{$userinfo->nickname}}" value="{{$userinfo->nickname}}" /><span class="tip-msg" id="nick"></span> 
          </td> 
      </tr> 
      <!-- 昵称报错 -->
      <tr class="name-tip hide"> 
         <td class="title-name"></td> 
         <td class="tip-style" id="nickerror" colspan="2">昵称要求为4-16个字符，支持中文、英文、数字、“_”、“-”</td> 
      </tr> 
      <!-- 姓名 -->
      <tr class="personal-info"> 
         <td class="title-name"> <span style="color:red">*&nbsp;</span>姓名： </td> 
         <td class="title-val"> 
          @if($userinfo->realname == '') 
            未设置 
          @else 
            {{$userinfo->realname}} 
          @endif
         </td> 
         <td class="input-val hide"> 
            <input type="text" id="realname" name="realname" class="real-name fill-box" title="{{$userinfo->realname}}" value="{{$userinfo->realname}}" /><span class="tip-msg" id="real"></span> 
          </td> 
      </tr> 
      <!-- 姓名报错 -->
      <tr class="name-tip hide"> 
         <td class="title-name"></td> 
         <td class="tip-style" id="realerror" colspan="2">姓名要求为2-20位英文或2-10位中文，不能中英混搭</td> 
      </tr>
      <!-- 手机  -->
      <tr class="personal-info"> 
         <td class="title-name"> 手机号： </td> 
         <td class="title-val"> 
            <span class="phonumber">{{$userinfo->phone}}</span>&nbsp;&nbsp;&nbsp;
            <a href="https://i.tuniu.com/change-tel/" class="modify-tel">修改手机号&gt;&gt;</a> 
          </td> 
         <td class="input-val hide">
            <input type="text" class="tel-hide" disabled value="{{$userinfo->phone}}" /> 
         </td> 
      </tr> 
      <!-- 生日 -->
      <tr class="personal-info"> 
          <td class="title-name"> 生日： </td> 
          <td class="title-val"> 
            @if($userinfo->birth == '') 
              未设置 
            @else 
              {{$userinfo->birth}} 
            @endif
            <input type="hidden" class="old-birth-day" value="1985-01-01" /> 
          </td> 
          <td class="input-val hide"> 
              <input type="date" name="birth" value="{{$userinfo->birth}}"> 
          </td> 
      </tr> 
      <!-- 性别 -->
      <tr class="personal-info"> 
          <td class="title-name">性别： </td> 
          <td class="title-val"> {{$userinfo->sex}} </td>  
          <td class="input-val hide"> 
            <input id="female" type="radio" class="sex" name="sex" value="1" @if($userinfo->sex == '男') checked @endif/> 男 &nbsp;&nbsp;&nbsp; 
            <input id="female" type="radio" class="sex" name="sex" value="0" @if($userinfo->sex == '女') checked @endif/> 女 &nbsp;&nbsp;&nbsp; 
            <input id="female" type="radio" class="sex" name="sex" value="2" @if($userinfo->sex == '保密') checked @endif/> 保密
            <span class="tip-msg"></span> 
          </td> 
      </tr> 
      <!-- 邮箱 -->
      <tr class="personal-info"> 
          <td class="title-name"> 邮箱： </td> 
          <td class="title-val"> {{$userinfo->email}}
          <td class="input-val hide">
            <input type="text" class="old-email-address" disabled value="{{$userinfo->email}}" /> </td> 
          </td> 
      </tr> 
      <!-- 地址 -->
      <tr class="personal-info"> 
          <td class="title-name">详细地址： </td> 
          <td class="title-val"> 
            @if($userinfo->address == '')
            未设置&nbsp;&nbsp;&nbsp;
            <span class="fill-tip">为您收货的默认地址</span> 
            @else
            {{$userinfo->address}}
            @endif
          </td> 
          <td class="input-val hide"> 
            <input type="text" class="city-address fill-box" name="address" value="{{$userinfo->address}}" />
            <span class="tip-msg"></span> 
          </td> 
      </tr> 
      <!-- 婚姻 -->
      <tr class="personal-info"> 
          <td class="title-name">婚姻： </td> 
          <td class="title-val"> {{$userinfo->marriage}} </td> 
          <td class="input-val hide"> 
            <select class="marry-status" name="marriage"> 
              <option value="0">请选择</option> 
              <option value="1" @if($userinfo->marriage == '未婚') selected @endif>未婚</option> 
              <option value="2" @if($userinfo->marriage == '已婚') selected @endif>已婚</option> 
            </select> 
          </td> 
      </tr> 
      <!-- 职业 -->
      <tr class="personal-info"> 
         <td class="title-name">职业： </td> 
         <td class="title-val"> {{$userinfo->job}}&nbsp;&nbsp;&nbsp; 
         </td> 
         <td class="input-val hide"> 
            <select id="careerFirstName" class="careerFirstName" name="job">
              <option value="0">请选择</option>
              <option value="1" @if($userinfo->job == '白领/一般职员') selected @endif>白领/一般职员</option>
              <option value="2" @if($userinfo->job == '公务员/事业单位') selected @endif>公务员/事业单位</option>
              <option value="3" @if($userinfo->job == '工业/服务业人员') selected @endif>工业/服务业人员</option>
              <option value="4" @if($userinfo->job == '自由职业/个体户/私营业主') selected @endif>自由职业/个体户/私营业主</option>
              <option value="5" @if($userinfo->job == '无业/失业/下岗') selected @endif>无业/失业/下岗</option>
              <option value="6" @if($userinfo->job == '退休') selected @endif>退休</option>
              <option value="7" @if($userinfo->job == '学生') selected @endif>学生</option>
              <option value="8" @if($userinfo->job == '其他') selected @endif>其他</option>              
            </select> 
            <span class="tip-msg"></span> 
         </td> 
      </tr> 
      <!-- 学历 -->
      <tr class="personal-info"> 
          <td class="title-name">学历： </td> 
          <td class="title-val"> {{$userinfo->degree}} </td> 
          <td class="input-val hide"> 
            <select class="education" name="degree"> 
              <option value="0">请选择</option> 
              <option value="1" @if($userinfo->degree == '博士及以上') selected @endif>博士及以上</option> 
              <option value="2" @if($userinfo->degree == '硕士') selected @endif>硕士</option> 
              <option value="3" @if($userinfo->degree == '本科') selected @endif>本科</option> 
              <option value="4" @if($userinfo->degree == '大专') selected @endif>大专</option> 
              <option value="5" @if($userinfo->degree == '大专及以下') selected @endif>大专及以下</option> 
            </select> 
            <span class="tip-msg"></span> 
          </td> 
      </tr> 
      <!-- 团队 -->
      <tr class="group-info hide"> 
         <td class="title-name"> 所属团队： </td> 
         <td class="title-val">
            @if($userinfo->team == '') 
            未设置&nbsp;&nbsp;&nbsp;<span class="fill-tip">通过团队识别快速关联团队亲友</span> 
            @else
            {{$userinfo->team}}
            @endif
         </td> 
         <td class="input-val hide"> 
            <input type="text" id="group-code" name="team" class="group-code fill-box" placeholder="请输入关联团识别码" value="{{$userinfo->team}}" />
            <span class="tip-msg"></span> 
         </td> 
      </tr> 
      <!-- 座机 -->
      <tr class="group-info hide"> 
         <td class="title-name"> 座机： </td> 
         <td class="title-val"> 
            @if($userinfo->tel == '')
            未设置&nbsp;&nbsp;&nbsp;<span class="fill-tip">方便联系</span> 
            @else
            {{$userinfo->tel}}
            @endif
         <td class="input-val hide"> 
            <input type="text" id="tel-num" name="tel" class="tel-num" placeholder="座机号" value="{{$userinfo->tel}}" />
            <span class="tip-msg" id="tel"></span> 
         </td> 
      </tr> 
      <tr> 
        <td colspan="3" class="J_button"> 
          <div class="J_edit">
           编辑
          </div> 
          <button type="submit" class="J_save hide" id="save">保存</button>
          <!-- <div class="J_save hide">
           保存
          </div>  -->
          <div class="J_cancel hide">
           取消
          </div> 
        </td> 
      </tr>
     </tbody>
    </table> 
   </div> 
  </form> 
  <div id="over-lay" class="hide"> 
    <div class="cancel-tip box hide"> 
      <p>提示<img src="/style/home/p_data/close.png" class="close-btn" style="" /></p> 
      <div> 
         <p>放弃已编辑内容?</p> 
         <a href="javascript:;" class="sure-btn">确认</a> 
         <a href="javascript:;" class="cancel-btn">取消</a> 
      </div> 
    </div> 
  </div>

  <script type="text/javascript">
// 点击基本信息和团队信息
$(".info-title>ul>li").live("click",function(){
    // 移出所有li的样式
    $(".info-title>ul>li").removeClass("active");
    // 给当前li添加样式
    $(this).addClass("active");
    // 判断当前li的样式是否有基本信息样式
    if($(this).hasClass('basic-info')){
        $(".head-img").removeClass('hide');
        $(".show-and-edit .personal-info").removeClass("hide");
        $(".show-and-edit .group-info").addClass("hide");
        $(".group-info .title-val").removeClass('hide');
        $(".group-info .input-val").addClass('hide');
        $(".name-tip").addClass('hide');
        $(".remind-tip").removeClass('hide');
        $('#user_info_edit_form')[0].reset();
    // 判断当前li的样式是否有团队信息样式
    }else if($(this).hasClass('extend-info')){
        $(".head-img").addClass('hide');
        $(".show-and-edit .personal-info").addClass("hide");
        $(".show-and-edit .group-info").removeClass("hide");
        $(".personal-info .title-val").removeClass('hide');
        $(".personal-info .input-val").addClass('hide');
        $(".name-tip").addClass('hide');
        $(".remind-tip").addClass('hide');
        $('#user_info_edit_form')[0].reset();
    }
    // 保存隐藏
    $(".J_save").addClass('hide');
    // 取消隐藏
    $(".J_cancel").addClass('hide');
    // 编辑显示
    $(".J_edit").removeClass('hide');
});

//编辑按钮效果
$(".J_edit").live("click",function(){
    if($(".info-title .active").hasClass("basic-info")){
        $(".personal-info .title-val").addClass('hide');
        $(".personal-info .input-val").removeClass('hide');
        $(".name-tip").removeClass('hide');
    }else if($(".info-title .active").hasClass("extend-info")){
        $(".group-info .title-val").addClass('hide');
        $(".group-info .input-val").removeClass('hide');
        $(".name-tip").addClass('hide');
    }
    $(".J_save").removeClass('hide');
    $(".J_cancel").removeClass('hide');
    $(".J_edit").addClass('hide');
});

//取消按钮效果
$(".J_cancel").live("click",function(){
    $("#over-lay").removeClass('hide');
    $(".cancel-tip").removeClass('hide');
});

//弹框取消按钮和关闭按钮效果
$('.close-btn,.cancel-btn,.confirm-btn').live("click",function(){
    $("#over-lay").addClass('hide');
    $(".box").addClass('hide');
});

//确认取消编辑按钮效果
$(".sure-btn").live("click",function(){
    $("#over-lay").addClass('hide');
    $(".box").addClass('hide');
    $(".title-val").removeClass('hide');
    $(".input-val").addClass('hide');
    $(".J_save").addClass('hide');
    $(".J_cancel").addClass('hide');
    $(".J_edit").removeClass('hide');
    $(".name-tip").addClass('hide');
    $('#user_info_edit_form')[0].reset();
});


// 表单验证
var NN = true; //昵称
var RR = true; //姓名
var ZZ = true; //座机
// 昵称验证
$('#nickname').blur(function(){
  // 判断如果昵称不为空则验证
  if($(this).val() != $(this).attr('title')){
      var v = $(this).val();
      if(v.length<4 || v.length>16){
          $('#nickerror').css('color','red');
          NN = false;
      }else{
          // 判断昵称是否存在
          $.get('/home/personaldata/checknick',{'nickname':v},function(data){
            if(data == 1){
              $('#nick').html('昵称已存在,请换一个').css('color','red');
              NN = false;
            }else{
              $('#nickerror').css('color','#999');
              NN = true;
            }
          })      
      }
  }else{
    $('#nickerror').css('color','#999');
    NN = true;
  }
})
// 姓名验证
$('#realname').blur(function(){
  // 判断如果昵称不为空则验证
  if($(this).val() != $(this).attr('title')){
      var v = $(this).val();
      // 正则
      var pattern_en = /^[a-zA-Z]{2,20}$/;  //全英语2-20位
      var pattern_ch = /^[\u4e00-\u9fa5]{2,10}$/;  //全中文2-10位
      // 判断是否为中文或英文
      if(pattern_en.test(v)){
          // 判断姓名是否存在
          $.get('/home/personaldata/checkreal',{'realname':v},function(data){
            if(data == 1){
              $('#real').html(' 姓名已存在,请换一个').css('color','red');
              RR = false;
            }else{
              $('#realerror').css('color','#999');
              RR = true;
            }
          })  
          
      }else if(pattern_ch.test(v)){
          $.get('/home/personaldata/checkreal',{'realname':v},function(data){
            if(data == 1){
              $('#real').html(' 姓名已存在,请换一个').css('color','red');
              RR = false;
            }else{
              $('#realerror').css('color','#999');
              RR = true;
            }
          })    
      }else{
          $('#realerror').css('color','red');
          RR = false;
      }
  }else{
    $('#realerror').css('color','#999');
    RR = true;
  }
})


$('#tel-num').blur(function(){
  if($('#tel-num').val() != ''){
    var v = $('#tel-num').val();
    var pattern = /^[0-9]*$/;
    if(!pattern.test(v)){ 
        $("#tel").html("座机有只能为数字").css('color','red');
        ZZ = false; 
    }else{
        $("#tel").html('');
        ZZ = true; 
    }
  }else{
    $("#tel").html('');
    ZZ = true; 
  }
})      

//保存功能
$(".J_save").live("click",function(){
    if(NN && RR && ZZ){
      $('#user_info_edit_form').submit()
    }else{
      return false;
    }
});
  </script>
@endsection