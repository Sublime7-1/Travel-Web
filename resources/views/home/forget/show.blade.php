<html>
  <title>倒计时关闭网页</title>
  <head>
  <script language="javascript">
  var cTime=10;//这个变量是倒计时的秒数设置为10就是10秒
  function TimeClose()
  {
       window.setTimeout('TimeClose()',1000);//让程序每秒重复执行当前函数。
       if(cTime<=0)//判断秒数如果为0
         CloseWindow_Click();//执行关闭网页的操作
       this.ShowTime.innerHTML="倒计时"+cTime+"秒后关闭当前窗口";//显示倒计时时间
       cTime--;//减少秒数
  }
  function CloseWindow_Click()
  {
       window.close();
  }
  </script>
  </head>
  <body onLoad="TimeClose();">
        <h1>{{$message}}</h1>
        <div id="ShowTime">倒计时10秒后将关闭当前窗口</div>
        <input type="button" name="CloseWindow" onClick="CloseWindow_Click();" value="立即关闭当前网页">
  </body>
  </html>