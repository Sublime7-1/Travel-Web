<?php

namespace App\Http\Middleware;

use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 判断后台是否登录

        if (session('AdminUserInfo')) {
            # code...
            $action = \Route::current()->getActionName();
            list($class, $action) = explode('@', $action);
            $controller = substr(strrchr($class,'\\'),1);
            $controller = substr($controller,0,-10);

            // // 设置权限
            
            
            if(session('AdminUserInfo.ids')){
                $ids = session('AdminUserInfo.ids');
            }else{
                $ids = ['Admi'];
            }
           
            $c = ['Admin','Accounts','Advert','Adverttype','Advices','Advicestype','Article','Comment_type','Comment','Coupon','Coupontype','DiscountActive','GoodsCity','Goods','GoodsTravel','Goodstype','Level','Leveltype','Links_contacts','Links','Message','Navigate_First','Navigate_Second','Order','Payconfig','Pay','Personal','Servicelist','Servicenews','Servicesend','System_log','System_set','User','GoodsLabel','Insurance'];
            $a = ['index','store','edit','destroy','loading_order','success_order','return','indexs','add'];
            if(in_array($controller,$c)){
                if(in_array($action,$a)){
                    if(!in_array($controller.$action,$ids)){
                        echo "<script>location.href = '/admin/error'</script>";
                    }else{
                        return $next($request);
                    }
                }
            }
            
           
               
            return $next($request);
            
        }else{
            return redirect('admin/login');
        }
    }
}
