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
        $topluotmua=mathang::orderBy('damua','DESC')->get()->take(6);
        $toprate=mathang::orderBy('rate','DESC')->get()->take(5);

        $topgiare=mathang::orderBy('gia','ASC')->first();
        $datas=mathang::all();
        $mienbac=mathang::where('region',"=",'bac')->first();
        $mientrung=mathang::where('region',"=",'trung')->first();
        $miennam=mathang::where('region',"=",'nam')->first();

        return view('pages.page-users-dashboard',['mienbac'=>$mienbac,'mientrung'=>$mientrung,'miennam'=>$miennam,'topgiare'=>$topgiare,'topmua'=>$topluotmua,'toprate'=>$toprate,'datas'=>$datas]);
    }
}
