@extends('home.public.index')
    
@section('main')
    <script charset="utf-8" src="/style/home/search/v.js"></script><script src="/style/home/search/hm.js"></script><script type="text/javascript" src="/style/home/search/config"></script>
    <script src="/style/home/js/jquery-1.8.3.min.js"></script>
    <link href="/style/home/search/TN_date.css" rel="stylesheet">
      <link rel="icon" href="/style/home/index/favicon.ico" type="image/x-icon" />
    <link href="/style/home/search/classificationpage.css" rel="stylesheet">
<link href="/style/home/search/searchlist.css" rel="stylesheet">
<link href="/style/home/search/common_foot_v3.css" rel="stylesheet">
    <meta name="applicable-device" content="pc"> 
    

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>欧洲旅游线路搜索_酒店搜索_门票搜索_旅游搜索_途牛旅游网</title>
<!-- <meta content="欧洲旅游线路搜索,酒店搜索,门票搜索" name="keywords">
<meta content="途牛旅游网搜索频道为您提供途牛旅游网欧洲跟团游线路搜索，自由行线路搜索、酒店搜索、门票搜索、邮轮搜索功能。要旅游，找途牛！Tuniu.com." name="description"> -->


<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="base64" src="/style/home/search/base64.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="jquery.autocomplete" src="/style/home/search/jquery.autocomplete.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="underscore" src="/style/home/search/underscore.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="ui_lib/layer" src="/style/home/search/layer.min.js"></script><link type="text/css" rel="stylesheet" href="/style/home/search/layer.css" id="http:ssl1tuniucdncomf20141229ui-liblayerskinlayercss"></head>
<body class="index1200">







    


<style type="text/css">    .index_top_nav .item_duobao .dropdown_panel { width: 100%; left: -1px; text-align: center; }</style>

<script type="text/javascript"> 

    var d = new Date(); 

    var elk = 'WEB-CATALOG-SEARCH';

</script>

 











<script src="/style/home/search/fps.min.js"></script>

    、

    
    

<div class="contentcontainer clearfix">
    
        
            <div class="content_top">
                <div class="crumbs">
                    
                    <p>
                        <a href="http://www.tuniu.com/">首页</a>
                        <i>&gt;</i>
                        <a href="/home/search/{{$keyword}}-1">{{$keyword}}</a>
                        <i>&gt;</i>
                        <span>所有产品</span>
                    </p>
                </div>
                
                        
                
                
                    
                    

                    

<div class="cate_nav mb_10">
    <div class="cate_nav">
        <div class="prop_list prop-list-new clearfix">
			<!-- 判断是否有选择范围 -->
			@if($hadselected)
        	<div class="clearfix prop_item chooseitem" id="hadSelected">
                <dl class="clearfix poi_selecters">
                    <dt><span class="list_gaiban_icon x_select"></span>您已选择</dt>
                    <dd>
                        <ul class="had_select">
                            @foreach($hadselected as $hadselected_k => $hadselected_v)
                            <input class="none s_checked" type="checkbox" name="related_destination_id" value="{{$hadselected_v[1]}}" checked="checked">
                            <li name="related_destination_id">
                                <span class="select_log">{{$hadselected_v[2]}}</span>
                                <a href="javascript:void(0)" rel="nofollow">
                                    {{$hadselected_v[0]}}
                                    <span class="deltab" data-href="/home/deleteOneKeyword/{{$hadselected_k}}-{{$keyword}}"></span>
                                </a>
                            </li>
							@endforeach
                            <li>
                                <a class="close-all J_clear_class_all" href="javascript:void(0)" rel="nofollow">清除</a>
                            </li>
                        </ul>
                    </dd>
                </dl>
            </div> 
			@endif
            <!-- 搜索分类 -->
            @foreach($search_cates as $search_cates_v)
                <div class="clearfix prop_item needed_filter mult_select isOneLine hasMoreChoice" data-id="{{$search_cates_v->id}}">
                    <dl class="clearfix poi_day_selecter xc_days">
                        <dt><span class="list_gaiban_icon {{$search_cates_v->icon or ''}}"></span>{{$search_cates_v->name}}</dt>
                        <dd class="onlyOneLine"	>
                            <ul class="list_3 duration_select ">
                                <li class="hide">
                                    <a class="input_hide cur_city" href="javascript:void(0);" rel="nofollow">全部</a>
                                </li>
                                @foreach($search_cates_v->child as $cates_child_k => $cates_child_v)
                                @if($search_cates_v->name == '出游时间')
                                <li class="filter_input ">
                                    <input type="checkbox" value="{{$cates_child_v}}" name="">
                                    <a href="/home/search/{{$keyword}}-2?name={{$cates_child_v}}&pid={{$search_cates_v->id}}&pname={{$search_cates_v->name}}" rel="nofollow">{{$cates_child_v}}</a>
                                </li>
                                @else
                                <li class="filter_input ">
                                    <input type="checkbox" value="{{$cates_child_v->name}}" name="">
                                    
                                    <a href="/home/search/{{$keyword}}-2?name={{$cates_child_v->name}}&pid={{$search_cates_v->id}}&pname={{$search_cates_v->name}}" rel="nofollow">{{$cates_child_v->name}}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </dd>
                    </dl>
                    <div class="multioption">
                        <a href="javascript:void(0)" rel="nofollow" class="multipleselect">多选</a>
                        <a href="javascript:void(0)" rel="nofollow" class="moreselector" m="点击_筛选项_更多_相关目的地">更多</a>
                    </div>
                    <p class="confAndCancel">
                        <input type="button" value="确定" class="confirm mulAndMore">
                        <a href="javascript:void(0)" class="cancel mulAndMore" defaultchecked="">取消</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>


    
    <div class="showallbtn" style="display: block;">
        <a href="javascript:void(0);" class="all">收起<i></i></a>
        <input type="hidden" id="moreFilterTip" value="显示更多筛选项(产品钻级，成团地点......)">
    </div>





