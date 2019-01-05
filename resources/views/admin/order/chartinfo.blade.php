<!DOCTYPE html>
<html>
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link href="/style/admin/assets/css/bootstrap.min.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/css/style.css" /> 
  <link rel="stylesheet" href="/style/admin/assets/css/font-awesome.min.css" /> 
  <link href="/style/admin/assets/css/codemirror.css" rel="stylesheet" /> 
  <link rel="stylesheet" href="/style/admin/font/css/font-awesome.min.css" /> 
  <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]--> 
  <!--[if IE 7]>
          <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
        <![endif]--> 
  <!--[if lte IE 8]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]--> 
  <script src="/style/admin/assets/js/ace-extra.min.js"></script> 
  <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]--> 
  <!--[if !IE]> --> 
  <script src="/style/admin/js/jquery-1.9.1.min.js" type="text/javascript"></script> 
  <!-- <![endif]--> 
  <script src="/style/admin/assets/dist/echarts.js"></script> 
  <script src="/style/admin/assets/js/bootstrap.min.js"></script> 
  <title>交易</title> 
 </head> 
 <body> 
  <div class=" page-content clearfix"> 
   <div class="transaction_style"> 
    <ul class="state-overview clearfix"> 
     <li class="Info"> <span class="symbol red"><i class="fa fa-jpy"></i></span> <span class="value"><h4>交易金额</h4><p class="Quantity color_red">{{$money_trade}}</p></span> </li> 
     <li class="Info"> <span class="symbol  blue"><i class="fa fa-shopping-cart"></i></span> <span class="value"><h4>订单数量</h4><p class="Quantity color_red">{{$order_num}}</p></span> </li> 
     <li class="Info"> <span class="symbol terques"><i class="fa fa-shopping-cart"></i></span> <span class="value"><h4>交易成功</h4><p class="Quantity color_red">{{$success_num}}</p></span> </li> 
     <li class="Info"> <span class="symbol yellow"><i class="fa fa-shopping-cart"></i></span> <span class="value"><h4>交易失败</h4><p class="Quantity color_red">{{$error_num}}</p></span> </li> 
     <li class="Info"> <span class="symbol darkblue"><i class="fa fa-jpy"></i></span> <span class="value"><h4>退款金额</h4><p class="Quantity color_red">{{$money_refund}}</p></span> </li> 
    </ul> 
   </div> 
   <div class="t_Record"> 
    <div id="main" style="height:400px; overflow:hidden; width:100%; overflow:auto"></div> 
   </div> 
  </div>   
  <script type="text/javascript">
     $(document).ready(function(){
         
          $(".t_Record").width($(window).width()-60);
          //当文档窗口发生改变时 触发  
    $(window).resize(function(){
         $(".t_Record").width($(window).width()-60);
        });
 });
     
     
        require.config({
            paths: {
                echarts: '/style/admin/assets/dist'
            }
        });
        require(
            [
                'echarts',
                'echarts/theme/macarons',
                'echarts/chart/line',   // 按需加载所需图表，如需动态类型切换功能，别忘了同时加载相应图表
                'echarts/chart/bar'
            ],
            function (ec,theme) {
                var myChart = ec.init(document.getElementById('main'),theme);
               option = {
    title : {
        text: '上/下半年购买订单交易记录',
        subtext: '实时获取用户订单购买记录'
    },
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['所有订单','交易成功','交易失败']
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            magicType : {show: true, type: ['line', 'bar']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            data : ['上半年','下半年']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'所有订单',
            type:'bar',
            data:["{{$up}}", "{{$down}}"],
            markPoint : {
                data : [
                    {type : 'max', name: '数量'},
                    {type : 'min', name: '数量'}
                ]
            }           
        },
        {
            name:'交易成功',
            type:'bar',
            data:["{{$up_success}}","{{$down_success}}"],
            markPoint : {
                data : [
                    {type : 'max', name: '数量'},
                    {type : 'min', name: '数量'}
                ]
            },
           
            
        }
        , {
            name:'交易失败',
            type:'bar',
            data:["{{$up_error}}","{{$down_error}}"],
            markPoint : {
                data : [
                    {type : 'max', name: '数量'},
                    {type : 'min', name: '数量'}
                ]
            },
           
        }
        
    ]
};
                    
                myChart.setOption(option);
            }
        );
    </script> 
 </body>
</html>