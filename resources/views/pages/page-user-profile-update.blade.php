
@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Đăng sản phẩm')

{{-- page style --}}
@section('page-styles')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/file-uploaders/dropzone.css')}}">

@endsection

@section('content')



<!-- Form wizard with step validation section start -->
<section id="validation">
	<div class="row align-items-end">
		<div class="col-12">
			
		</div>
		<div class="col-12">
			<div class="card">
				<div class="card-header pb-0 d-flex justify-content-around">
					<h1 class="card-title">Your Profile</h1>
				</div>
				<div class="card-body">
                <form method="post" action="{{ action('Mua_Ban_Controller@userupdate') }}"  enctype="multipart/form-data">
                @csrf
                
            <div class="media mb-2">
              <a class="mr-2" href="javascript:void(0);">
                
                <img src="{{url('/avatar/'.$user->avatar)}}" id="user-avatar" class="users-avatar-shadow rounded-circle" alt="users avatar" height="64" width="64" id="avatar">
             
              </a>
              <div class="media-body">
                <h4 class="media-heading"></h4>
                <div class="col-12 px-0 d-flex">
                  <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                    <label for="select-files" class="mr-25 mt-3">
                      <span style="cursor: pointer;" class="text-primary"><u>{{__('Change')}}</u></span>
                      <input id="select-files" type="file" hidden name="new_avatar" accept="image/png, image/jpg, image/jpeg">
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div>
            <div >
                <div class="form-group mb-50">
                        <label class="text-bold-600" for="exampleInputUsername1">Họ Tên</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Trần Văn A" required value="{{$user->Name}}">
                        </div>
                   
                    <div class="form-group mb-50">
                        <label class="text-bold-600" for="mail">Email</label>
                        <input type="email" class="form-control" id="mail" value="{{$user->email}}" name="email"
                            placeholder="abc@gmail.con" required></div>
                   
                    <div class="form-group mb-2">
                        <label class="text-bold-600" for="dchi">Địa chỉ</label>
                        <input type="text" class="form-control" value="{{$user->diachi}}" id="dchi" name="dchi"
                            placeholder="Địa chỉ" required>
                    </div>

                    <button type="submit" class="btn btn-primary glow position-relative w-100">Update<i
                            id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                   
                  </div>
                   

                </form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Form wizard with step validation section end -->

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')

<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
<script src="{{asset('vendors/js/file-uploaders/dropzone.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pickers/dateTime/pick-a-datetime.js')}}"></script>

<script>
      var imgurl="{{url('/avatar/')}}";
      var File;
      $(document).ready(function(){
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
   $('#select-files').change(function(){
//  $('#user-avatar').attr('src',$(this).val());
 var files = this.files;
       var reader = new FileReader();
       var name=this.value;
       reader.onload = function (e) {
        $('#user-avatar').attr('src',e.target.result);
       };
       reader.readAsDataURL(files[0]);
       console.log( $('#select-files').val());
   })
    });
</script>

@endsection