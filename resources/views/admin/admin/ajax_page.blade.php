<table class="table table-striped table-bordered table-hover" id="sample_table">
        <thead>
         <tr>
                <th width="25px"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
                <th width="80px">编号</th>
                <th width="250px">登录名</th>
                <th width="100px">手机</th>
                <th width="100px">邮箱</th>
                <th width="100px">角色</th>       
                <th width="180px">加入时间</th>
                <th width="70px">状态</th>                
                <th width="200px">操作</th>
              </tr>
            </thead>
              <tbody>
              @foreach($user as $v)
                 <tr>
                  <td><label><input type="checkbox" value="{{$v->id}}" class="ace checks"><span class="lbl"></span></label></td>
                  <td>{{$v->id}}</td>
                  <td>{{$v->name}}</td>
                  <td>{{$v->phone}}</td>
                  <td>{{$v->email}}</td>
                  <td>{{$v->status}}</td>
                  <td>{{$v->time}}</td>
                  @if($v->display == '已开启')
                    <td class="td-status"><span class="label label-success radius">{{$v->display}}</span></td>
                  @else
                    <td class="td-status"><span class="label label-defaunt radius">已停用</span></td>
                  @endif;
                  
                  <td class="td-manage">
                    @if($v->display == '已开启')
                    <a onClick="member_stop(this,{{$v->id}})"  href="javascript:;" title="停用"  class="btn btn-xs btn-success"><i class="fa fa-check  bigger-120"></i></a>
                    @else
                    <a style="text-decoration:none" class="btn btn-xs " onClick="member_start(this,{{$v->id}})" href="javascript:;" title="启用"><i class="fa fa-close bigger-120"></i></a>
                    @endif  
                    <a title="编辑"  value="{{$v->id}}"  href="javascript:;"  class="btn btn-xs btn-info administrator_edit" ><i class="fa fa-edit bigger-120"></i></a>       
                    <a title="删除" href="javascript:;"  onclick="member_del(this,'{{$v->id}}')" class="btn btn-xs btn-warning" ><i class="fa fa-trash  bigger-120"></i></a>
                   </td>
                 </tr>
                 @endforeach
    </tbody>
    </table>
<div style="margin:0 auto;text-align:center" id="list">{{$user->links()}}</div>
<script>
    $(function () {
    //给id为list的元素代理绑定下面所有的a元素"click"事件      
        $("#list").on("click",".pagination a",function() {

            // alert($(this).attr('href'));
        //取a标签的href即url发送ajax请求
        $.get($(this).attr('href'),function(html){
        //返回数据输出到id为list的元素中
                $('#ajax_page').html(html);
                
            });
            //阻止默认事件和冒泡，即禁止跳转
            return false;
        })
    })
    function member_edit(title,url,id,w,h){
      layer_show(title,url,w,h);
    }
    $('.administrator_edit').on('click', function(){
        var id = $(this).attr('value');
        $.get("/admin/admin/"+id+"/edit",{},function(data){
            console.log(data);
            $("#edit_administrator_style").html(data);
            layer.open({
                type: 1,
                title:'修改管理员',
                area: ['700px',''],
                shadeClose: false,
                content: $('#edit_administrator_style'),
            });
        });
        
    })
</script>