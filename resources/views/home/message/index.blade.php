@extends('home.member_public.index')
@section('title','站内信')
@section('main')
<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="/style/admin/assets/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="/style/home/message/mail.css" type="text/css" /> 
  <!--主体内容开始--> 
<style type="text/css">
	.index1200 .mail_list_hd_date {
	    width: 200px;
	}
	.index1200 .mail_list_hd_cz {
	    width: 200px;
	}

	/*#pages li{
		float: left;
		height: 20px;
		padding: 0 6px;
		display: block;
		font-size: 16px;
		line-height: 20px;
		text-align: center;
		cursor: pointer;
		outline: none;
		background-color: #444444;
		color: #fff;
		text-decoration: none;
		border-right: 1px solid rgba(0, 0, 0, 0.5);
		border-left: 1px solid rgba(255, 255, 255, 0.15);
		box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
	}

	#pages .pagination .disabled{
		color: #666666;
		cursor: default;
	}

	#pages .pagination a{
		color:green;
		font-size: 16px;
	}


	#pages .pagination .active{
		background-color: white;
		color: #323232;
		border: none;
		background-image: none;
		box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
	}

	#pages .pagination{
		height:auto;
		margin-left:0px;
	}
	#pages{
		height: 40px;
	}
	*/
	#list{
        padding-left:415px;
    }
   .pagination {
	    clear: both;
	    color: #404040;
	    font-size: 12px;
	    font-weight: 400;
	    height: 40px;
	    margin: 0 auto 8px;
	    padding-right: 0;
	    padding-top: 15px;
	}
   .pagination li{
        display:inline-block;
        float:left;
        
   }  
   .pagination li span {
	    width: 28px;
	    height: 29px;
	    display: block;
	    line-height: 29px;
	}
