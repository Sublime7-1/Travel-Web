@extends('home.publics.center')
@section('title','途牛投诉与建议处理')
@section('main')
 <link type="text/css" href="/style/home/publics/layer.css" rel="stylesheet" /> 
 <script src="/style/home/public/jquery-1.7.2.min.js"></script>
 <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
 <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
 <style type="text/css">
 .ad-modal-layout {
      width: 100%;
      height: 100%;
   }
   
 .ad-modal {
      position: fixed;
      left: 50%;
      background: #BCBFBF;
      z-index: 999999;
  }
  
 .ad-modal-in {
      height: 80px;
  }
  
 .ad-modal .ad-center {
      overflow: hidden;
      display: inline-block;
  }
  
 .ad-modal .ad-icon-ok {
      display: block;
      width: 36px;

  }
  
 .ad-modal .ad-icon-error {
      display: block;
      width: 36px;

  }
  
 .ad-modal .ad-modal-text {
      float: left;
      font-weight: 700;

  }
  
 .ad-modal .ad-modal-text .f1 {
     font-size: 16px;
     color: #333;
  }
 
 .ad-modal .ad-modal-text .f2 {
     font-size: 14px;
     color: #666;
 }
 </style>
	<div id="main" class="con">
	    <!-- 投诉建议 -->
	    <div class="page-advise">
	        <div class="advise-title-ctn">
	            <h1 class="advise-title">投诉与建议</h1>
	            <h3 class="advise-sub-title">您的参与将帮助我们改进产品及服务。</h3>
	            <p class="advise-label">非常感谢您使用途牛旅游网，如果您有提议、投诉及相关建议，可以通过以下方式联系我们:</p>
	        </div>
	        <div class="advise-contact-ctn">
	            <ul class="clearfix">
	                <li>
	                    <img class="J_onlineServiceBtn" style="cursor:pointer;" src="/style/home/publics/icon-chat.gif" alt="" width="50" height="50">
	                    <p>欢迎点击<span class="J_onlineServiceBtn" style="cursor:pointer;color:#ff8800;text-decoration:underline;">咨询在线客服</span></p>
	                    <p>我们会第一时间处理</p>
	                </li>
	                <li>
	                    <img src="/style/home/publics/icon-phone.png" alt="" width="50" height="50">
	                    <p>拨打投诉电话</p>
	                    <p><em>+86 15976362497</em></p>
	                </li>
	                <li>
	                    <img src="/style/home/publics/icon-mail.png" alt="" width="50" height="50">
	                    <p>发送邮件到如下邮箱</p>
	                    <p>1021664319@qq.com</p>
	                    <p style="font-size:12px;color:#ff8800;">请在邮件中留下订单号或手机号码</p>
	                </li>
	                <li class="last">
	                    <img src="/style/home/publics/icon-consult.png" alt="" width="50" height="50">
	                    <p>在线提交意见表单</p>
	                    <p>我们会尽快回复</p>
	                </li>
	            </ul>
	        </div>
	         @if(session('success'))
			  <div id="J_adModalLayout" class="ad-modal-layout"></div>
                <div id="J_adModal" class="ad-modal">
                    <div class="ad-center">
                        <i class="ad-icon-ok"></i>
                        <div class="ad-modal-text">
                            <p class="f1">已收到您的反馈~</p>
                            <p class="f2">我们会尽快处理，短时间内请勿重复提交哦</p>
                        </div>
                    </div>
                </div>
			  <script>
			  setTimeout(function() {
                $('#J_adModalLayout').remove();
                $('#J_adModal').remove();
            	}, 5000);
			  </script>
 

			  @endif
			  @if(session('error'))
			  <div id="J_adModalLayout" class="ad-modal-layout"></div>
                <div id="J_adModal" class="ad-modal ad-modal-in">
                    <div class="ad-center">
                        <i class="ad-icon-error"></i>
                        <div class="ad-modal-text">
                            <p class="f1">{{session('error')}}</p>
                        </div>
                    </div>
                </div>  
			  <script>
			  setTimeout(function() {
                $('#J_adModalLayout').remove();
                $('#J_adModal').remove();
              }, 5000);
			  </script>
			@endif
	        <form class="advise-form J_advise-form" action="/home/advices" method="post" id="content" enctype="multipart/form-data">
	        	{{csrf_field()}}
	            <div class="advise-form-item">
	                <p class="advise-label"><span class="required">*</span>选择反馈类型：</p>
	                <ul class="advise-types clearfix J_types">
	                	@foreach($type as $k=>$v)
	                    <li name="{{$v->id}}">
	                        <span class="advise-txt">{{$v->type}}</span>
	                        <span class="poptip hide">
	                            <i class="icon icon-tri"></i>{{$v->content}}
	                        </span>
	                    </li>
	                    @endforeach
	                </ul>
	            </div>
	            <!-- 反馈类型 -->
	            <div class="advise-form-item">
                	<input type="text" name="pid" id="pid" title="反馈类型" value="" style="display: none;">
                	<span class="tip"><i class="icon"></i><span class="tip-txt"></span></span>
            	</div>
	            <div class="advise-form-item">
	                <p class="advise-label"><span class="required">*</span>请详细描述您的建议、意见、问题等：</p>
	                <textarea id="J_detail" class="J_detail form-default" rows="8" data-field="co_advantage" placeholder="必填" name="content" title="描述" maxlength="1000"></textarea>
	                 <span class="tip"><i class="icon"></i><span class="tip-txt"></span></span>
	            </div>
	            <div class="advise-form-item">
	                <span class="advise-label screenshot-label">上传相关页面截图：</span>
	                <ul class="J_screenshots clearfix">
	                	<input type="file" name="img" title="图片">
	                </ul>
	            </div>
	            <div class="advise-form-item">
	                <span class="advise-label">电子邮箱</span>
	                <input type="text" placeholder="必填" id="J_email" name="email" class="J_input input form-default" data-field="email" title="电子邮箱" maxlength="50">
	                <span class="tip"><i class="icon"></i><span class="tip-txt"></span></span>
	            </div>
	            <div class="advise-form-item">
	                <span class="advise-label">手机号码</span>
	                <input type="text" placeholder="必填" title="手机号码" name="phone" id="J_phone" class="J_input input form-default" data-field="phone" maxlength="11">
	                <span class="tip"><i class="icon"></i><span class="tip-txt"></span></span>
	            </div>
                <!-- 登录用户 -->
	            <div class="advise-form-item">
                	<input type="text" name="uid" id="uid" value="{{session('userid')}}" style="display: none;">
                	<span class="tip"><i class="icon"></i><span class="tip-txt"></span></span>
            	</div>
	            <div class="btn-block clearfix">
	                <button type="submit" class="form-btn positive-form-btn" id="aaa">提交</button>
	            </div>
	        </form>
	    </div>
	</div>
<script type="text/javascript">
$(function(){
	var ss = "{{session('userid')}}";
	if(ss == ''){
		location.href = '/login';
	}

});


/*反馈类型选择*/
var typesCtn = $('.J_types');
var types = typesCtn.find('li');
types.live('click', function(){
    $(this).addClass('current').siblings('li').removeClass('current');
    pid = $(this).attr('name');
    $("#pid").val(pid);
});




$('#aaa').click(function(){
    var num=0;
    var str="";
     // 判断其他是否为空
     $("#content input[type$='text']").each(function(n){
        if($(this).val()==""){ 
        	if($(this).attr('name') == 'pid'){
        		layer.alert(str+=""+"请选择"+$(this).attr("title")+"\r\n",{
                title: '提示框',               
                        icon:0,                             
            	}); 
               	num++;
            	return false;
        	}else{        
	            layer.alert(str+=""+$(this).attr("title")+"不能为空！\r\n",{
	                title: '提示框',               
	                        icon:0,                             
	            }); 
	            num++;
	            return false;  
            }          
        } 
    });
    $("#content textarea").each(function(n){
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
      // 获取数据

    }        
});

</script>
@endsection