</div>

<script>
// 默认隐藏从第6个后面所有
    $('.prop_item').slice(5).addClass('hide');
// 默认为显示更多按钮
    $('.showallbtn').find('a').html($('#moreFilterTip').val()+'<i></i>').removeClass('all');

    $('.showallbtn').toggle(function(){
        // 显示
        $('.prop_item').slice(5).removeClass('hide');
        $('.showallbtn').find('a').html('收起<i></i>').addClass('all');
    },function(){
        // 隐藏
         $('.prop_item').slice(5).addClass('hide');
         $('.showallbtn').find('a').html($('#moreFilterTip').val()+'<i></i>').removeClass('all');
    });

    // 查看全部
    $('.moreselector').toggle(function(){
    	$(this).parents('.prop_item').find('dd').removeClass('onlyOneLine');
    	$(this).addClass('moreselector-o');
    	$(this).parents('.prop_item').find('dd').attr('style','height:96px;overflow-y:auto;');
    },function(){
    	$(this).parents('.prop_item').find('dd').addClass('onlyOneLine');
    	$(this).removeClass('moreselector-o');
    	$(this).parents('.prop_item').find('dd').removeAttr('style');
    });

    // 删除全部条件
    $('.J_clear_class_all').click(function(){
    	location.href = "/home/deleteKeyword/{{$keyword}}";
    });

    // 删除一个条件
    $('.deltab').click(function(){
    	var href = $(this).attr('data-href');
    	location.href = href;
    });


    	// $('<li><input class="none s_checked" type="checkbox" name="keyword" value="'+keyword+'" checked="checked"><span class="select_log">'+title+'</span>'+keyword+'</li>').insertBefore($('#hadSelected .had_select li:last-child'));



    	// console.log($('#hadSelected').html());
    	// // 将选择的范围添加进去
    	// $('.prop_list').prepend($('#hadSelected').html());

    	// // 删除当前选中行
    	// $(this).parents('.prop_item').remove();


</script>



                    
<input type="hidden" id="sort_type" name="sort_type" value="0">
    <div class="filter">
        <div class="sorting">
            <ul class="sorting_btns">
                
                <li class="cur">
                    <a class="sort_option crt" href="javascript:void(0)" title="按综合排序" rel="nofollow">
                        <input type="hidden" name="sort_option" value="0"><span class="default">综合</span>
                    </a>
                </li>
                <li class="">
                    <a class="sort_option " href="javascript:void(0)" title="按30天销量排序" rel="nofollow">
                        <input type="hidden" name="sort_option" value="1"><span class="default">销量</span>
                    </a>
                </li>
                <li class="">
                    <a class="sort_option " href="javascript:void(0)" title="按满意度从大到小排序" rel="nofollow">
                        <input type="hidden" name="sort_option" value="2"><span>满意度</span>
                    </a>
                </li>
                <li class="">
                    
                    <a class="dbsort sort_option" href="javascript:void(0)" title="按价格排序" rel="nofollow">
                        <input type="hidden" name="sort_option" value="0"><span>价格</span>
                    </a>
                </li>
            </ul>
            <div class="rank_priceform" style="width: 348px;">
                <div class="fm_price">
                    <p class="mr3">价格区间</p>
                    
                    <p>
                        <input id="first_price" type="text" value="">
                        <span> - </span>
                        <input id="second_price" type="text" value="">
                    </p>
                    <div class="btns">
                        <span class="reset clearprice">清空价格</span>
                        <span class="btn">
                            <button id="confirm_btn" type="submit">确定</button>
                        </span>
                    </div>
                </div>
                
                <div class="priceTips" style="display:none;">
                    <p>点击绿色区域可以查看其他游客的<span class="special">价位范围</span>哦</p>
                    <span class="triangle"></span>
                </div>
                <div class="barGraph">
                    
                       <span lowprice="0" highprice="3660" ratio="3" m="点击_价格区间_欧洲_1_0~3660" style="height: 4.71px;"></span>
                    
                       <span lowprice="3661" highprice="7320" ratio="32" m="点击_价格区间_欧洲_2_3661~7320" style="height: 21.24px;"></span>
                    
                       <span lowprice="7321" highprice="10980" ratio="21" m="点击_价格区间_欧洲_3_7321~10980" style="height: 14.97px;"></span>
                    
                       <span lowprice="10981" highprice="14640" ratio="18" m="点击_价格区间_欧洲_4_10981~14640" style="height: 13.26px;"></span>
                    
                       <span lowprice="14641" highprice="-1" ratio="26" m="点击_价格区间_欧洲_5_14641~-1" style="height: 17.82px;"></span>
                    
                </div>
                
            </div>
            
            
            
            <div class="specil_filter long-filter">
                <p>
                    
                    <input type="checkbox" id="recommendIcon" filtertype="brand" value="2" class="J_check_brand">
                    <label class="service_icon nrzx-icon hover_tip" for="recommendIcon" tt="nrzx">牛人专线</label>
                    
                    <input type="checkbox" id="recommendIconNew" filtertype="brand" value="23" class="J_check_brand">
                    <label class="service_icon ggqzy-icon hover_tip" for="recommendIconNew" tt="ggqzy">瓜果亲子游</label>
                    
                    <input type="checkbox" id="recommendIconPP" filtertype="brand" value="29" class="J_check_brand">
                    <label class="service_icon pengpai-icon hover_tip" for="recommendIconPP" tt="ppdzy">朋派定制游</label>
                    
                    <input type="checkbox" id="recommendIconCF" filtertype="brand" value="40" class="J_check_brand">
                    <label class="service_icon chuwo-icon hover_tip" for="recommendIconCF" tt="cfbwm">出发吧我们</label>
                    
                    <input type="checkbox" id="recommendIconYLZS" filtertype="brand" value="39" class="J_check_brand">
                    <label class="service_icon lushang-icon hover_tip" for="recommendIconYLZS" tt="ylzs">一路之上</label>
                    
                </p>
            </div>
            
        </div>
    </div>


                    
                
            </div>
                
                    <div class="content_bottom">
                        <div class="main fl">                     
