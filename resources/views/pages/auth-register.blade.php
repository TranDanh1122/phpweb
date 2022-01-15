@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Register Page')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<style>
  #avatar{
  opacity: 0;
  width: 0;
  float: left; 
}
</style>
<!-- register section starts -->
<section class="row flexbox-container">
  <div class="col-xl-8 col-10">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
          <!-- register section left -->
          <div class="col-md-6 col-12 px-0">
            <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
              <div class="card-header pb-1">
                  <div class="card-title">
                      <h4 class="text-center mb-2">Đăng kí tài khoản</h4>
                  </div>
              </div>
              <div class="text-center">
                <p> <small> CHÀO MƯNG ĐẾN VỚI WEBSITE CHUYÊN VỀ DU LỊCH HÀNG ĐẦU VIỆT NAM</small>
                </p>
              </div>
              <div class="card-body">
              @if(Session::has('message'))
                <p id="message" class="text-center alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                <form method="post" action="{{ action('AuthController@register') }}"  enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-50">
                        <label class="text-bold-600" for="exampleInputUsername1">Họ Tên</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Trần Văn A" required></div>
                   
                    <div class="form-group mb-50">
                        <label class="text-bold-600" for="mail">Email</label>
                        <input type="email" class="form-control" id="mail" name="email"
                            placeholder="abc@gmail.con" required></div>
                    <div class="form-group mb-2">
                        <label class="text-bold-600" for="pass">Mật khẩu</label>
                        <input type="password" class="form-control" id="pass" name="pass"
                            placeholder="Password" required>
                    </div>
                    <div class="form-group mb-2">
                        <label class="text-bold-600" for="dchi">Địa chỉ</label>
                        <input type="text" class="form-control" id="dchi" name="dchi"
                            placeholder="Địa chỉ" required>
                    </div>
                    <div class="form-group row mb-2">
                      <div class="col-md-3">
                        <label class="d-inline-block" for="ic-document">Avatar
                      </label>
                      <label class="btn btn-outline-light d-inline-block">
                        <i class="bx bx-export" ></i> IMAGE
                        <input  type="file" name="avatar" id="avatar" accept="image/*" title=" LÀm ơn Upload avatar"  required />
                      </label>
                      <a href="javascript:void(0)" id="temp-file"></a>
                        </div>

                    <div class="col-md-8 mt-2 ">
                        <ul class="list-unstyled mb-0 d-flex justify-content-around">
                          <li class="d-inline-block mr-2 mb-1">
                            <fieldset>
                              <div class="radio style-cr">
                                <input value="1" type="radio" id="guest" name="user_type" checked="">
                                <label for="guest">Khách</label>
                              </div>
                            </fieldset>
                          </li>
                          <li class="d-inline-block mb-1">
                            <fieldset>
                              <div class="radio style-cr">
                                <input value="2" type="radio" id="bussiness" name="user_type">
                                <label for="bussiness">Người bán</label>
                              </div>
                            </fieldset>
                          </li>
                        </ul>
                      </div>
                  </div>
                    <button type="submit" class="btn btn-primary glow position-relative w-100">Đăng ký<i
                            id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>

                </form>
                <hr>
                <div class="text-center">
                  <small class="mr-25">Bạn đã có tài khoản?</small>
                  <a href="{{url('/login')}}"><small>Đăng nhập</small> </a>
                </div>
              </div>
            </div>
          </div>
          <!-- image section right -->
          <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
            <img class="img-fluid" src="{{asset('images/pages/imgregis.png')}}" alt="branding logo"
            style="width:600px;height:500px;">
          </div>
      </div>
    </div>
  </div>
</section>
<!-- register section endss -->
@endsection
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

@endsection
@section('page-scripts')
<script>
      var File;
    $('#avatar').change(function(){
      var filename=$(this).val();
      var arr=filename.split("\\");
      if(filename != '') {
        File = $(this).prop('files');
        $('#temp-file').text(arr[arr.length-1]);
      } else {
        $(this).prop('files',File);
      }
    });
</script>
@endsection
