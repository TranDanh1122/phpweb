
@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Thông Tin Sản Phẩm')

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
#sub-image ul li{
    float:left;
}
#sub-image ul li img{
    max-height: 90px;
    max-width: 120px;
    min-width: 90px;
    min-height: 120px;
    margin: 10px;
    cursor: pointer;
    display:block;
    opacity: 0.6;

}
#sub-image ul li img:hover{
   
    opacity: 1;

}
li {
    list-style-type: none;
}
#main-image{
    align-items: center ;
   
}
    </style>

<!-- Form wizard with step validation section start -->
<section id="validation">
    <div class="row align-items-end">
        <div class="col-md-5">
			<div class="container">
                @if($data->loadanh)
                <div class="gallery">
                    <div id="main-image ml-1">
                        <img src="{{asset('mathanganh/'.$data->loadanh->first()->name)}}" style="min-width: 600px; min-height: 400px;max-width: 600px;max-height: 400px;" alt="" id="main-img">
                    </div>
                    <div id="sub-image">
                        <ul>
                            @foreach($data->loadanh as $key=> $anh)
                            <li><img src="{{asset('mathanganh/'.$anh->name)}}" {{$key==0?"style='opacity: 1;'":''}} alt=""></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">

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

<script type="text/javascript">  
 $(document).ready(function(){
     $("#sub-image ul li").hover(function(){
         var img_src=$(this).find("img").attr("src");
       
         $("#main-img").attr("src",img_src);
     })
 })
</script>

@endsection