<div class="thelist"> 
        <ul class="thebox clearfix">   
            @foreach($goods as $goods_v)         
                        <li>
                            <div class="theinfo">
                                <a class="clearfix" m="点击_产品列表_欧洲_1_210166734" href="/home/goodsinfo/{{$goods_v->id}}" target="_blank" rel="nofollow">
                                    <div class="imgbox">
                                        <div class="img">                         
                                                        <span class="icon-box">
                                                            <span class="icon gty-icon-new">跟团</span>
                                                        </span>                     
                                            <img src="{{$goods_v->pic}}" style="display: block;">  
                                        </div>
                                    </div>
                                    <dl class="detail">
                                        <dt>
                                            <p class="title">
                                                <span class="main-tit" name="">
                                                    <span class="f_0053aa">
                                                    {{$goods_v->title}}
                                                </span>
                                            </p>
                                            <p class="label">        
                                                    <span class="mytip hover_tip" num="14" productid="210166734" producttype="1" tt="aj">立减优惠</span>   
                                                    <span class="mytip hover_tip" tipid="sf" productid="210166734" producttype="1" tt="sfcf">首付出发</span>
                                                    <span class="mytip-grey">湖光山色</span><span class="mytip-grey">可异地按指纹</span><span class="mytip-grey">有自由活动</span>
                                            </p>
                                            @if(!empty($goods_v->city))
                                            <p class="subtitle">     
                                                    <span>{{$goods_v->city}}出发</span>   
                                                <span>|&nbsp;{{$goods_v->city}}成团</span> 
                                               <!--  <span class="sub-tuijian">|&nbsp;卢浮宫入内 新天鹅堡 罗马 佛罗伦萨 威尼斯 五渔村 自营</span>    --> 
                                            </p>
                                            @endif
                                        </dt>
                                            <dd class="overview" title="{{join(',',$goods_v->place)}}">
                                                <label>包含景点：</label>
                                                <span>{{count($goods_v->place)}}个景点，</span>
                                                <span class="overview-scenery">{{join(',',$goods_v->place)}}</span>
                                            </dd>
                                        <dd class="tqs">
                                        		@if(!empty($goods_v->receptionist))
                                                <span class="brand"><label>供应商：</label><span>{{$goods_v->receptionist}}</span></span>
                                                @endif
                                                
                                                <span class="time"><label>团期：</label><span>
                                                @if(!empty($goods_v->tuanqi))
                                                {{join(',',$goods_v->tuanqi)}}
                                                @else
                                                无
                                                @endif
                                                </span></span>
                                                
                                                <span class="more"><label>更多</label><span class="inlineblock"></span></span>
                                        </dd>
                                    </dl>
                                    <div class="priceinfo">
                                        <div class="tnPrice">                                   
                                            <i>¥</i>                                          
                                            <em>{{$goods_v->price}}</em>起                                           
                                        </div>
                                        <div class="comment-sat clearfix">                                             
                                                <div class="comment-satNum">
                                                    满意度<span><i>{{$goods_v->manyi}}</i>%</span>
                                                </div>
                                               
                                                <div class="trav-person">
                                                    
                                                    <p class="person-num"><i>{{$goods_v->play_num}}</i>人已出游</p>
                                                    @if($goods_v->dianping > 0)
                                                    <p class="person-comment"><i>{{$goods_v->dianping}}人</i>点评</p>  
													@endif
                                                </div>                                          
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
            @endforeach
        </ul>
</div>


                                
                                    <div class="pagination">
                                        <div class="page-bottom">
                                            

    <span class="page-start"><b class="icon"></b>上一页</span>



    
        
            <a rel="nofollow" class="page-cur"> 1</a>
        
            <a rel="nofollow" href=""> 2</a>
        
            <a rel="nofollow" href=""> 3</a>
        
            <a rel="nofollow" href=""> 4</a>
        
            <a rel="nofollow" href=""> 5</a>
        
            <a rel="nofollow" href=""> 6</a>
        
        
            <span class="page-break">...</span>
        
        <a rel="nofollow" href=""> 213</a>
    



