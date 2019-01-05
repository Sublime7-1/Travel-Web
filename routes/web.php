<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//登录路由
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/dologin','Admin\LoginController@dologin');
Route::get('admin/loginout','Admin\LoginController@loginout');
Route::get('admin/error','Admin\ErrorController@index');
//验证码路由
Route::get('/system/code','Admin\LoginController@captch');
//确认验证码路由
Route::get('/system/recode','Admin\LoginController@code');



Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'Login'],function(){
    //错误处理
    // 后台首页路由
    Route::get('/','IndexController@index');
    // 后台无刷新提醒
    Route::get('/admin/index/servicelist','IndexController@index_service'); //客服
    Route::get('/admin/index/linkslist','IndexController@index_links'); //友情链接 
    Route::get('/admin/index/servicenews','IndexController@servicenew'); //客服聊天
    Route::get('/admin/index/message','IndexController@index_message'); //站内信    
    Route::get('/admin/index/adviceslist','IndexController@index_advices'); //意见列表    
    Route::get('/admin/index/order','IndexController@index_order'); //订单列表    
    // 后台系统首页
    Route::get('/admin/index','IndexController@admin_index');
        //管理员状态
        Route::get('/admin/status','AdminController@status');
        //管理员批量删除
        Route::get('/admin/delAll','AdminController@delAll');
    //后台管理员管理
    Route::resource('/admin','AdminController');
    // 管理员个人信息
        Route::get('/personal/newpass','PersonalController@newpass');
        Route::get('/personal/doedit','PersonalController@doedit');
    Route::resource('/personal','PersonalController');
    //管理员权限
    Route::resource('/level','LevelController');
        Route::get('/leveltype/mem_add/{pid}','LeveltypeController@mem_add');
        //查看子分类
        Route::get('/leveltype/check/{pid}','LeveltypeController@check');
    //权限分类
    Route::resource('/leveltype','LeveltypeController');
    //会员管理
        //状态修改
        Route::get('/user/status','UserController@status');
    Route::resource('/user','UserController');
    //商品分类
        //分类分屏
        Route::get('/goodstype/x_index','GoodstypeController@x_index');
    Route::resource('/goodstype','GoodstypeController');
        
    
    //后台会员收货地址管理
    Route::get('/address/{id}','UserController@addr');
    //后台会员等级管理
    Route::get('/userrank','UserController@rank');
    
    Route::get('/document','UserController@document');
    //系统日志
    Route::resource('/system_log','System_logController');
    Route::resource('/system_set','System_setController');
    //客服列表
    Route::resource('/servicelist','ServicelistController');
    //客服申请
        Route::get('/service/success/{id}','ServiceinfoController@success');
        Route::get('/service/error/{id}','ServiceinfoController@error');
    Route::resource('/servicesend','ServicesendController');
    //客服申请详情
    Route::resource('/serviceinfo','ServiceinfoController');
    
    //客服消息通知
            // 保存聊天信息
        Route::get('/char/mysqlchar','ServicenewsController@mysql_char');
        //刷新聊天信息
        Route::get('/char/new','ServicenewsController@ajax_new');
        Route::get('/servicenews/shenqing/{id}-{id1}','ServicenewsController@shenqing');
        
        Route::get('/servicenews/news/{id}-{id1}','ServicenewsController@news');
    Route::resource('/servicenews','ServicenewsController');

    
    

    // 第一层导航分类
    Route::resource('/NavigateFirst','Navigate_FirstController');
    // 第一层导航添加子分类
    Route::get('/navigateFirstAdd/{id}','Navigate_FirstController@addChild');
    // 修改导航分类状态
    Route::get('/chan_navigate_status/{id}','Navigate_FirstController@changeStatus');
    // 显示所有顶级导航分类
    Route::get('/getAllNavigate','Navigate_FirstController@getAllNavigate');
    // 第二层导航
    Route::resource('/NavigateSecond','Navigate_SecondController');
    // 第二层导航添加子分类
    Route::get('/NavigateSecadd/{id}','Navigate_SecondController@addChild');
    // 修改第二层导航分类状态
    Route::get('/chan_navigate_status2/{id}','Navigate_SecondController@changeStatus');

    // 第三层导航
    Route::resource('/NavigateThird','Navigate_ThirdController');
    // 第三层导航添加子分类
    Route::get('/NavigateThradd/{id}','Navigate_ThirdController@addChild');

    // 商品分类
    Route::resource('/GoodsLabel','GoodsLabelController');
    // 修改商品分类显示隐藏状态
    Route::get('/chan_goodslabel_status/{id}','GoodsLabelController@changeStatus');


    // 商品模块
    Route::resource('/Goods','GoodsController');
    // 添加商品获取分类名
    Route::get('/getCateName','GoodsController@getCateName');
    // 修改商品状态
    Route::get('/chan_goods_status/{id}','GoodsController@changeStatus');

    // 商品优惠活动模块
    Route::resource('/discountActive','DiscountActiveController');

    // 保险模块
    Route::resource('/insurance','InsuranceController');




    //商品旅游信息
        //传输id方法
        Route::get('/goodsinfo/travel/{id}','GoodsTravelController@index_id');
    Route::resource('/goodsinfo/travel','GoodsTravelController');
    //商品出发城市
        Route::get('/goodsinfo/city/{id}','GoodsCityController@index_id');
    Route::resource('/goodsinfo/city','GoodsCityController');
        //广告状态
        Route::get('/advert/status','AdvertController@status');
        //广告删除
        Route::get('/advert/del','AdvertController@del');
        //广告验证
        Route::get('/advert/checkup','AdvertController@checkup');
    //后台广告模块
    Route::resource('/advert','AdvertController');
        //查看分类
        Route::get('/adverttype/check/{pid}','AdverttypeController@check');
        //添加执行子分类
        Route::get('/adverttype/add/{id}','AdverttypeController@add1');
        Route::post('/adverttype/doadd','AdverttypeController@doadd');
        //子分类验证
        Route::get('/adverttype/checkup','AdverttypeController@checkup');
    // 后台广告分类模块
    Route::resource('/adverttype','AdverttypeController');

       //账户状态
        Route::get('/accounts/status','AccountsController@status');
    // 后台账户管理
    Route::resource('/accounts','AccountsController');

        //支付方式删除
        Route::get('/pay/del','PayController@del');
        //支付添加验证
        Route::get('/pay/checkup','PayController@checkup');
    // 支付方式管理
    Route::resource('/pay','PayController');
         //支付配置删除
        Route::get('/payconfig/del','PayconfigController@del');   
    // 支付配置管理
    Route::resource('/payconfig','PayconfigController');

        // 友情链接状态
        Route::get('/links/status','LinksController@status');
        // 友情链接审核人信息验证
        Route::get('/links_contacts/checkup','Links_contactsController@checkup');
        // 友情链接审核人信息
        Route::resource('/links_contacts','Links_contactsController');
    // 友情链接管理
    Route::resource('/links','LinksController');

        // 群发站内信
        Route::get('/message/add','MessageController@add');
        // 执行群发
        Route::post('/message/doadd','MessageController@doadd');
        // 单次发送验证
        Route::get('/message/checkups','MessageController@checkups');  
        // 修改验证(群发)
        Route::get('/message/checkup','MessageController@checkup');       
    // 站内信管理
    Route::resource('/message','MessageController');   

    // 优惠劵类管理
    Route::resource('/coupontype','CoupontypeController');
        // 优惠劵列表
        Route::get('/coupon/indexs','CouponController@indexs');       
    // 优惠劵 
    Route::resource('/coupon','CouponController'); 

    // 意见反馈管理
        //反馈类型删除
        Route::get('/advicestype/del','AdvicestypeController@del');
        //反馈类型状态
        Route::get('/advicestype/status','AdvicestypeController@status');
    // 意见反馈类型
    Route::resource('/advicestype','AdvicestypeController');
        // 意见删除
        Route::get('/advices/del','AdvicesController@del');
        // 回复意见
        Route::get('/advices/reply/{uid}-{advices_id}','AdvicesController@reply');
        // 查看回复
        Route::get('/advices/seereply/{id}','AdvicesController@seereply');
    // 意见列表
    Route::resource('/advices','AdvicesController');

    // 评论管理
        //评论类型删除
        Route::get('/comment_type/del','Comment_typeController@del');
        //评论类型状态
        Route::get('/comment_type/status','Comment_typeController@status');
    // 评论类型
    Route::resource('/comment_type','Comment_typeController');  
        //评论删除
        Route::get('/comment/del','CommentController@del');
        //查看回复
        Route::get('/comment/seereply/{id}','CommentController@seereply');       
        //回复意见
        Route::get('/comment/reply/{uid}-{comment_id}','CommentController@reply');
    // 评论列表
    Route::resource('/comment','CommentController');    
    //订单管理
        //成功的订单
        Route::get('/order/success_order','OrderController@success_order');
        //待处理
        Route::get('/order/loading_order','OrderController@loading_order');
        //改变订单状态
        Route::get('/order/loading_order/status','OrderController@status');
        // 后台订单退款
        Route::get('/order/return','OrderController@return');
        // 后台订单删除
        Route::get('/order/del/{id}','OrderController@del');

        
    // 订单图信息
    Route::get('/order/form/chartinfo','OrderFormController@chartinfo');
    //订单orderform  详情
    Route::get('/order/form/{id}','OrderFormController@index');
    //详情修改
    Route::get('/order/form/edit/{id}','OrderFormController@edit');
    // 执行修改
    Route::post('/order/form/doedit/{id}','OrderFormController@doedit');


       
    Route::resource('/order','OrderController'); 

        //文章删除
        Route::get('/article/del','ArticleController@del');
    // 文章
    Route::resource('/article','ArticleController'); 
});


