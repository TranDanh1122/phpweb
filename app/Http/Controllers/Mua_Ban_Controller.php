<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mathang;
use App\mathang_anh;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\comment;
use App\danhgia;
use Session;
use Stripe;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;

use Config;
class Mua_Ban_Controller extends Controller
{
    public function loadcreatepage()
    {
        return view('pages.mathang.page-create-mathang');
    }
    public function loadeditpage($id)
    {
        $data=mathang::find($id);
        return view('pages.mathang.page-edit-mathang', ['data'=>$data]);
    }
    public function viewsanpham($id)
    {
        $data=mathang::find($id);

        return view('pages.mathang.page-view-mathang', ['data'=>$data]);
    }
    public function upanh(Request $request)
    {
        $datas = $request->file('anhdaup');
        $list_anh = array();
      
        foreach ($datas as $key => $file) {
            $save_file = $file;
            $name = $key . strtotime("now") . '_' . $file->getClientOriginalName();
            $save_file->move("mathanganh", $name);
            $list_anh[$key] = $name;
        }
      
      
        return response()->json([
          'data' => $list_anh
         
      ]);
    }
    public function store_mathang(Request $request)
    {
        $datas = $request->all();
        $mathang=new mathang;
        $mathang->nguoidang=Auth::user()->id;
        $mathang->title=$datas['title'];
        $mathang->gia=$datas['gia'];
        $mathang->soluong=$datas['soluong'];
        $mathang->diachi1=$datas['tinh_thanh'];
        $mathang->diachi2=$datas['huyen_thi'];
        $mathang->diachi3=$datas['diachi'];
        $mathang->ngaybd=date("Y-m-d H:i:s", strtotime($datas['ngaybd']));
        $mathang->ngayhh=date("Y-m-d H:i:s", strtotime($datas['hansd']));
        $mathang->thongtin=$datas['thongtin'];
        $mathang->loai=$datas['loai'];
        $mathang->title=$datas['title'];
        $name_anh=substr($datas['name_anh'], 0, -1);
        if (strpos($name_anh, ',,')) {
            $name_anh= str_replace(',', ',,', $name_anh);
        }
        $mathang->lienhe=$datas['sdt'];
        $mathang->save();
        foreach (explode(',', $name_anh) as $val) {
            if ($val!="") {
                $mathang->loadanh()->save(
                    new mathang_anh([
              
                'name'=>$val
            ])
                );
            }
        }
    
        return redirect('/dash');
    }
    public function edit_mathang(Request $request, $id)
    {
        $datas = $request->all();
        $mathang=mathang::find($id);
        $mathang->title=$datas['title'];
        $mathang->gia=$datas['gia'];
        $mathang->soluong=$datas['soluong'];
        $mathang->diachi1=$datas['tinh_thanh'];
        $mathang->diachi2=$datas['huyen_thi'];
        $mathang->diachi3=$datas['diachi'];
        $mathang->ngaybd=date("Y-m-d H:i:s", strtotime($datas['ngaybd']));
        $mathang->ngayhh=date("Y-m-d H:i:s", strtotime($datas['hansd']));
        $mathang->thongtin=$datas['thongtin'];
        $mathang->lienhe=$datas['sdt'];
        $mathang->loai=$datas['loai'];

        $name_anh=substr($datas['name_anh'], 0, -1);
        if (strpos($name_anh, ',,')) {
            $name_anh= str_replace(',', ',,', $name_anh);
        }
        foreach (explode(',', $name_anh) as $val) {
            if ($val!="") {
                $mathang->loadanh()->save(
                    new mathang_anh([
             
               'name'=>$val
           ])
                );
            }
        }
    
        $mathang->save();
        return redirect('/dash');
    }
    public function allmathang()
    {
        $data=mathang::paginate(4);
        return view('pages.page-all-mathang', ['data'=>$data]);
    }
    public function savecomment(Request $request)
    {
        $datas = $request->all();
        $mathang=mathang::find($datas['id-mathang']);
        $cmt=new comment;
        $cmt->text= $datas['text'];
        $cmt->nguoicmt=Auth::user()->id;
        $cmt->mathang_id= $datas['id-mathang'];
        $cmt->save();
        $avatar=[];
        $name=[];
        foreach ($mathang->getcmt as $cmt) {
            array_push($avatar, $cmt->usercmt->avatar);
            array_push($name, $cmt->usercmt->Name);
        }

        return response()->json([
        'cmt' =>  $mathang->getcmt,
        'avatar'=>$avatar,
        'name'=>$name,
    ]);
    }
    public function savedanhgia(Request $request)
    {
        $datas = $request->all();
        $mathang=mathang::find($datas['id-mathang']);
        $danhgia=new danhgia;
        $danhgia->text= $datas['text'];
        $danhgia->nguoidanhgia=Auth::user()->id;
        $danhgia->mathang_id= $datas['id-mathang'];
        $danhgia-> rate= $datas['rate'];
        $danhgia->save();
        $avatar=[];
        $name=[];
        $rate=0;
        foreach ($mathang->getdanhgia as $key=> $cmt) {
            array_push($avatar, $cmt->userdanhgia->avatar);
            array_push($name, $cmt->userdanhgia->Name);
            $rate+=(int)$cmt->rate;
        }
        $mathang->rate=$rate/($key+1);
        $mathang->save();

        return response()->json([
        'danhgia' =>  $mathang->getdanhgia,
        'avatar'=>$avatar,
        'name'=>$name,
    ]);
    }

    public function loadpay()
    {
        return view('pages.payment-form');
    }
    public function savepay(Request $request)
    {

        \Stripe\Stripe::setApiKey('sk_test_51Jqy4oHk0oUxzgajE6K2RswXd23Ct9j0w2gv09mUVVd8yYzuoN4Xr4L5kP03oPZ1I5vmM4tHZW6ReONkJSFyZi3m00mXeubWuQ');
       $customer= \Stripe\Customer::create([
            'payment_method' => $request->token,
          ]);
          \Stripe\PaymentMethod::all([
            'customer' => $customer->id,
            'type' => 'card',
          ]);
          $payment_method = \Stripe\PaymentMethod::retrieve($request->token);
            $payment_method->attach(['customer' => $customer->id]);
            \Stripe\PaymentIntent::create([
                'amount'=>100*10,
                'currency' => 'usd',
                'payment_method' => $request->token,
                'customer' =>$customer->id,  
                'error_on_requires_action' => true,
                'confirm' => true,
                'setup_future_usage' => 'on_session',
            ]);
           
        return back();
    }
    public function edituser()
    {
        $user=User::find(Auth::user()->id);
        return view('pages.page-user-profile-update',['user'=>$user]);
    }
    public function userupdate(Request $request)
    {
        $user=User::find(Auth::user()->id);
        $datas = $request->all();
        if(!empty($datas['new_avatar'])){
		$name = '';
		$file = $datas['new_avatar'];
		$name = strtotime("now").'_'.$datas['new_avatar']->getClientOriginalName();
		$file->move('avatar', $name);
        $user->avatar=$name;
        }
        $user->Name= $datas['name'];
        $user->diachi=  $datas['dchi'];
        $user->email=  $datas['email'];
        $user->save();
        return back();
        
				
    }
}