<a rel="nofollow" class="page-next" href="">下一页<b class="icon"></b></a>


                                        </div>
                                    </div>
                                

                            

                            
                            
                                <div id="bottomList">

    
        
        <div class="galleryblock visa" id="9">
            <div class="top clearfix">
                <div class="productname fl">欧洲热门签证</div>
                
                    <div class="moredetail fr">
                        <a href="http://www.tuniu.com/visa/country_602_0" target="_blank" m="点击_底部推荐_签证_欧洲_更多">更多签证&nbsp;&gt;</a>
                    </div>
                
            </div>

            
                
                <!-- 多于3个展示横向列表-->
                <div class="gallery-lists clearfix">
                    <ul class="gallery-list clearfix current">
                        
                        
                        <li class="gallery-list-item fl first">
                            <a target="_blank" href="http://www.tuniu.com/visa/visa_210082259" m="点击_底部推荐_签证_欧洲_1_210082259">
                                <div class="imgblock">
                                    <img title="【广州送签】&lt;英国个人旅游签证&gt;  赠送陪签服务，拒签退机票" src="/style/home/search/Cii-T1fjT8CIdbY7AATxutARAoUAACqowIk7aQABPHS055_w180_h100_c1_t0.jpg" style="display: inline;">
                                    

                                    <div class="dess_bg"></div>
                                    
                                    <div class="dess">【广州送签】&lt;英国个人旅游签证&gt;  赠送陪签服务，...</div>
                                </div>

                                <div class="exter_mess">
                                    <div class="box p1 clearfix">
                                        
                                            <div class="satisfactionrate fl">
                                                <span class="text">满意度</span>
                                                
                                                <span class="rate">90%</span>
                                            </div>
                                        
                                        <div class="satisfactionrate fr">
                                                
                                                <span class="rated">
                                                    
                                                        <i>26</i>条评价
                                                    
                                                </span>
                                            
                                        </div>
                                    </div>
                                    <div class="box clearfix">
                                        
                                        <div class="price fr">
                                            <span class="unit">¥</span><span class="num">1019</span><span class="text">起</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        
                        <li class="gallery-list-item fl ">
                            <a target="_blank" href="http://www.tuniu.com/visa/visa_210081669" m="点击_底部推荐_签证_欧洲_2_210081669">
                                <div class="imgblock">
                                    <img title="【广州送签】&lt;西班牙个人旅游签证&gt; 赠送陪签服务，拒签退机票" src="/style/home/search/Cii-TFfjaX-IVnzTAAhagdQahTgAACq5QHrh7QACFqZ418_w180_h100_c1_t0.jpg" style="display: inline;">
                                    

                                    <div class="dess_bg"></div>
                                    
                                    <div class="dess">【广州送签】&lt;西班牙个人旅游签证&gt; 赠送陪签服务，...</div>
                                </div>

                                <div class="exter_mess">
                                    <div class="box p1 clearfix">
                                        
                                            <div class="satisfactionrate fl">
                                                <span class="text">满意度</span>
                                                
                                                <span class="rate">100%</span>
                                            </div>
                                        
                                        <div class="satisfactionrate fr">
                                                
                                                <span class="rated">
                                                    
                                                        <i>7</i>条评价
                                                    
                                                </span>
                                            
                                        </div>
                                    </div>
                                    <div class="box clearfix">
                                        
                                        <div class="price fr">
                                            <span class="unit">¥</span><span class="num">809</span><span class="text">起</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        
                        <li class="gallery-list-item fl ">
                            <a target="_blank" href="http://www.tuniu.com/visa/visa_210081735" m="点击_底部推荐_签证_欧洲_3_210081735">
                                <div class="imgblock">
                                    <img title="【广州送签】&lt;奥地利个人旅游签证&gt; 赠送陪签服务" src="/style/home/search/Cii-TFfH0gyIUgiQAAYZlaZFC-UAAB8HAPFDGIABhmt409_w180_h100_c1_t0.jpg" style="display: inline;">
                                    

                                    <div class="dess_bg"></div>
                                    
                                    <div class="dess">【广州送签】&lt;奥地利个人旅游签证&gt; 赠送陪签服务</div>
                                </div>

                                <div class="exter_mess">
                                    <div class="box p1 clearfix">
                                        
                                            <div class="satisfactionrate fl">
                                                <span class="text">满意度</span>
                                                
                                                <span class="rate">71%</span>
                                            </div>
                                        
                                        <div class="satisfactionrate fr">
                                                
                                                <span class="rated">
                                                    
                                                        <i>3</i>条评价
                                                    
                                                </span>
                                            
                                        </div>
                                    </div>
                                    <div class="box clearfix">
                                        
                                        <div class="price fr">
                                            <span class="unit">¥</span><span class="num">859</span><span class="text">起</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        
                        <li class="gallery-list-item fl ">
                            <a target="_blank" href="http://www.tuniu.com/visa/visa_210081641" m="点击_底部推荐_签证_欧洲_4_210081641">
                                <div class="imgblock">
                                    <img title="【广州送签】&lt;德国商务签证&gt; 赠送陪签服务" src="/style/home/search/Cii-T1fjUyeIP-6vAAThhv5tobUAACqrQMTFSUABOGe950_w180_h100_c1_t0.jpg" style="display: inline;">
                                    

                                    <div class="dess_bg"></div>
                                    
                                    <div class="dess">【广州送签】&lt;德国商务签证&gt; 赠送陪签服务</div>
                                </div>

                                <div class="exter_mess">
                                    <div class="box p1 clearfix">
                                        
                                            <div class="satisfactionrate fl">
                                                <span class="text">满意度</span>
                                                
                                                <span class="rate">100%</span>
                                            </div>
                                        
                                        <div class="satisfactionrate fr">
                                                
                                                <span class="rated">
                                                    
                                                        <i>8</i>条评价
                                                    
                                                </span>
                                            
                                        </div>
                                    </div>
                                    <div class="box clearfix">
                                        
                                        <div class="price fr">
                                            <span class="unit">¥</span><span class="num">859</span><span class="text">起</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                        
                        <li class="gallery-list-item fl ">
                            <a target="_blank" href="http://www.tuniu.com/visa/visa_210081639" m="点击_底部推荐_签证_欧洲_5_210081639">
                                <div class="imgblock">
                                    <img title="【广州送签】&lt;意大利个人旅游签证&gt; 赠送陪签服务，拒签退机票" src="/style/home/search/Cii-TlfjUTyIKsAPAAXBKxZX6a8AACqpwMhCg0ABcFD679_w180_h100_c1_t0.jpg" style="display: inline;">
                                    

                                    <div class="dess_bg"></div>
                                    
                                    <div class="dess">【广州送签】&lt;意大利个人旅游签证&gt; 赠送陪签服务，...</div>
                                </div>

                                <div class="exter_mess">
                                    <div class="box p1 clearfix">
                                        
                                            <div class="satisfactionrate fl">
                                                <span class="text">满意度</span>
                                                
                                                <span class="rate">82%</span>
                                            </div>
                                        
                                        <div class="satisfactionrate fr">
                                                
                                                <span class="rated">
                                                    
                                                        <i>12</i>条评价
                                                    
                                                </span>
                                            
                                        </div>
                                    </div>
                                    <div class="box clearfix">
                                        
                                        <div class="price fr">
                                            <span class="unit">¥</span><span class="num">859</span><span class="text">起</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <!--少于等于3个，展示纵向小列表-->
                
            

        </div>
    


