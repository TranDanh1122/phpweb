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
public function viewsanpham($id){
    $data=mathang::find($id);

  return view('pages.mathang.page-view-mathang',['data'=>$data]);
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
      $data=mathang::paginate(4);
      return view('pages.page-all-mathang',['data'=>$data]);
  }
  public function savecomment(Request $request){
    $datas = $request->all();
    $mathang=mathang::find($datas['id-mathang']);
    $cmt=new comment;
    $cmt->text= $datas['text'];
    $cmt->nguoicmt=Auth::user()->id;
    $cmt->mathang_id= $datas['id-mathang'];
    $cmt->save();
    $avatar=[];
    $name=[];
    foreach($mathang->getcmt as $cmt) {       
        array_push($avatar,$cmt->usercmt->avatar);
        array_push($name,$cmt->usercmt->Name);
    }

    return response()->json([
        'cmt' =>  $mathang->getcmt,
        'avatar'=>$avatar,
        'name'=>$name,
    ]);
  }
  public function savedanhgia(Request $request){
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
    foreach($mathang->getdanhgia as $cmt) {       
        array_push($avatar,$cmt->userdanhgia->avatar);
        array_push($name,$cmt->userdanhgia->Name);
    }

    return response()->json([
        'danhgia' =>  $mathang->getdanhgia,
        'avatar'=>$avatar,
        'name'=>$name,
    ]);
  }
}
