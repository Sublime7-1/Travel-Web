<form action="/admin/admin/{{$admin->id}}" method="post" id="form-admin-add" >
        
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>管理员：</label>
            <div class="formControls">
                <input type="text" class="input-text" value="{{$admin->name}}" placeholder="" id="user-name" name="name" datatype="*2-16" nullmsg="用户名不能为空" >
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>初始密码：</label>
            <div class="formControls">
            <input type="password" placeholder="密码" name="pass" autocomplete="off" value="" class="input-text" datatype="*6-20" nullmsg="密码不能为空" value="{{$admin->pass}}">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label "><span class="c-red">*</span>确认密码：</label>
            <div class="formControls ">
        <input type="password" placeholder="确认新密码" autocomplete="off" class="input-text Validform_error" errormsg="您两次输入的新密码不一致！" datatype="*" nullmsg="请再输入一次新密码！" recheck="pass" id="newpassword2" name="repass" value="">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label "><span class="c-red">*</span>性别：</label>
            <div class="formControls  skin-minimal">
              <label><input name="sex" type="radio" value="0" class="ace" {{$admin->sex == 0 ? "checked" : ""}} ><span class="lbl">保密</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" value="1" class="ace" {{$admin->sex == 1 ? "checked" : ""}}><span class="lbl">男</span></label>&nbsp;&nbsp;
            <label><input name="sex" type="radio" value="2" class="ace" {{$admin->sex == 2 ? "checked" : ""}}><span class="lbl">女</span></label>
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label "><span class="c-red">*</span>手机：</label>
            <div class="formControls ">
                <input type="text" class="input-text" value="{{$admin->phone}}" placeholder="" id="user-tel" name="phone" datatype="m" nullmsg="手机不能为空" >
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls ">
                <input type="text" class="input-text" placeholder="@" name="email" id="email" datatype="e" nullmsg="请输入邮箱！" value="{{$admin->email}}">
            </div>
            <div class="col-4"> <span class="Validform_checktip"></span></div>
        </div>
        <div class="form-group">
            <label class="form-label">角色：</label>
            <div class="formControls "> <span class="select-box" style="width:150px;">
                <select class="select" name="status" size="1">
                    <option value="0" {{$admin->status == 0 ? "selected" : ""}}>栏目主辑</option>
                    <option value="1" {{$admin->status == 1 ? "selected" : ""}}>栏目编辑</option>
                    <option value="2" {{$admin->status == 2 ? "selected" : ""}}>普通管理员</option>
                    <option value="3" {{$admin->status == 3 ? "selected" : ""}}>超级管理员</option>
                </select>
                </span> </div>
        </div>
        <div class="form-group">
            <label class="form-label">备注：</label>
            <div class="formControls">
                <textarea name="top" cols="" rows="" class="textarea" placeholder="说点什么...100个字符以内" dragonfly="true" onkeyup="checkLength(this);">{{$admin->top}}</textarea>
                <span class="wordage">剩余字数：<span id="sy" style="color:Red;">100</span>字</span>
            </div>
            <div class="col-4"> </div>

        </div>
        <input type="hidden" name="display" value="0" />
        
        <div> 
        <input class="btn btn-primary radius" type="submit" id="Add_Administrator" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" >
    </form>


    <script>
        //表单验证提交
        $("#edit_administrator_style").Validform({
        
         tiptype:2,
    
        callback:function(data){
        //form[0].submit();
        if(data.status==1){ 

                layer.msg(data.info, {icon: data.status,time: 1000}, function(){ 

                    location.reload();//刷新页面 

                    });   
                
            } 
            else{ 
                layer.msg(data.info, {icon: data.status,time: 3000}); 
            }         
            var index =parent.$("#iframe").attr("src");
            parent.layer.close(index);
        }
        
        
    }); 
    </script>