</div>
                            
                        </div>

                        
                            <div id="sideWrap" class="side-wrap fr">
	<input type="hidden" id="ga" value="欧洲">
	<!-- 列表页右侧区块 start -->
	
		<div class="list sideblock">
			<div class="carouselblock">
				<div class="carouselheader">
					清仓特卖
				</div>
				<div class="carousel">
					<ul class="temai">
						
							<li>
								<div class="tm_prod">
									
										<a href="http://temai.tuniu.com/tours/212100529" class="tm_img" target="_blank" m="点击_右侧推荐_清仓特卖_欧洲_1_212100529">
											<img src="/style/home/search/Cii-s1vQEbSIU_2cAAN18IdmxYYAAPkAAMhIJAAA3YI578_w300_h200_c1_t0.jpg" width="160" height="90">
										</a>
										
										
									<p class="prod_lab spe_icon_wei">
										<span>
											尾货
										</span>
									</p>
									<p class="time_bg">
									</p>
									
									
									<p end-data="2019-01-18 09:47:38" start-data="2016-10-31 00:00:00" id="timeDes" class="time_des">
										<span class="spaceToEnd">距结束</span>:<span class="tnIndexDay">28</span>天<span class="tnIndexH">0</span>时<span class="tnIndexM">53</span>分<span class="tnIndexS">38</span>秒

									</p>
								</div>
								<dl class="tm_line">
									<dt class="">
										<a href="http://temai.tuniu.com/tours/212100529" class="" target="_blank">
											&lt;欧陆大全景-荷比奥德法瑞意12日&gt;广州往返，欧洲自营，20到30人小团，卢浮宫，塞纳水上餐厅，新天鹅堡，荷兰羊角村，加尔达湖，巴黎自由活动
										</a>
									</dt>
									<dd class="tm_price">
										<p>
											<span class="tn_price">
												
													¥<em>6699</em>起
											</span>
											
											
											<span class="tm_zk">7折</span>
										</p>
									</dd>
								</dl>
							</li>
						
							<li>
								<div class="tm_prod">
									
										<a href="http://temai.tuniu.com/tours/212100605" class="tm_img" target="_blank" m="点击_右侧推荐_清仓特卖_欧洲_2_212100605">
											<img src="/style/home/search/Cii-tFvO1gWILUsbAAIZ8EgWb3cAAPhJQPG1hUAAhoI786_w300_h200_c1_t0.jpg" width="160" height="90">
										</a>
										
										
									<p class="prod_lab spe_icon_wei">
										<span>
											尾货
										</span>
									</p>
									<p class="time_bg">
									</p>
									
									
									<p end-data="2019-01-18 09:50:38" start-data="2016-10-31 00:00:00" id="timeDes1" class="time_des">
										<span class="spaceToEnd">距结束</span>:<span class="tnIndexDay">28</span>天<span class="tnIndexH">0</span>时<span class="tnIndexM">56</span>分<span class="tnIndexS">38</span>秒

									</p>
								</div>
								<dl class="tm_line">
									<dt class="">
										<a href="http://temai.tuniu.com/tours/212100605" class="" target="_blank">
											&lt;法国+瑞士+意大利10-12日瑞士深度游&gt;一价全含，欧洲自营，瑞士五城，冰川3000玩雪，西庸城堡，黄金列车，凡尔赛，米其林法餐，WiFi
										</a>
									</dt>
									<dd class="tm_price">
										<p>
											<span class="tn_price">
												
													¥<em>12999</em>起
											</span>
											
											
											<span class="tm_zk">7.8折</span>
										</p>
									</dd>
								</dl>
							</li>
						
							<li>
								<div class="tm_prod">
									
										<a href="http://temai.tuniu.com/tours/212141133" class="tm_img" target="_blank" m="点击_右侧推荐_清仓特卖_欧洲_3_212141133">
											<img src="/style/home/search/Cii-T1jl8i6IXn16AAVXboo2JwsAAJCRwJveEAABVeG317_w300_h200_c1_t0.jpg" width="160" height="90">
										</a>
										
										
									<p class="prod_lab spe_icon_miao">
										<span>
											秒杀
										</span>
									</p>
									<p class="time_bg">
									</p>
									
									
									<p end-data="2018-12-29 23:59:59" start-data="2018-12-24 00:00:00" id="timeDes2" class="time_des">
										<span class="spaceToEnd">距开始</span>:<span class="tnIndexDay">2</span>天<span class="tnIndexH">15</span>时<span class="tnIndexM">6</span>分<span class="tnIndexS">38</span>秒

									</p>
								</div>
								<dl class="tm_line">
									<dt class="">
										<a href="http://temai.tuniu.com/tours/212141133" class="" target="_blank">
											俄罗斯莫斯科+圣彼得堡8日游
										</a>
									</dt>
									<dd class="tm_price">
										<p>
											<span class="tn_price">
												
													¥<em>3499</em>起
											</span>
											
											
											<span class="tm_zk">8.7折</span>
										</p>
									</dd>
								</dl>
							</li>
						
					</ul>
				</div>
			</div>
		</div>
	
	<!-- 列表页右侧区块 end -->
	<!-- 牛人定制 start-->
	<div class="dingzhi sideblock">
		<a target="_blank" href="http://www.tuniu.com/bang/" rel="nofollow" title="牛人定制" m="点击_右侧推荐_牛人定制_欧洲_1_牛人定制" class="nr-ding">
			<img src="/style/home/search/Cii-slomaN2IEj4OAAARz8oIlJwAAAcXwP-sokAABHn133.png" alt="牛人定制">
		</a>
	</div>
	<!-- 牛人定制 end-->
	
		<div class="quanqiugou sideblock" style="padding-top: 0;">
	        <a target="_blank" href="http://mkk.tuniu.com/qqg/shopping" rel="nofollow" title="全球购" m="点击_右侧推荐_全球购_欧洲_1_全球购">
	            <img src="/style/home/search/Cii-T1jKPg-IejFYAABFiYHjEGkAAIlnQFdlKsAAEWh953.png" alt="全球购" width="100%">
	        </a>
	    </div>
    

	
	
		<!-- 出行 start--> 
	    
	    <!-- 出行 end--> 
        <!-- 天气 start--> 
        
	    <div class="side-weather sideblock"> 
	        <div class="carouselblock">
	            <div class="carouselheader clearfix"> 
					<p class="tit" title="欧洲">
						欧洲攻略</p>
	                
	                    <dl class="weather"> 
	                        <dt>
	                            <span class="weather-date">今天</span> 
	                            <i class="weather-icon icon-thundershower"></i> 
	                            <span class="weather-text">14/8℃</span> 
	                            <i class="arrow"></i> 
	                        </dt> 
	                        
	                        <dd>
	                        
	                            
	                        
	                            
	                            <div class="list"> 
	                                <span class="weather-date">明天</span> 
	                                <i class="weather-icon icon-overcast"></i> 
	                                <span class="weather-text">13/7℃</span> 
	                            </div> 
	                            
	                        
	                            
	                            <div class="list"> 
	                                <span class="weather-date">后天</span> 
	                                <i class="weather-icon icon-shower"></i> 
	                                <span class="weather-text">11/4℃</span> 
	                            </div> 
	                            
	                        
	                        </dd> 
	                        
	                    </dl>
	                 
	            </div>
	            <div class="carousel">
	                 
	                    <div class="dess">
	                        <p> 欧洲是人类生活水平较高、环境以及人类发展指数较高及适宜居住的大洲之一...</p> 
	                    </div>
	                
	                 
	                    <div class="tip">
	                         
	                            <a href="http://www.tuniu.com/g3600/guide-0-0/" target="_blank" m="点击_右侧推荐_攻略_欧洲_1_攻略">攻略</a>
	                         
	                            <a href="http://www.tuniu.com/guide/d-ouzhou-3600/jianjie/" target="_blank" m="点击_右侧推荐_攻略_欧洲_2_指南">指南</a>
	                         
	                            <a href="http://www.tuniu.com/guide/d-ouzhou-3600/jingdian/" target="_blank" m="点击_右侧推荐_攻略_欧洲_3_目的地">目的地</a>
	                         
	                            <a href="http://www.tuniu.com/g3600/hotel/" target="_blank" m="点击_右侧推荐_攻略_欧洲_4_酒店">酒店</a>
	                         
	                            <a href="http://www.tuniu.com/g3600/restaurant-0-0/" target="_blank" m="点击_右侧推荐_攻略_欧洲_5_美食">美食</a>
	                         
	                            <a href="http://www.tuniu.com/g3600/shopping-0-0/" target="_blank" m="点击_右侧推荐_攻略_欧洲_6_购物">购物</a>
	                         
	                            <a href="http://www.tuniu.com/g3600/entertainment-0-0/" target="_blank" m="点击_右侧推荐_攻略_欧洲_7_娱乐">娱乐</a>
	                         
	                            <a href="http://www.tuniu.com/guide/d-ouzhou-3600/youji/" target="_blank" m="点击_右侧推荐_攻略_欧洲_8_游记">游记</a>
	                         
	                            <a href="http://www.tuniu.com/guide/d-ouzhou-3600/pinglun/" target="_blank" m="点击_右侧推荐_攻略_欧洲_9_点评">点评</a>
	                         
	                            <a href="http://www.tuniu.com/guide/d-ouzhou-3600/tupian/" target="_blank" m="点击_右侧推荐_攻略_欧洲_10_图片">图片</a>
	                         
	                            <a href="http://www.tuniu.com/g3600/transport-0-0/" target="_blank" m="点击_右侧推荐_攻略_欧洲_11_交通">交通</a>
	                         
	                            <a href="http://weather.tuniu.com/city_3600/" target="_blank" m="点击_右侧推荐_攻略_欧洲_12_天气">天气</a>
	                         
	                            <a href="http://www.tuniu.com/wenda/area-3600" target="_blank" m="点击_右侧推荐_攻略_欧洲_13_问答">问答</a>
	                         
	                            <a href="http://www.tuniu.com/wenda/area-3600" target="_blank" m="点击_右侧推荐_攻略_欧洲_14_问答">问答</a>
	                                             
	                    </div>
	                
	                
	                
	                    <div class="tit">
	                        欧洲
	                        <span>游记</span>
	                    </div>
	                    <div class="travels"> 
	                       
	                       <a href="http://www.tuniu.com/trips/12606716" target="_blank" m="点击_右侧推荐_游记_欧洲_1_摩洛哥摄影旅拍记|你未曾见过的摩洛哥，我未曾见过的我">
	                       <i class="icon icon-travels"></i>摩洛哥摄影旅拍记|你未曾见过的摩洛哥，我未曾见过的我</a>
	                        
	                       <a href="http://www.tuniu.com/trips/12606535" target="_blank" m="点击_右侧推荐_游记_欧洲_2_【首发】美丽的烏克兰">
	                       <i class="icon icon-travels"></i>【首发】美丽的烏克兰</a>
	                        
	                    </div> 
	                  
	            </div>  
	        </div>
	    </div>
	      
	    <!-- 天气 end-->    
	
	
	    <div id="guessyoulike" class="guessyoulike an_mo" liwithhan="category_最近访问">
	        <div class="guesslike_history" id="guesslike_history">
	            <ul class="tabs clearfix">
	                <li class="current">浏览历史</li>
	            </ul>
	            <div class="tab_contents datalazyload no-action" data-lazyload-type="data" data-lazyload-from="textarea">
	                <div class="tab_contents_list search_history ">
	                    <div class="tab_contents_item">
	                        <ul>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210054963" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_1_210054963">
	                                    <img src="/style/home/search/Cii-U1j9n1eIDli1AARBgeJoRB8AAJwKgDik_IABEGZ388_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G1/M00/EC/92/Cii-U1j9n1eIDli1AARBgeJoRB8AAJwKgDik_IABEGZ388_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210054963" target="_blank">
	                                    <h6>
	                                        [春节]&lt;西安-兵马俑-华清池-法门寺-乾陵-大明宫双飞5日游&gt;五星连住，纯玩爆品，途牛自营地接，探秘国家宝藏，享国际品牌自助餐，千人好评，万人出游
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 2448</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210168349" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_2_210168349">
	                                    <img src="/style/home/search/Cii-s1vZEXWIDi75AAMkXcUhpK8AAP3dQP06ugAAyR1116_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G5/M00/7A/60/Cii-s1vZEXWIDi75AAMkXcUhpK8AAP3dQP06ugAAyR1116_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210168349" target="_blank">
	                                    <h6>
	                                        [春节]&lt;泰国曼谷-芭提雅-沙美岛5晚6日游&gt;陈小春推荐 万人出游 0购物0自费 升级3晚五星（保证1晚喜来登或希尔顿）沙美岛出海
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 4365</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210134543" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_3_210134543">
	                                    <img src="/style/home/search/Cii9EVdeE9yIJAI7ACz-sTtwT7sAAGgZwCRTvAALP7J969_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G1/M00/0C/F9/Cii9EVdeE9yIJAI7ACz-sTtwT7sAAGgZwCRTvAALP7J969_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210134543" target="_blank">
	                                    <h6>
	                                        [元旦]&lt;越南胡志明-头顿-美拖4晚5日游&gt;游西贡精华景点，登耶稣山品头顿海鲜风味餐，畅游湄公河独木舟，赏十里银滩日落，品西贡滴漏咖啡
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 3263</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210137881" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_4_210137881">
	                                    <img src="/style/home/search/Cii9EFjkuHKIfNlyAAbSn7lddzEAAJWXwAAAAAABtK3130_w80_h80_c1_t0.jpg" data-src="https://m.tuniucdn.com/fb2/t1/G1/M00/CC/26/Cii9EFjkuHKIfNlyAAbSn7lddzEAAJWXwAAAAAABtK3130_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210137881" target="_blank">
	                                    <h6>
	                                        [春节]&lt;美国东西海岸12-15日游&gt;广州直飞 可联运 大峡谷 旧金山 部分团可升级加拿大 A线游大瀑布 墨西哥 B线增大都会博物馆 布莱斯
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 9946</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210166167" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_5_210166167">
	                                    <img src="/style/home/search/Cii-tFvO1gWILUsbAAIZ8EgWb3cAAPhJQPG1hUAAhoI786_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G5/M00/6C/8B/Cii-tFvO1gWILUsbAAIZ8EgWb3cAAPhJQPG1hUAAhoI786_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210166167" target="_blank">
	                                    <h6>
	                                        &lt;法国+瑞士+意大利10-12日瑞士深度游&gt;一价全含，欧洲自营，瑞士五城，冰川3000玩雪，西庸城堡，黄金列车，凡尔赛，米其林法餐，WiFi
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 12999</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210166734" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_6_210166734">
	                                    <img src="/style/home/search/Cii-s1vQEbSIU_2cAAN18IdmxYYAAPkAAMhIJAAA3YI578_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G5/M00/6E/65/Cii-s1vQEbSIU_2cAAN18IdmxYYAAPkAAMhIJAAA3YI578_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210166734" target="_blank">
	                                    <h6>
	                                        &lt;欧陆大全景-荷比奥德法瑞意12日&gt;广州往返，欧洲自营，20到30人小团，卢浮宫，塞纳水上餐厅，新天鹅堡，荷兰羊角村，加尔达湖，巴黎自由活动
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 6699</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210134432" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_7_210134432">
	                                    <img src="/style/home/search/c72086fa46f0ed9b5ad2ccffe3730c46_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/filebroker/cdn/vnd/c7/20/c72086fa46f0ed9b5ad2ccffe3730c46_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210134432" target="_blank">
	                                    <h6>
	                                        [春节]&lt;埃及9-10日游&gt;五星酒店，纯玩0购物，四城全景游，卢克索探秘，风帆船游尼罗河，亚历山大地中海，远期预售
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 4500</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210117999" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_8_210117999">
	                                    <img src="/style/home/search/Cii-tFukm1GIC6O9ACBNpz-uco0AAODfgBCh1wAIE2_829_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G5/M00/25/E6/Cii-tFukm1GIC6O9ACBNpz-uco0AAODfgBCh1wAIE2_829_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210117999" target="_blank">
	                                    <h6>
	                                        [元旦]&lt;桂林-阳朔-兴坪漓江-银子岩-遇龙河-世外桃源-象鼻山动车3日游&gt;广州往返 专车专导 三5A齐玩 60标澳门酒家 单单赠礼
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 659</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210320025" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_9_210320025">
	                                    <img src="/style/home/search/3497d6eb362c9a9f5cb03182f2ca379c_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/filebroker/cdn/snc/34/97/3497d6eb362c9a9f5cb03182f2ca379c_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210320025" target="_blank">
	                                    <h6>
	                                        &lt;阳江闸坡-海陵岛-十里银滩3日游&gt;住海天主题酒店2晚、泡温泉1次（山泉湾温泉）、矿泉水每天1瓶、沙滩温泉2种体验
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 428</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210159111" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_10_210159111">
	                                    <img src="/style/home/search/3805bf37b354f5a31de7041397750c60_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/filebroker/cdn/snc/38/05/3805bf37b354f5a31de7041397750c60_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210159111" target="_blank">
	                                    <h6>
	                                        [春节]&lt;希腊+西班牙+葡萄牙12日游&gt;深圳出发，全四星，2晚悬崖酒店， 高迪艺术之城巴塞罗那，雅典卫城，入内参观马德里皇宫，西班牙海鲜饭
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 13553</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210132894" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_11_210132894">
	                                    <img src="/style/home/search/Cii_NllSI56II0gcABQtj0YgXNsAABxEwPiKFIAFC2n089_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G3/M00/1A/74/Cii_NllSI56II0gcABQtj0YgXNsAABxEwPiKFIAFC2n089_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210132894" target="_blank">
	                                    <h6>
	                                        [春节]&lt;东欧-奥匈捷斯+德国波兰12-14日游&gt;欧洲全年爆款，四星全含，全程含餐，布拉格城堡，CK小镇，哈尔施塔特，渔人堡，美泉宫，无忧宫，WIFI
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 11499</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/package/210175909" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_12_210175909">
	                                    <img src="/style/home/search/Cii-T1jZ9S6IBPvAAAO8ssyM_NQAAI1ugJH-SsAA7zK171_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G2/M00/5C/F0/Cii-T1jZ9S6IBPvAAAO8ssyM_NQAAI1ugJH-SsAA7zK171_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/package/210175909" target="_blank">
	                                    <h6>
	                                        [元旦]&lt;重庆4日双飞自由行&gt;经典TOP，好评如潮，两江交汇地，探寻巴渝文化，感受红色印记，游武隆天生三桥，热销酒店集结，出发吧我们
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 1271</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/package/210240091" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_13_210240091">
	                                    <img src="/style/home/search/Cii-s1ut5EKIXSM2ABTmgjVbDAQAAOZEwPn8XMAFOaa923_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G5/M00/34/93/Cii-s1ut5EKIXSM2ABTmgjVbDAQAAOZEwPn8XMAFOaa923_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/package/210240091" target="_blank">
	                                    <h6>
	                                        &lt;日本大阪-京都-箱根-东京5晚6日自由行&gt;赏枫正当时，大阪美食，京都古韵，富士山下1晚正宗日式温泉，本州精华景点一网打尽
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 3934</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210050563" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_14_210050563">
	                                    <img src="/style/home/search/Cii-s1s5vwiIWEPDAFABcTo-AuIAAJd-wJA0uAAUAGJ944_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G5/M00/65/71/Cii-s1s5vwiIWEPDAFABcTo-AuIAAJd-wJA0uAAUAGJ944_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210050563" target="_blank">
	                                    <h6>
	                                        &lt;厦门-鼓浪屿双飞4日游&gt;半跟团半自助，2晚市区舒适快捷+1晚鼓浪屿，打卡四大网红景点，游艇环厦门筼筜夜景，品老别墅下午茶，0购物0自费
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 1584</i>起
	                                    </span>
	                                </p>
                                </li>
	                        
	                        	<li class="seller_item clearfix">
		                            <a href="http://www.tuniu.com/tour/210039461" target="_blank" m="点击_右侧推荐_浏览历史_欧洲_15_210039461">
	                                    <img src="/style/home/search/Cii_J1n2luKITXvsAA4zrcI2QuIAACs5QB04fEADjPF498_w80_h80_c1_t0.jpg" data-src="http://m.tuniucdn.com/fb2/t1/G4/M00/B8/2C/Cii_J1n2luKITXvsAA4zrcI2QuIAACs5QB04fEADjPF498_w80_h80_c1_t0.jpg" style="display: block;">
	                                </a>
	                                <a href="http://www.tuniu.com/tour/210039461" target="_blank">
	                                    <h6>
	                                        &lt;哈尔滨-雪乡-镜泊湖冬捕-长白山-魔界-万科滑雪双飞6日游&gt;自营纯玩，绝无暗店，1晚国五，享650元好礼（温泉/雾凇/冬捕/景交/暖心礼包）东北万人出游
	                                    </h6>
	                                    
	                                </a>
	                                <p>
	                                    <span class="fl">
	                                        <i>¥ 4055</i>起
	                                    </span>
	                                </p>
                                </li>
	                            
	                        </ul>
	                    </div>
	                    
	                    	<p class="actions"><i class="icon_btn_left"></i><i class="icon_btn_right"></i></p>
	                      
	                </div>
	            </div>
	        </div>
	    </div>    
	  

			</div>
                        
                    </div>
                
            
    
    <div class="right_scroll">
        <a class="backToTop"></a>
    </div>
</div>


<input type="hidden" id="queryKey" value="欧洲">
<input type="hidden" id="b_queryKey" value="欧洲">
<input type="hidden" id="bookCityLetter" value="gz">
<input type="hidden" id="bookCity" value="602">
<input type="hidden" id="tabKey" value="whole">
<input type="hidden" id="poiShow" value="false">
<input type="hidden" id="hasResult" value="true">
<input type="hidden" id="isAbroad" value="true">
<input type="hidden" id="poiName" value="false">
<input type="hidden" id="poiId" value="0">
<script type="text/javascript">
    prdListGlobalConfig = {
        url: '/search_complex',
        query_key: '欧洲',
        prd_type: 'whole',
        start_city: 'gz',
        ptn: '',
        partner_book_city: ''
    }
</script>

</div>
<script>
    if(window.PERFORMANCE && window.d){
        window.PERFORMANCE.r=new Date().getTime()-window.d.getTime();
    }
</script>

@endsection

