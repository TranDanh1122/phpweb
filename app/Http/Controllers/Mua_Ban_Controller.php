<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mathang;
use App\mathang_anh;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Session;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;

use Config;
class Mua_Ban_Controller extends Controller
{
  public function loadcreatepage(){
      return view('pages.mathang.page-create-mathang');
  }
  public function loadeditpage($id){
      $data=mathang::find($id);
    return view('pages.mathang.page-edit-mathang',['data'=>$data]);
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
      $mathang->ngaybd=date("Y-m-d H:i:s",strtotime($datas['ngaybd']));
      $mathang->ngayhh=date("Y-m-d H:i:s",strtotime($datas['hansd']));
      $mathang->thongtin=$datas['thongtin'];
      $mathang->loai=$datas['loai'];
      $mathang->title=$datas['title'];
     $name_anh=substr($datas['name_anh'], 0, -1);
     if(strpos($name_anh,',,')){
        $name_anh= str_replace(',',',,',$name_anh);
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
  public function edit_mathang(Request $request,$id)
  {
      $datas = $request->all();
      $mathang=mathang::find($id);
      $mathang->title=$datas['title'];
      $mathang->gia=$datas['gia'];
      $mathang->soluong=$datas['soluong'];
      $mathang->diachi1=$datas['tinh_thanh'];
      $mathang->diachi2=$datas['huyen_thi'];
      $mathang->diachi3=$datas['diachi'];
      $mathang->ngaybd=date("Y-m-d H:i:s",strtotime($datas['ngaybd']));
      $mathang->ngayhh=date("Y-m-d H:i:s",strtotime($datas['hansd']));
      $mathang->thongtin=$datas['thongtin'];
      $mathang->lienhe=$datas['sdt'];
      $mathang->loai=$datas['loai'];

     $name_anh=substr($datas['name_anh'], 0, -1);
     if(strpos($name_anh,',,')){
        $name_anh= str_replace(',',',,',$name_anh);
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
  public function allmathang(){
      $data=mathang::paginate(10);
      return view('pages.page-all-mathang',['data'=>$data]);
  }
}
