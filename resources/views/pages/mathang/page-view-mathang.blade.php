
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
    
textarea {
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}





.comment {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
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

        <div class="col-md-12 pills-stacked">
            <ul class="nav nav-pills flex-row">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center {{session()->has('tab')?'':'active'}}" id="account-pill-general" data-toggle="pill" href="#binhluan" aria-expanded="true">
                                <span>Bình Luận</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-log" data-toggle="pill" href="#danhgia" aria-expanded="false">
                                <span>Đánh giá</span>
                            </a>
                        </li>
                    </ul>
        </div>
    <div class="col-md-12 bg-white">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane {{session()->has('tab')?'fade':'active'}}" id="binhluan" aria-labelledby="account-pill-general" aria-expanded="true">
                <div class="comment">
                   
                    <fieldset class="form-group ">
                      <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                    </fieldset>
                      <input type="button" id="write-cmt" value="Bình luận">
                   <table id="comment" class="w-50 mt-1 bg-white">
                       <tbody>
                       @if($data->getcmt)
                       @foreach($data->getcmt as $cmt)
                       <tr class="mb-1">
                           <td>
                         <div class="d-flex mb-2  justify-content-start">
                        <img class="mr-2" alt="postimage" style="  max-width: 50px;max-height: 100px;"
                        src="{{url('/avatar/'.$cmt->usercmt->avatar)}}"
                        />
                        <a href="{{url('profile')}}" target="_blank" style="font-size: 20px;font-weight: bold !important;">{{$cmt->usercmt->Name}}</a>

                         </div>
                        </td>
                        </tr>

                         <tr>
                       <td>
                             <div  class="d-flex  flex-column">
                    
                                
                                             <p class="intro"  style="font-size: 18px;">
                                             <textarea class="border border-top-0 border-right-0 border-left-0" style="height:100px;width: 700px;">{{$cmt->text}}</textarea>
     
                                             </p>
                                             
     
                             </div>
                              
                             
                            </td>
                        
                         
                        </tr>
                       @endforeach
                       @endif
                    </tbody>
                    </table>
                  </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="danhgia" aria-labelledby="account-pill-general" aria-expanded="true">
                đánh giá	
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

<script type="text/javascript">  
 $(document).ready(function(){
     $("#sub-image ul li").hover(function(){
         var img_src=$(this).find("img").attr("src");
       
         $("#main-img").attr("src",img_src);
     })
     $("#write-cmt").click(function(){
         if('{{Auth::user()?1:0}}'==0){
             alert('Hãy đăng nhập/đăng kí để bình luận');
             return false;
         }
        $.ajax({
        type: "POST",
        url: "{{ url('/cmt') }}",
        data: {
          'id-mathang' : '{{$data->id}}',
          'text': $("#subject").val(),
          _token: "{{ csrf_token() }}",
        },
        dataType: 'json',
        success: function (respose) {
        var listcmt = $('#comment');
        listcmt.empty();
        console.log(respose.cmt);
          $.each(respose.cmt,function( key, value ) {
            var newline = $(document.createElement('tbody'));
            newline.append(`
            <tr class="mb-1 bg-white">
                <td>
            <img  alt="postimage" style="  max-width: 50px;max-height: 100px;" src="{{url('avatar/')}}/`+ respose.avatar[key] + `"/>
            <a href="{{url('profile')}}" target="_blank" style="font-size: 20px;font-weight: bold !important;">`+respose.name[key]+`</a>
            </td>   
            </tr>
                <tr class="mb-1 bg-white">
                    <td>
            <div  class="d-flex  flex-column">
                            <p class="intro"  style="font-size: 18px;">
                                <textarea class="border border-top-0 border-right-0 border-left-0" style="height:100px;width: 700px;">`+value.text+`</textarea>
     
                            </p>
                                             
     
                    </div>
                    </td>
                    </tr>`);
              newline.appendTo("#comment");

          });

        }
      });


     })
 })
</script>

@endsection