</style>
<div class="mainDiv"> 
  	<div class="change_title"> 
	    <ul id="tabChangeNav" class="clearfix"> 
	     <li id="inmsglist" class="cur"> <span class="green">收件箱</span> </li> 
	     <!-- <li id="outmsglist"> <span>发件箱</span> </li>  -->
	    </ul> 
  	</div> 
    <div id="tabChangeBox" class="common_div messageBox"> 
	    <!--收件箱S-->
	    <div class="messageBox_item tabChangeCon hide" style="display: block;"> 
	     <div class="mail_list_hd clearfix"> 
	      <div class="mail_list_hd_head mail_list_hd_sender">发件人</div> 
	      <div class="mail_list_hd_head mail_list_hd_tit" style="width: 150px">标题</div> 
	      <div class="mail_list_hd_head mail_list_hd_tit" style="width: 320px">内容</div> 	      
	      <div class="mail_list_hd_head mail_list_hd_date">日期</div> 
	      <div class="mail_list_hd_head mail_list_hd_cz" style="width: 80px">操作</div> 
	     </div> 
	     <div id="J_MailList" class="mail_list J_ResponseList"> 
	     @if($sinfo)
	     	<table style="width: 100%;">
	     	@foreach($sinfo as $k=>$v)
	     		<tr>
	     			<td style="width: 175px;text-align: center;">{{$v->aname}}</td>
	     			<td style="width: 170px;text-align: center">{{$v->title}}</td>
	     			<td style="text-align: center;width: 450px">{!!$v->content!!}</td>	     			
	     			<td style="width: 200px;text-align: center">{{$v->time}}</td>
	     			<td style="width: 160px;text-align: center">
	     				<button onclick="mem_del(this,{{$v->id}})" style="width: 80px;color:white;height: 30px;background:red;border-radius: 10px">删除</button>
	     			</td>
	     		</tr>
	      	@endforeach
	      	</table>
	     @else
	      <div id="outmessagelist"> 
	       <div class="order_list"> 
	        <p class="t_cen"> <span class="page_icon icon_niu_b"></span> </p> 
	        <p class="t_cen no_tip">您最近没有信息提醒哦！</p> 
	       </div> 
	      </div> 
	     @endif
	     </div> 
	     <!-- <div class="pagination clearfx" id="msgoutpages" data-curpage="1" data-pager-inited="true"> -->
	      	<div style="margin:0 auto;text-align:center;height: 100px" id="list">{{$sinfo->links()}}</div>
	     </div> 
	    <!-- </div>  -->
	    <!--收件箱E-->
	    <!--发件箱S-->     	
	    <div class="messageBox_item tabChangeCon" style="display: none;"> 
	     	<div class="mail_list_hd clearfix"> 
	   		  <div class="mail_list_hd_head mail_list_hd_sender">收件人</div> 
		      <div class="mail_list_hd_head mail_list_hd_tit">标题</div> 
		      <div class="mail_list_hd_head mail_list_hd_date">日期</div> 
		      <div class="mail_list_hd_head mail_list_hd_cz">操作</div> 
	    	</div> 
		    <div id="J_MailList" class="mail_list J_ResponseList"> 
	      		<div id="inmessagelist"> 
	       			<div class="order_list"> 
	        		<p class="t_cen"> <span class="page_icon icon_niu_b"></span> </p> 
	        		<p class="t_cen no_tip">您最近没有发送信息哦！</p> 
	       			</div> 
	      		</div> 
	      		<div class="pagination clearfx" id="msginpages" data-curpage="1" data-pager-inited="true">
	       			<div class="page-bottom"></div>
	      		</div> 
	     	</div> 
		    <div class="dialog" id="J_Dialog"> 
		      	<div class="dialog_layer"></div> 
			    <div class="dialog_con"> 
			       	<div class="dialog_border"></div> 
			        <div class="dialog_box"> 
				        <div class="dialog_hd"> 
				         <h3>发送站内信</h3> 
				         <i id="J_DialogClose" class="dialog_close_btn"></i> 
				        </div> 
				        <div class="dialog_content"> 
					        <form method="post" action="http://i.tuniu.com/tn?r=user/usermsg/sendthememsg"> 
					            <table> 
						            <tbody>
							            <tr> 
							             <th>收件人ID:</th> 
							             <td> 
							              <div class="dialog_inp"> 
							               <div class="dialog_placeholder">
							                请输入收件人ID
							               </div> 
							               <input type="text" name="receiverid" /> 
							              </div> </td> 
							            </tr> 
							            <tr> 
							             <th>主题:</th> 
							             <td> 
							              <div class="dialog_inp"> 
							               <div class="dialog_placeholder">
							                请输入20字以内的主题
							               </div> 
							               <input type="text" name="theme" /> 
							              </div> </td> 
							            </tr> 
							            <tr> 
							             <th>内容:</th> 
							             <td> 
							              <div class="dialog_inp"> 
							               <textarea name="content"></textarea> 
							              </div> </td> 
							            </tr> 
							            <tr> 
							             	<th></th> 
							             	<td> 
								              <div class="dialog_btns"> 
								               <!--<a id="J_DialogSend" class="dialog_btn_send" href="javascript:;">发送</a>
								                                                    --> 
								               <input id="J_DialogSend" class="dialog_btn_send" type="submit" value="发送" /> 
								               <a id="J_DialogCancel" class="dialog_btn_cancel" href="javascript:;">取消</a> 
								              </div> 
							          	 	</td> 
							            </tr> 
						            </tbody>
						        </table> 
					        </form> 
				        </div> 
			        </div> 
			    </div> 
		    </div> 
	    </div> 
	    <!-- 发件箱E -->
    </div> 
</div>
<script type="text/javascript">
	$("#outmsglist").click(function(){
	$("#inmessagelist input[type='checkbox']").attr('checked',false);
	$("#outmessagelist input[type='checkbox']").attr('checked',false);
});
$("#inmsglist").click(function(){
	$("#outmessagelist input[type='checkbox']").attr('checked',false);
	$("#inmessagelist input[type='checkbox']").attr('checked',false);
	
});

function mem_del(obj,id){
	layer.confirm('您确定要删除吗？',function(index){
        layer.close(index);
  		$.get('/home/message/del',{'id':id},function(data){
			if(data == 1){
				$(obj).parents("tr").remove();
			}else{
				alert('删除失败');
			}
		})
    });
}


</script>
@endsection