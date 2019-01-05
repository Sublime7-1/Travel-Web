<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
		  <link rel="stylesheet" href="/style/admin/assets/css/ace-ie.min.css" />
		<![endif]-->
		<script src="/style/admin/js/jquery-1.9.1.min.js"></script>
        <script src="/style/admin/assets/js/bootstrap.min.js"></script>
		<script src="/style/admin/assets/js/typeahead-bs2.min.js"></script>           	
		<script src="/style/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="/style/admin/assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="/style/admin/assets/layer/layer.js" type="text/javascript" ></script>          
        <script src="/style/admin/js/H-ui.js" type="text/javascript"></script>
        <script src="/style/admin/js/displayPart.js" type="text/javascript"></script>
        <script src="/style/admin/assets/laydate/laydate.js" type="text/javascript"></script>
<title>系统日志</title>
</head>

<body>
<div class="margin clearfix">
 <div id="system_style">
     <div class="search_style">
     
      <ul class="search_content clearfix">
          <form action="/admin/system_log" method="get">
               <li><label class="l_f">管理员名称</label><input name="keywords" type="text"  class="text_add" placeholder=""  style=" width:400px"/></li>
               <li><label class="l_f">添加时间</label><input class="inline laydate-icon" id="start" style=" margin-left:10px;"></li>
               <li style="width:90px;"><button type="submit" class="btn_search"><i class="fa fa-search"></i>查询</button></li>
           </form>
      </ul>
    </div>
    <!--系统日志-->
    <div class="system_logs">
       <table class="table table-striped table-bordered table-hover" id="sample-table">
       <thead>
		 <tr>
				<th width="80px">ID</th>
                <th width="120px">登录用户</th>
                <th width="120px">角色</th>
				<th width="">操作内容</th>
				<th width="150px">操作时间</th>              
			</tr>
		</thead>
        <tbody>
        <tr>
        @foreach($system as $value)
         <td>{{$value->id}}</td>
         <td>{{$value->admin_id}}</td>
         <td>{{$value->admin_level}}</td>
         <td>{{$value->content}}</td>
         <td>{{$value->time}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
        <div style="margin:0 auto;text-align:center" id="list">{{ $system->appends($request)->links() }}</div>
    </div>
 </div>
</div>
</body>
</html>
<script>
  laydate({
    elem: '#start',
    event: 'focus' 
});

</script>
