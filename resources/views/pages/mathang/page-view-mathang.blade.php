
@extends('layouts.contentLayoutMaster')
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
.container{
    padding: 0;
    margin: 0;
    overflow: hidden;
    max-width: 400px;
    margin-left: 150px;
}
.gallery{
    width: 100%;
}
.main-image{
    display: -webkit-box;
    display:-moz-box;
    display:-ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items:center;



}
.main-image img{
    width: auto;
    height: auto;
    margin: auto;
    max-height: 400px;

}
.small-image ul{
    padding-left: 0;
    margin-bottom: 0;
    overflow: hidden;
    margin-top: 3px;
}
.small-image ul li{
    width: calc(100%/4);
    float: left;
    display: -webkit-box;
    display:-moz-box;
    display:-ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items:center;
    height: 87px;
}
.small-image ul li img{
    width: auto;
    margin: auto;
    height: auto;
    max-height: 87px;
}
    </style>

<!-- Form wizard with step validation section start -->
<section id="validation">
	<div class="row align-items-end">
		<div class="col-12">
			<div class="container">
                @if($data->loadanh)
                <div class="gallery">
                    <div id="main-image">
                        <img src="{{asset($data->loadanh->first()->name)}}" alt="" id="main-img">
                    </div>
                    <div id="sub-image">
                        <ul>
                            @foreach($data->loadanh as $anh)
                            <li><img src="{{asset($anh->name)}}" alt=""></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
		</div>
		<div class="col-12">
			
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
 $(document).ready(function(){
     $(".small-image ul li").click(function(){
         var img_src=$(this).find("img").attr("src");
         $("img#main-img").attr("src",img_src);
     })
 })
</script>

@endsection