<?php

namespace App\Http\Controllers;
use App\mathang;
use App\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function usersDash(){
        $topluotmua=User::orderBy('dabanduoc','DESC')->take(4);
        $toprate=mathang::orderBy('rate','DESC')->take(4);

        $topgiare=mathang::orderBy('gia','asc')->take(4);


        return view('pages.page-users-dashboard',['topgiare'=>$topgiare,'topmua'=>$topluotmua,'toprate'=>$toprate]);
    }
}
