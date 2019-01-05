@extends('home.member_public.index')
@section('title','评论')
@section('main')
<script type="text/javascript" src="/style/admin/js/jquery-1.7.2.min.js"></script>
  <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />

<script src="/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/uploadify/uploadify.css">

    <div class="divmask" style="display:none"></div>
    <div id="SuccessJump" class="popSuc" style="display:none">
        <style>
        #innerBox { width: 470px; margin-left: -235px; border: 15px solid #ccc; height: 212px; margin-top: -220px; padding-top: 0; } #innerBox .left{ float: left; margin-left: 16px; } #innerBox .right{ overflow: hidden; text-align: left; padding-left: 15px; } #innerBox h1 { margin: 22px 130px; font-size: 18px; font-weight: bold; } #innerBox p{ font-size: 12px; color: #666; word-break: break-all; word-wrap: break-word; } #innerBox a{ color: #67c93c; cursor: pointer; } #innerBox .close{ cursor: pointer; } #innerBox .top{ margin-top: 30px; } #innerBox .commit-btn{ display: block; border-radius: 3px; color: #fff; background-color: #f80; width: 96px; height: 34px; text-align: center; line-height: 34px; margin: 30px 170px; } #innerBox .writting{ font-size: 12px; position: absolute; bottom: 0; padding-left: 0; line-height: 44px; border-top: 1px dashed #eee; left: 0; right: 0; } .success-icon{ background: url("//ssl1.tuniucdn.com/site/img/member/center/ok2.png") no-repeat; padding: 7px 19px; } .HotelEvaluation .synthesis, .ticketEvaluation .synthesis, .HotelEvaluation .gradetemplates, .ticketEvaluation .gradetemplates, .mainDiv .fi_left #travelType .synthesis, .mainDiv .fi_left .fi_score .synthesis, .mainDiv .fi_left #travelType .gradetemplates, .mainDiv .fi_left .fi_score .gradetemplates{ width: 300px; } .mainDiv .fi_left .fi_score { position: relative; height: 162px } .mainDiv .fi_left .fi_score>dt { height: 140px } .index1200 .mainDiv .fi_left .fi_score{ height: 160px; } .index1200 .mainDiv .fi_left .fi_score>dt{ height: 140px; } .mainDiv .fi_left .judge { height: 490px; } .mainDiv .fi_left .judge>dt { height: 598px; } .pull-left{ float: right; } .mainDiv .header-summary .right{ width: 200px; text-align: center; position: relative; } .mainDiv .header-summary-satisfy dl{ padding-left: 0; color: #98A6AA; }
        </style>
        <div class="innerBox" id="innerBox">
            <div class="top">
                <div class="right">
                    <h1><i class="success-icon"></i>恭喜您点评成功！</h1>
                    <a href="/home/personal/index" class="commit-btn">确定</a>
                </div>
            </div>
            <div class="bottom">
                <p class="writting">写游记就送奖，最高赢双人免额游、ipadmini、千元旅游券等惊喜大奖！
                    <a href="http://www.tuniu.com/gt/youji/" class="cgreen">了解详情&gt;&gt;</a>
                </p>
            </div>
            <div class="close" id="btn_hidepopBox">
                <img src="/style/home/member_public/close.png" style="">
            </div>
        </div>
    </div>
    <div id="ErrorJump" class="popSuc" style="display:none">
        <style>
        #innerBox { width: 470px; margin-left: -235px; border: 15px solid #ccc; height: 212px; margin-top: -220px; padding-top: 0; } #innerBox .left{ float: left; margin-left: 16px; } #innerBox .right{ overflow: hidden; text-align: left; padding-left: 15px; } #innerBox h1 { margin: 22px 130px; font-size: 18px; font-weight: bold; } #innerBox p{ font-size: 12px; color: #666; word-break: break-all; word-wrap: break-word; } #innerBox a{ color: #67c93c; cursor: pointer; } #innerBox .close{ cursor: pointer; } #innerBox .top{ margin-top: 30px; } #innerBox .commit-btn{ display: block; border-radius: 3px; color: #fff; background-color: #f80; width: 96px; height: 34px; text-align: center; line-height: 34px; margin: 30px 170px; } #innerBox .writting{ font-size: 12px; position: absolute; bottom: 0; padding-left: 0; line-height: 44px; border-top: 1px dashed #eee; left: 0; right: 0; } .success-icon{ background: url("//ssl1.tuniucdn.com/site/img/member/center/ok2.png") no-repeat; padding: 7px 19px; } .HotelEvaluation .synthesis, .ticketEvaluation .synthesis, .HotelEvaluation .gradetemplates, .ticketEvaluation .gradetemplates, .mainDiv .fi_left #travelType .synthesis, .mainDiv .fi_left .fi_score .synthesis, .mainDiv .fi_left #travelType .gradetemplates, .mainDiv .fi_left .fi_score .gradetemplates{ width: 300px; } .mainDiv .fi_left .fi_score { position: relative; height: 162px } .mainDiv .fi_left .fi_score>dt { height: 140px } .index1200 .mainDiv .fi_left .fi_score{ height: 160px; } .index1200 .mainDiv .fi_left .fi_score>dt{ height: 140px; } .mainDiv .fi_left .judge { height: 490px; } .mainDiv .fi_left .judge>dt { height: 598px; } .pull-left{ float: right; } .mainDiv .header-summary .right{ width: 200px; text-align: center; position: relative; } .mainDiv .header-summary-satisfy dl{ padding-left: 0; color: #98A6AA; }
        </style>
        <div class="innerBox" id="innerBox">
            <div class="top">
                <div class="right">
                    <h1><i class="success-icon"></i>点评失败了哦！</h1>
                    <a href="" class="commit-btn">确定</a>
                </div>
            </div>
            <div class="bottom">
                <p class="writting">写游记就送奖，最高赢双人免额游、ipadmini、千元旅游券等惊喜大奖！
                    <a href="http://www.tuniu.com/gt/youji/" class="cgreen">了解详情&gt;&gt;</a>
                </p>
            </div>
            <div class="close" id="btn_hidepopBox">
                <img src="/style/home/member_public/close.png" style="">
            </div>
        </div>
    </div>

    <!--主体内容开始-->
    <div class="mainDiv">
        <div class="header_box">
            <input type="hidden" id="orderId" value="1185874927">
            <div class="left oh">
                <div class="right pull-right header-summary-satisfy">
                    <dl class="clearfix">
                        <dt class="eva_num">
                            <em>已有{{$comment_total}}人点评，</em>
                        </dt>
                        <dt class="pull-left">满意度:
                        </dt>
                        <dd class="pull-right value" id="sat_value">
                            <span>{{$satisfied}}%</span>
                        </dd>
                    </dl>
                </div>
                <h1 class="header-order-name" id="gid" title="{{$goodsinfo->id}}">{{$goodsinfo->title}}</h1>
                <p class="header-order-detail">
                    <span>订单编号:
                        <em class="high-light" id="oid" data='{{$orderinfo->id}}'>{{$orderinfo->order_num}}</em>
                    </span>
                    <span>人数: {{$orderinfo->adult_num}}成人&nbsp;{{$orderinfo->child_num}}儿童</span>
                    <span>出游时间: {{$orderinfo->begin_time}} ~ {{$orderinfo->end_time}}</span>
                </p>
            </div>
            <dl class="clearfix sa_tt hide">
                <dt class="hide">您的建议，完善我们的服务！</dt>
                <dd>
                    <span>完成本次点评您最多可以获得
                        <div class="eva_done"></div>
                    </span>
                </dd>
            </dl>
            <!--综合评价 start-->
            <dl class="noborder travel-type" id="travelType" style="overflow: hidden">
                <dt style="padding-bottom: 200px;margin-bottom: -231px;">
                    <span>综合评价</span>
                </dt>
                <div class="travel_box">
                    <dd>
                        <div class="wrap">
                            <span class="error_map" style="display: none">请选择满意度</span>
                            <dl class="gradetemplates_eval" eva="" data="不满意,一般,满意" style="">
                                <dt style="font-size:16px;font-weight:600">综合评价</dt>
                                <dd gradeid="" id="colligate" class="evaluation" data="2">
                                    <img class="star first bad" star="0" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star second normal" star="2" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star third good totEvaluation" star="3" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <span class="synthesis_tip" style="right:85px;">满意</span>
                                </dd>
                            </dl>
                            <dl class="gradetemplates" eva="51" data="不满意,一般,满意" style="">
                                <dt>预订优惠</dt>
                                <dd gradeid="" id="discount" data="2">
                                    <img class="star first" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star second" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star third" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <span class="synthesis_tip">满意</span>
                                </dd>
                            </dl>
                            <dl class="gradetemplates" eva="52" data="不满意,一般,满意" style="">
                                <dt>游玩服务</dt>
                                <dd gradeid="" id="service" data="2">
                                    <img class="star first" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star second" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star third" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <span class="synthesis_tip">满意</span>
                                </dd>
                            </dl>
                            <dl class="gradetemplates" eva="53" data="不满意,一般,满意" style="">
                                <dt>游玩体验</dt>
                                <dd gradeid="" id="experience" data="2">
                                    <img class="star first" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star second" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <img class="star third" src="/style/home/member_public/Cii-TFkdYSqINJMUAAAGFynBPIEAAJQ7wP_-dEAAAYv912.png">
                                    <span class="synthesis_tip">满意</span>
                                </dd>
                            </dl>
                        </div>
                    </dd>
                </div>
                <div id="evaluation_box">
                    <dd class="travel_type">
                        <em>出游类型：</em>
                        @foreach($commenttype as $k=>$v)
                        <span value="{{$v->id}}" title="{{$v->name}}">{{$v->name}}</span>
                        @endforeach
                        <span class="error_map" style="display:none">请选择出游类型</span>
                    </dd>
                    <dd class="travel_feel" style="position:relative">
                        <span class="wholeJudge">整体评价</span>
                        <div class="wrap whole-judge" id="completeJudge">
                            <textarea class="fi_textarea" limit="10,1000" leftlimitnum="10" rightlimitnum="1000" value="" data=""></textarea>
                            <span class="fi_word hide">可输入10到1000字</span>
                            <p class="fi_t_cont">请填写您在出游过程中的感受</p>
                        </div>
                    </dd>
                    <span id="please" style="display: none;color: red">&nbsp;&nbsp;请输入10到1000字</span>
                    <dl class="clearfix uploadImg upload-img">
                        <dt></dt>
                        <dd class="pic_frame" style="height: 100px;">
                            <div class="pic_lists">
                                <ul class="clearfix thumbnails" id="thumbnails"></ul>
                                <div class="" style="position:absolute;top:0;right:5px;">
                                    <span class="" id="placeholder"></span>
                                </div>
                            </div>
                            <div id="uploadify"></div>

                            <input type="file" id="file_upload" onclick="abc()" name="file_upload" multiple="true" />
                            <!-- <button id="file_upload"></button> -->
                            <input type="hidden" name="addimg" id="addimg" value="">

                        </dd>
                    </dl>
                </div>
            </dl>
            <!--综合评价 end -->
        </div>
        <!-- 资源评价 start -->
        <!-- 资源评价 end -->
        <!-- 发表点评 -->
        <div class="sub_all_infor">
            <dl class="clearfix">
                <dd>
                    <button type="button" class="sub_ai_btn f_yh" id="do_commit">发表点评</button>
                </dd>
                <dt>
                    <span class="is_no_name">
                        <img src="/style/home/member_public/Cii_LllEoICICqoZAAACBzSCBQ8AAAghgP__eEAAAIf058.png" id="noname" data="0" title="匿名">
                        <label style="bottom: 5px; position: relative;" for="noname">匿名点评</label>
                    </span>
                </dt>
            </dl>
        </div>
    </div>   
    <script>
        <?php 
            $session_name = session_name();
            if(isset($_POST[$session_name])) {
                session_id($_POST[$session_name]);
                session_start();
            }
        ?>

        // 文件上传
        $(function() { 

            $('#file_upload').uploadify({
                'swf'      : "{{asset('/uploadify/uploadify.swf')}}",
                'buttonText':'图片上传',
                
                'fileObjName':'file',
                 'formData'     : {
                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
                    '_token':'{{csrf_token()}}',
                },
                'uploader' : "{{url('/home/ajax_upload')}}",//定义自己的上传文件的方法
                'onUploadSuccess' : function(file, data, response) {
                    img="<img src='"+data+"' width='120px' height='80px' />";
                    $('#uploadify').html(img);
                    $('#addimg').val(data);
                }//上传成功之后执行的函数  其中 data表示php返回的数据
            });
        });



        // console.log(text);
       
        // alert($('#div').html());
        $(function(){
            var ss = "{{session('userid')}}";
            if(ss == ''){
                location.href = '/login';
            }
        });

        $('#do_commit').click(function(){
            //出游类型 必填项
            var travelType = $("#travelType .travelTypeAdd").attr("value");
            if (!travelType) {
                $("#evaluation_box .error_map").show();
                $("html,body").animate({scrollTop: 0}, 120);
                return;
            } else {
                $("#evaluation_box .error_map").hide();
            }
            var textarea = $('.travel_feel textarea').val();
            if(!textarea){
               $('.travel_feel p').css('color','red');
               return; 
            }
            if(textarea.length<10 || textarea.length>1000){
                $('#please').show();
                return;
            }

            
            var datas = {
                'uid':"{{session('userid')}}",
                'gid':$('#gid').attr('title'),
                'oid':$('#oid').attr('data'),
                'pid':$("#travelType .travelTypeAdd").attr("value"),
                'content': $('.travel_feel textarea').val(),
                'colligate_grade':$('#colligate').attr('data'),
                'discount_grade':$('#discount').attr('data'),
                'service_grade':$('#service').attr('data'),
                'experience_grade':$('#experience').attr('data'),
                'status':0,
                'anonymous': $('#noname').attr('data'),
                'img':$('#addimg').val(),
            };
            
            datas = JSON.stringify(datas); 
            
            $.post('/home/comment',{'data':datas,'_token':"{{ csrf_token() }}"},function(res){
                console.log(res);
                if(res == 1){
                    //提交成功弹出层
                    $("#SuccessJump").show();
                    $(".divmask").show();
                }else{
                    $("#ErrorJump").show();
                    $(".divmask").show();
                }
            })


            
        })
        // 点击出游类型
        $(".travel_type").find("span").click(function () {
            var obj = $(this);
            obj.addClass("travelTypeAdd").siblings().removeClass("travelTypeAdd");
            $("#evaluation_box .error_map").hide();
        })
        // 点击文本域
        $('.travel_feel textarea').click(function () {
            $('.travel_feel p').css('color','');
            $('#please').hide();
        })
        // 点击匿名
        $('#noname').toggle(function(){
            $(this).attr('src','/style/home/member_public/kongkong.png');
            $(this).attr('data','1');
            $(this).attr('title','真实名字');

        },function(){
            $(this).attr('src','/style/home/member_public/Cii_LllEoICICqoZAAACBzSCBQ8AAAghgP__eEAAAIf058.png');
            $(this).attr('data','0');
            $(this).attr('title','匿名');
        })



        $(function() {
            var isPosting = false;
            $('#travelType').on('click', '.travelType-type-icon',
            function() {
                $("#travelType span.error_map").hide();
            });
            $('#travelType').find('span.star').click(function() {
                var gradetemplates_mark = true;
                $(".gradetemplates").each(function() {
                    if ($(this).find("span:first").hasClass('grey_s')) {
                        gradetemplates_mark = false;
                    }
                });
                if (!$(".synthesis span:first").hasClass('grey_s') && gradetemplates_mark) {
                    $(".fi_score").find(".error_map").hide();
                }
            });


            function hidepopBox() {
                //隐藏成功弹出层
                $("#SuccessJump").hide();
                $(".divmask").hide();
                window.location.href = "/home/comment";
            }
            //关闭点评成功提示弹窗
            $("#btn_hidepopBox").on('click',
            function(event) {
                event.preventDefault();
                hidepopBox();
            });
            var addPdone = true;
            function fileUpLoad() {
                $('.comment_img').fileupload({
                    dataType: 'json',
                    type: 'POST',
                    add: function(e, data) {
                        var o = $(this);
                        thumbnails = o.parents('.upload_box').siblings('.pic_lists').find('.thumbnails');
                        li = thumbnails.find('li');
                        if (li.length == 8) {
                            o.parents(".photoUpload_box").addClass("none");
                        };
                        if (li >= 9) {
                            layer.msg('最多支持9张图片', 3, 6);
                            return false;
                        };
                        var head = data.files[0].name;
                        var allImgExt = ".jpg|.jpeg|.png|"; //全部图片格式类型
                        var imgExt = head.substr(head.lastIndexOf(".")).toLowerCase();
                        if (allImgExt.indexOf(imgExt + "|") != -1) {
                            if (data.autoUpload || (data.autoUpload !== false && $(this).fileupload('option', 'autoUpload'))) {
                                data.process().done(function() {
                                    data.submit();
                                });
                            }
                        } else {
                            layer.msg('暂不支持此图片格式', 3, 2);
                        }
                    },
                    done: function(e, data) {
                        var o = $(this);
                        function addPictureBtn() {
                            o.parents('.upload_box').find('span').addClass('none');
                            o.parents('.upload_box').find('em').addClass('none');
                            o.parents('.photoUpload_box').addClass('changePion');
                        };
                        thumbnails = o.parents('.upload_box').siblings('.pic_lists').find('.thumbnails');
                        li = thumbnails.find('li');
                        if (li.length == 8) {
                            o.parents(".photoUpload_box").addClass("none");
                        };
                        if (addPdone) {
                            addPictureBtn();
                        };
                        var serverData = data.result;
                        if (li.length >= 9) {
                            layer.msg('最多支持9张图片', 3, 6);
                            return false;
                        }
                        if (serverData.success) {
                            var image_url = serverData.data.image_url;
                            var url = serverData.data['image_url'];
                            var length = url.length;
                            var match = url.match(/\.[^\.]+$/g);
                            var postfix = match[0];
                            var prefix = url.substr(0, length - postfix.length);
                            var li = '<li><img sub_src="' + url + '" src="' + prefix + '_w60_h60_c1_t0' + postfix + '" width="64" height="53" /><span class="close hide"></span></li>';
                            o.parents('.upload_box').siblings('.pic_lists').find('.thumbnails').prepend(li);
                        } else {
                            layer.msg('上传失败', 3, 2);
                        }
                        user_center_lxl.picListsHover();
                    }
                });
            }
            // fileUpLoad();
        });
    </script>
<!-- </div> -->
@endsection