<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Session;
use Validator;
use Hash;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;

use Config;
class AuthController extends Controller
{
  /**
  * Create user
  *
  * @param  [string] name
  * @param  [string] email
  * @param  [string] password
  * @param  [string] password_confirmation
  * @return [string] message
  */
//Login page
public function loginPage(){
    $pageConfigs = ['bodyCustomClass'=> 'bg-success'];
    return view('pages.auth-login',['pageConfigs' => $pageConfigs]);
  }
  //Register page
  public function registerPage(){
    $pageConfigs = ['bodyCustomClass'=> 'bg-full-screen-image'];
    return view('pages.auth-register',['pageConfigs' => $pageConfigs]);
  }

  public function register(Request $request)
  {
 
      $request->validate([
          'name' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'pass' => 'required|string|'
      ]);
      $name = '';
      if (isset($request['avatar'])) {
          $file = $request['avatar'];
          $name = strtotime("now").'_'.$request['avatar']->getClientOriginalName();
          $file->move('avatar', $name);
      }
      $user = new User;
      $user-> name = $request->name;
      $user-> email = $request->email;
      $user-> password = Hash::make($request->pass);
      $user-> diachi = $request->dchi;
      $user-> loai = $request->user_type;
      $user-> avatar = $name;
     $user->save();
        Session::flash('alert-class', 'success');
          return redirect('/login')->with('message','Đăng ký thành công, vui lòng đăng nhập vào hệ thống');
      
  }
   /**
    * Login user and create token
    *
    * @param  [string] email
    * @param  [string] password
    * @param  [boolean] remember_me
    * @return [string] access_token
    * @return [string] token_type
    * @return [string] expires_at
    */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {

            return redirect('/login');
        }

        $user = $request->user();
        if ($user->loai=1) {
            return redirect('/dash');
        }
        return redirect('/nguoiban');

    }
     /**
    * Logout user (Revoke the token)
    *
    * @return [string] message
    */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    
      /**
    * Get the authenticated User
    *
    * @return [json] user object
    */
    public function user(Request $request)
    {
      return response()->json($request->user());
    }
}

