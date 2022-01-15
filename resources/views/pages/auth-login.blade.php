@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Login Page')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- login page start -->
<section id="auth-login" class="row flexbox-container">
  <div class="col-xl-8 col-11">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-login -->
        <div class="col-md-6 col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">Đăng nhập</h4>
              </div>
            </div>
            <div class="card-body">
            @if(Session::has('message'))
                <p id="message" class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
            
             
              <form action="{{action('AuthController@login')}}" method="post"  enctype="multipart/form-data">
              @csrf   
              <div class="form-group mb-50">
                      <label class="text-bold-600" for="mail">Email</label>
                      <input type="email" class="form-control" id="mail" name="email"
                          placeholder="Email address"></div>
                  <div class="form-group">
                      <label class="text-bold-600" for="pass">Mật khẩu</label>
                      <input type="password" class="form-control" id="pass" name="password"
                          placeholder="Password">
                  </div>

                  <button type="submit" class="btn btn-primary glow w-100 position-relative">Đăng nhập<i
                          id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
              </form>
              <hr>
              <div class="text-center">
                <small class="mr-25">Chưa có tài khoản?</small>
                <a href="{{asset('register')}}"><small>Đăng ký ngay</small></a>
              </div>
            </div>
          </div>
        </div>
        <!-- right section image -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
          <img class="img-fluid" src="{{asset('images/pages/dulich.png')}}" alt="branding logo"
          style="width:600px;height:300px;">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- login page ends -->

@endsection
