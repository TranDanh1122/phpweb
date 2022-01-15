<?php

namespace App\Http\Controllers;
use App\mathang;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DashboardController extends Controller
{


    public function usersDash(){
        $topluotmua=mathang::orderBy('damua','DESC')->get()->take(5);
        $toprate=mathang::orderBy('rate','DESC')->get()->take(5);

        $topgiare=mathang::orderBy('gia','ASC')->get()->take(5);
        $datas=mathang::all();
 


        return view('pages.page-users-dashboard',['topgiare'=>$topgiare,'topmua'=>$topluotmua,'toprate'=>$toprate,'datas'=>$datas]);
    }
}
