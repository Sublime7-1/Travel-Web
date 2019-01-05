
  <div class="search_style"> 
    <ul class="search_content clearfix">
      <form action="/admin/article" method="get">
       <li><label class="l_f">文章标题：</label><input name="title" type="text" class="text_add" placeholder="  输入文章标题..." value="<?php echo e(isset($request->title) ? $request->title : ''); ?>" style=" width:200px;height: 32px"></li>
       <li style="width:90px;"><button type="submit" class="btn_search" style="width:82px"><i class="fa fa-search"></i>查询</button></li>
     </form>
    </ul>
  </div>
  <div class="border clearfix">
     <span class="l_f">
      <a href="/admin/article/create"  title="添加文章" id="add_page" class="btn btn-warning"><i class="fa fa-plus"></i> 添加文章</a>
      <a href="javascript:ovid()" class="btn btn-danger"><i class="fa fa-trash"></i> 批量删除</a>
     </span>
     <span class="r_f">共：<b><?php echo e($total); ?> </b>条文章</span>
  </div>
  <div class="article_list">
    <table class="table table-striped table-bordered table-hover" id="sample-table">
      <thead>
       <tr>
          <th width="25"><label><input type="checkbox" class="ace"><span class="lbl"></span></label></th>
          <th width="80px">ID</th>
          <th width="100px">所属类别</th>
          <th width="100">所属商品</th>
          <th width="100px">来源</th>
          <th width="220px">缩略图</th>
          <th width="200px">文章标题</th>
          <th width="400px">文章内容</th>
          <th width="180px">发布时间</th>
          <th width="180px">修改时间</th>              
          <th width="80px">状态</th>                
          <th width="150px">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($data)): ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
        <td><label><input type="checkbox" class="ace"><span class="lbl"></span></label></td>
        <td><?php echo e($v->id); ?></td>
        <td><?php echo e($v->type); ?></td>
        <td><?php echo e($v->gname); ?></td>
        <td><?php echo e($v->source); ?></td>
        <td>
          <img src="<?php echo e($v->thumb); ?>" width="100px">  
        </td>
        <td><?php echo e($v->title); ?></td>          
        <td class="displayPart" displayLength="60"><?php echo $v->content; ?></td>
        <td><?php echo e($v->add_time); ?></td>
        <td><?php echo e($v->up_time); ?></td>
        <td><?php echo e($v->status); ?></td>
        <td class="td-manage"> 
          <a title="编辑"  href="/admin/article/<?php echo e($v->id); ?>/edit"  class="btn btn-xs btn-info" ><i class="fa fa-edit bigger-120"></i></a>  
          <a title="删除" href="javascript:;"  onclick="member_del(this,'<?php echo e($v->id); ?>')" class="btn btn-xs btn-danger" ><i class="fa fa-trash  bigger-120"></i></a>
        </td>
       </tr>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php else: ?>
          <tr>
           <td valign="top" colspan="12" class="dataTables_empty">没有相关记录</td>
          </tr>
       <?php endif; ?>
      </tbody>
    </table>    
  </div>
