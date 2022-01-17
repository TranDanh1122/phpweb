
@extends('layouts.fullLayoutMaster')
{{-- title --}}
@section('title','Sửa Thông Tin Sản Phẩm')

{{-- page style --}}
@section('page-styles')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/file-uploaders/dropzone.css')}}">

@endsection

@section('content')

<style>
    .table-2 th {
  background-color: #037ffa;
  color: #fff !important;
  text-decoration: underline;
  text-align: center;
}

.table-2 td,
.table-2 th {
  border: 1px solid #dfe3e7 !important;
}
    </style>

<!-- Form wizard with step validation section start -->
<section id="validation">
	<div class="row align-items-end">
		<div class="col-12">
			
		</div>
		<div class="col-12">
			<div class="card">
				<div class="card-header pb-0 d-flex justify-content-around">
					<h1 class="card-title">Thông tin sản phẩm</h1>
				</div>
				<div class="card-body">
					<form method="post" action="{{route('suabai',[$data->id])}}"    enctype="multipart/form-data">

						@csrf
                    <fieldset>
                        <div class="row align-items-end">


                            
                            <div class="col-md-12" >
                                <fieldset class="form-group" >
                                    <label for="title" id="label-name">Title</label>
                                    <input name="title" type="text" class="form-control"value="{{$data->title}}" id="title" placeholder="" required style="text-transform:none" >
                                </fieldset>
                            </div>

                        <div class="col-md-4">
                            <fieldset class="form-group">
                                <label for="gia">Giá (VNĐ) /Vé</label>
                                <input name="gia" type="text" class="form-control" id="gia" value="{{$data->gia}}"  required style="text-transform:none" >
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset class="form-group">
                                <label for="soluong">Số lượng Vé</label>
                                <input name="soluong" type="text" class="form-control" id="soluong" value="{{$data->soluong}}"  required style="text-transform:none" >
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                        <fieldset class="form-group ">
                        <label for="loai">Loại</label>

                        <select id="loai"  class="custom-select" name="loai" style="overflow: hidden;" required="">
                            <option selected="" disabled="" hidden=""></option>
                            <option value="Resort">Resort </option>
                            <option value="Nhà vườn">Nhà vườn</option>
                            <option value="Biển">Biển</option>
                            <option value="Khác">Khác</option>


                        </select>
                        </fieldset>
                        </div>
                        <div class="col-md-4">
                        <fieldset class="form-group ">
                        <label for="loai">Miền</label>

                            <select id="region"  class="custom-select" name="region" style="overflow: hidden;" required="">
                            <option selected="" disabled="" hidden=""></option>
                            <option value="bac">Miền Bắc </option>
                            <option value="trung">Miền Trung</option>
                            <option value="nam">Miên Nam</option>
                            


                        </select>
                        </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <label for="tinh_thanh">Địa chỉ</label>
                                <input name="tinh_thanh" type="text" class="form-control" id="tinh_thanh" value="{{$data->diachi1}}" placeholder="Hà Nội" required style="text-transform:none" >
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset class="form-group">
                                <input name="huyen_thi" type="text" class="form-control" id="huyen_thi"  value="{{$data->diachi2}}" placeholder="Quận Hoàn Kiếm" style="text-transform:none" >
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset class="form-group">

                                <input name="diachi" type="text" class="form-control" id="diachi" value="{{$data->diachi3}}" placeholder="Đường 123"  style="text-transform:none"  >
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                                <fieldset class="form-group">
                                    <label for="ngaybd">Bắt đầu</label>
                                    <input name="ngaybd" type="text" class="form-control pickadate" value="{{$data->ngaybd}}" id="ngaybd" placeholder="" required style="text-transform: none;">
                                </fieldset>
                            </div>
                        <div class="col-md-4">
                                <fieldset class="form-group">
                                    <label for="hansd">Hết hạn</label>
                                    <input name="hansd" type="text" class="form-control pickadate" value="{{$data->ngayhh}}" id="hansd" placeholder="" required style="text-transform: none;">
                                </fieldset>
                        </div>
                       
                        <div class="col-md-4">
                                <fieldset class="form-group">
                                    <label for="sdt">Liên hệ</label>
                                    <input name="sdt" type="text" class="form-control" id="sdt" value="{{$data->lienhe}}" placeholder="" required style="text-transform: none;">
                                </fieldset>
                        </div>
                        
                            <div class="col-md-4">
                                <fieldset class="form-group">
                                    <label for="thongtin">Thông tin thêm</label>
                                    <textarea name="thongtin" type="text" class="form-control" value="{{$data->thongtin}}" id="thongtin" placeholder="" rows="16" col="10" required style="text-transform: uppercase;">{{$data->thongtin}}</textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-4 mb-1">
                                <div class="dropzone" id="dropzone-dangbai">
                                    <div class="dz-message">Ảnh đính kèm</div>
                                </div>
                           </div>
                           <input type="hidden" id="name-anh" value="{{$data->anh}}" name="name_anh"></input>
                           <div class="col-md-4 mb-5">
                               <Label>Ảnh đã có sẵn</Label>
                               <table class="table table-2 mb-1">
                                    <thead>
                                    <th>STT</th>
                                    <th>Tên ảnh</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach(explode(',',$data->anh) as $key=> $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value}}</td>
                                        <td ><a href="javascript::void(0)" id="remove" anh-remove="{{$key}}">Remove</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="col-md-12 d-flex justify-content-around">
                                <div class="col-4" >
                                    <fieldset class="form-group ">
                                        <button type="submit" class="form-control btn btn-primary" id="submit" required style="text-transform: uppercase;">Đăng bài</button>
                                    </fieldset>
                                </div>
                            </div>

                            
                        </div>

                        </fieldset>

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
     Dropzone.autoDiscover = false;
    var urlupload = '{{url("uploadanh")}}';
    var token = "{{ csrf_token() }}";
    $( document ).ready(function() {
        var anhupload =[];
        //upload anh
        var mydropzone = new Dropzone("div#dropzone-dangbai",{
        paramName: "anhdaup",
        url:urlupload ,
        acceptedFiles: ".jpg",
        maxFilesize: 2,
        addRemoveLinks: true,
        uploadMultiple: true,
        parallelUploads:4,
        maxFiles: 4,
        params:{
            _token : token,
        },
	init: function(){
		var mydropzone = this;
		this.on('removedfile', function(file){
			removeItem = file.name;
			anhupload = jQuery.grep(anhupload, function(value) {
				return (value.indexOf(removeItem) <= -1);
			});
		});
		this.on('successmultiple',function(files,respose){
			
				$.each(respose.data,function( key, value ) {
					anhupload.push(','+value+',');
				});
                $('#name-anh').val(anhupload);
			
		});
	}
    });



    })
</script>

@endsection