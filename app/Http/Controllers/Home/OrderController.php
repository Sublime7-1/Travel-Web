<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Models\OrderModel;
use App\Models\OrderForm;



class OrderController extends Controller
{
    public function index($id,Request $request){
        $adult_num = $request->input('number-select-adult');
        $child_num   = $request->input('number-select-child');
        $outing = $adult_num + $child_num;
        $price = $request->input('price');
        //万年历
        $time = explode('--',$request->input('time'));
        $arr_time[0] = $time[0];
        $arr_time[1] = $time[1];
        $firstweek = date("w",strtotime($arr_time[0]));
        $secondweek = date("w",strtotime($arr_time[1]));
       
        $time_id = $request->input('time_id');
        $num = ['一','二','三','四','五','六','日'];

        $time_money =  DB::table('travel_info_time')->where('id',$time_id)->first()->percent;
        $time_money = ($time_money / 100);

        $goodsinfo = DB::table('goods')->where('id',$id)->first();

        $begin_time = DB::table('travel_info_time')->where('goods_id',$id)->get();
        $city =  DB::table('goods_city')->where('goods_id',$id)->first();
        $goodscity  =  DB::table('goods_city')->where('goods_id',$id)->get();

        $insurance = DB::table('insurance')->orderby('id','asc')->take(2)->get();

        $coupon  = DB::table('coupon_receive')->orderby('id','asc')->where('uid',session('userid'))->where('status',0)->take(2)->get();
        $couponinfo[0] = null;
        if($coupon->count()){
            foreach($coupon as $k=>$v){
                $couponinfo[$k] =   DB::table('coupon')->orderby('coupon.id','asc')->where('coupon.id',$v->cid)->where('coupon.gid',$id)->where('max_money','<',$price)->where('status',0)->join('coupontype','coupon.pid','coupontype.id')->first();
            }
        }

        $active =  DB::table('discount_active')->orderby('id','asc')->where('goods_id',$id)->where('end_time','<',time())->take(2)->get();

        $userinfo = DB::table('user')->where('id',session('userid'))->first();
        $username = $userinfo->username;

        $insurancefirst =  DB::table('insurance')->orderby('id','asc')->first();
       
        
        return view('home.order.index',['adult_num'=>$adult_num,'child_num'=>$child_num,'outing'=>$outing,'arr_time'=>$arr_time,'firstweek'=>$firstweek,'secondweek'=>$secondweek,'begin_time'=>$begin_time,'city'=>$city,'goodscity'=>$goodscity,'couponinfo'=>$couponinfo,'coupon'=>$coupon,'active'=>$active,'userinfo'=>$userinfo,'insurancefirst'=>$insurancefirst,'time_money'=>$time_money,'goods_id'=>$id,'time_id'=>$time_id,'num'=>$num,'insurance'=>$insurance,'username'=>$username,'goodsinfo'=>$goodsinfo]);
     
    }
    public function order_two($id,Request $request){
        $arr = $request->all();
        
        
        $time = $request->input('time');
        $time = DB::table('travel_info_time')->where('id',$time)->first();
        $dingdan['begin_time'] =$time->begin_time;
        $dingdan['end_time'] = $time->end_time;
       
        $dingdan['adult_num'] = $request->input('adult_num');
        $dingdan['child_num'] = $request->input('child_num');
        $dingdan['goods_city'] = $request->input('goods_city');
        $dingdan['coupon_id'] = $request->input('coupon')  != null ? $request->input('coupon') : 0;
        $dingdan['insurance'] = $request->input('insurance') != null ? $request->input('insurance') : 0;
        $dingdan['discount'] = $request->input('discount') != null ? $request->input('discount') : 0;
        $dingdan['adult_num'] = $request->input('adult_num');
       
        $dingdan['username'] = $request->input('username');
        $dingdan['userphone'] = $request->input('userphone');
        $dingdan['goods_id'] = $request->input('goods_id');
        $dingdan['admin_id'] = $request->input('admin_id');
        $dingdan['user_id'] = session('userid');
        $dingdan['order_status'] = 0;
        $dingdan['order_change_time'] = time();
        $dingdan['order_type'] = '旅游';
        $dingdan['order_num'] = time().rand(1000,10000).$id;
        

        if($dingdan['coupon_id'] != 0){
            $coupon_money = DB::table('coupon')->where('id',$dingdan['coupon_id'])->first()->money;
            //删除消耗的优惠卷
            DB::table('coupon_receive')->where('cid',$dingdan['coupon_id'])->where('uid',session('userid'))->update(['status'=>1]);
        }else{
             $coupon_money = 0;
        }

        if($dingdan['insurance'] != 0){
            $insurance_money = DB::table('insurance')->where('id',$dingdan['insurance'])->first()->money;
        }else{
             $insurance_money = 0;
        }

        if($dingdan['discount'] != 0){
            $discount_money = DB::table('discount_active')->where('id',$dingdan['discount'])->first()->discount_amount;
        }else{
             $discount_money = 0;
        }
        

        //form表单提交的内容
        $form['form_name'] = $request->input('form_name');
        $form['form_englishname'] = $request->input('form_englishname');
        $form['form_englishname2'] = $request->input('form_englishname2');
        $form['form_card_type'] = $request->input('form_card_type');
        $form['form_card_num'] = $request->input('form_card_num');
        $form['form_sex'] = $request->input('form_sex');
        $form['form_card_date1'] = $request->input('form_card_date1');
        $form['form_card_date2'] = $request->input('form_card_date2');
        $form['form_card_date3'] = $request->input('form_card_date3');
        $form['form_burn_date1'] = $request->input('form_burn_date1');
        $form['form_burn_date2'] = $request->input('form_burn_date2');
        $form['form_burn_date3'] = $request->input('form_burn_date3');
        $form['form_phone'] = $request->input('form_phone');


        $money = DB::table('goods')->where('id',$id)->first()->price;
        $money =  ($dingdan['adult_num'] * $money ) +  ($dingdan['child_num'] * $money ) -  $coupon_money - $discount_money + ($insurance_money*($dingdan['adult_num'] + $dingdan['child_num'])) ;

        $money = abs($money);
        $dingdan['money'] = $money;


        $res = DB::table('home_order')->InsertGetId($dingdan);

        if($res){
            // 插入账户支付表
                // 查询当前用户的账户数据
                $accountinfo = DB::table('accounts')->where("uid","=",session('userid'))->orderBy('id','desc')->first();
                if(count($accountinfo)){
                    // 查询当前用户的消费总金额
                    $pay_total = $accountinfo->pay_total;
                    $account['pay_total'] = $pay_total + $money;
                }else{
                    $account['pay_total'] = $money;
                }

                // 插入的信息
                $account['uid'] = session('userid');
                $account['oid'] = $res;           
                $account['pay_money'] = $money;
                $account['pay_why'] = DB::table('goods')->where('id','=',$request->input('goods_id'))->first()->title;
                $account['pay_time'] = time();
                DB::table('accounts')->insert($account);

            foreach($form['form_name'] as $k=>$v){
                $englishname =  $form['form_englishname'][$k].' '.$form['form_englishname2'][$k];
                $card_date =  $form['form_card_date1'][$k].'/'.$form['form_card_date2'][$k].'/'.$form['form_card_date3'][$k];
                $card_date =  $form['form_card_date1'][$k].'/'.$form['form_card_date2'][$k].'/'.$form['form_card_date3'][$k];
                $burn_date =  $form['form_burn_date1'][$k].'/'.$form['form_burn_date2'][$k].'/'.$form['form_burn_date3'][$k];
                DB::table('order_form')->insert(['order_id'=>$res,'name'=>$v,'englishname'=>$englishname,'card_type'=>$form['form_card_type'][$k],'card_num'=>$form['form_card_num'][$k],'phone'=>$form['form_phone'][$k],'sex'=>$form['form_sex'][$k],'card_date'=>$card_date,'burn_date'=>$burn_date]);
            }
        }


       
        return view('home.order.order_two');
    }
}