// 前台
    // 前台首页路由
    Route::get('/','Home\IndexController@index');  


Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'HomeLogin'],function(){
    // 友情链接
    Route::resource('/links','LinksController');
    // 客服聊天框
    Route::get('/char/index','CharController@index');
    // 保存聊天信息
    Route::get('/char/mysqlchar','CharController@mysql_char');
    //刷新聊天信息
    Route::get('/char/new','CharController@ajax_new');
    // 投诉与建议处理
    Route::resource('/advices','AdvicesController');
    // 订单信息
    Route::post('/order/{id}','OrderController@index');
    // 订单交易
    Route::post('/order/order_two/{id}','OrderController@order_two');
    
    //评论
    Route::resource('/comment','CommentController');
        // 全部评论
        Route::get('/commenttotal','CommentController@total');
        // 总评分值评论
        Route::get('/commentcolligate/{colligate_grade}','CommentController@colligate');
        // 类型评论
        Route::get('/commentpids/{pid}','CommentController@pids');
        // 有图评论
        Route::get('/commentimgs','CommentController@imgs');
        // 我的点评
        Route::get('/commenton','CommentController@commenton');
        // 点评详情
        Route::get('/commentcheck/{id}','CommentController@check');
        // 图片上传
        Route::post('/ajax_upload','CommentController@ajax_upload');

    //个人中心查看订单
    Route::get('/personal/index','P_OrderController@index');
    //个人中心订单详情
    Route::get('/personal/index/info/{id}','P_OrderController@order_info');
    //个人中心删除
    Route::get('/personal/index/del/{id}','P_OrderController@order_del');
    //订单去支付
    Route::post('/personal/index/pay/{id}','P_OrderController@go_pay');
    // 进行支付
    Route::get('/personal/index/doing_pay/{id}','P_OrderController@doing_pay');
    //完成支付
    Route::get('/personal/index/success_pay/{id}','P_OrderController@success_pay');
    // 申请退款
    Route::get('/personal/index/return_pay/{id}','P_OrderController@return_pay');
    
    // 领取优惠劵
    Route::get('/goodsinfo/coupon/{uid}-{cid}','GoodsinfoController@coupon');
    // 会员中心优惠劵
    Route::get('/coupon','UsercouponController@index');
        // 类型优惠劵
        Route::get('/pids/{pid}','UsercouponController@pids');
    
    //个人中心站内信
    Route::get('/message/index','MessageController@index');
    //个人中心站内信删除
    Route::get('/message/del','MessageController@del');
    // 个人中心商品收藏
    Route::resource('/collect','CollectController');
        // 用户收藏商品
    Route::get('/collectGoods/{gid}-{uid}','GoodsinfoController@collectGoods');
        // 用户取消收藏商品
    Route::get('/cancelCollection/{gid}-{uid}','GoodsinfoController@cancelCollection');

    // 个人中心首页
    Route::resource('/member','MemberController');

    // 个人中心--个人资料
    Route::get('/personaldata/index','P_DataController@index');
    // 修改个人资料
    Route::post('/personaldata/save','P_DataController@save');
    // 检测昵称和用户名
    Route::get('/personaldata/checknick','P_DataController@checknick');
    Route::get('/personaldata/checkreal','P_DataController@checkreal');

    // 个人中心--密码设置
    Route::get('/personalpass/index','P_PassController@index');
    // 检查密码
    Route::post('/personalpass/checkpass','P_PassController@checkpass');
    // 执行密码修改
    Route::get('/personalpass/dopass','P_PassController@dopass');

    // 个人中心--安全设置
    Route::get('/personalsecurity/index','P_SecurityController@index');
        // 更改手机
        Route::get('/personalsecurity/changephone','P_SecurityController@changephone');
        // 步骤一
        Route::get('/personalsecurity/phone_one','P_SecurityController@phone_one');
        // 步骤二
        Route::get('/personalsecurity/phone_two','P_SecurityController@phone_two');
        // 提交完成
        Route::post('/personalsecurity/do_phone','P_SecurityController@do_phone');
        // 更改邮箱
        Route::get('/personalsecurity/changeemail','P_SecurityController@changeemail');
        // 步骤一
        Route::get('/personalsecurity/email_one','P_SecurityController@email_one');
        // 步骤二
        Route::get('/personalsecurity/email_two','P_SecurityController@email_two');
        // 邮箱重置发送邮件邮件 
        Route::get('/personalsecurity/sendEmail','P_SecurityController@sendEmail'); 
        // 邮件发送成功页面
        Route::get('/personalsecurity/send_success','P_SecurityController@send_success');

});
    
    // 外部执行修改邮箱
    Route::get('/home/personalsecurity/do_email','Home\P_SecurityController@do_email');

    // 旅游攻略
    Route::get('/home/article/index/{id}','Home\ArticleController@index');
    // 全部旅游攻略
    Route::get('/home/article/total','Home\ArticleController@total');

    // 前台会员注册登录
    // 前台会员注册
    Route::resource('/register','Home\UsersController');
        // 验证手机
        Route::get('/checkphone','Home\UsersController@checkphone');
        // 发送短信
        Route::get('/sendsphone','Home\UsersController@sendsphone');
        // 验证校验码
        Route::get('/checkcode','Home\UsersController@checkcode');
        // 检测用户
        Route::get('/checkuser','Home\UsersController@checkuser');
        // 检验邮箱
        Route::get('/checkemail','Home\UsersController@checkemail');        
        // 保存session数据
        Route::get('/save/{k}-{v}','Home\UsersController@save');
        // 第二步注册
        Route::get('/reg_two','Home\UsersController@reg_two');
        // 执行      
        Route::post('/do_reg_two','Home\UsersController@do_reg_two');      
        // 注册成功
        Route::get('/reg_three/{id}-{email}','Home\UsersController@reg_three');
        // 邮箱激活账号  
        Route::get('/sendEmail/{id}-{email}','Home\UsersController@sendEmail');  
        // 执行邮件激活
        Route::get('/do_sendEmail','Home\UsersController@do_sendEmail'); 
    // 找回密码
        Route::get('/forget/index','Home\ForgetController@index');
        // 发送邮件修改
        Route::get('/forget/sendEmail/{email}','Home\ForgetController@sendEmail');
        // 第二步重置密码
        Route::get('/forget/forget_two','Home\ForgetController@forget_two');
        // 第三步执行修改密码
        Route::get('/forget/reset','Home\ForgetController@reset');


    // 前台会员登录
    Route::get('/login','Home\UsersController@login');
    Route::post('/login','Home\UsersController@dologin');
    // 前台注销
    Route::get('/outlogin','Home\UsersController@outlogin');
    // 商品详情
    Route::get('/home/goodsinfo/{id}','Home\GoodsinfoController@index');
    Route::get('/home/goodsinfo/ajax_time/{id}','Home\GoodsinfoController@ajax_time');
    
    // 判断用户是否收藏商品
    Route::get('/home/checkCollect/{gid}-{uid}','Home\GoodsinfoController@checkCollect');
    
    // 搜索模块
    Route::get('/home/search/{keyword}-{code}','Home\SearchController@index');
    // 删除所有搜索条件
    Route::get('/home/deleteKeyword/{keyword}','Home\SearchController@destorySession');
    // 删除一个搜索条件
    Route::get('/home/deleteOneKeyword/{k}-{keyword}','Home\SearchController@destroyOneSession');

      // 更新中文分词
    Route::get('/updateParticiple','Home\SearchController@updateParticiple');