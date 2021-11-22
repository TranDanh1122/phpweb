
@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Thông Tin Sản Phẩm')

{{-- page style --}}
@section('page-styles')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/file-uploaders/dropzone.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/file-uploaders/dropzone.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
/*style tang so luong*/
.buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
}
.is-form {
    overflow:hidden;
    position:relative;
    background-color:#f9f9f9;
    height:2.2rem;
    width:1.9rem;
    padding:0;
    text-shadow:1px 1px 1px #fff;
    border:1px solid #ddd;
}
.is-form:focus,.input-text:focus {
    outline:none;
}
.is-form.minus {
    border-radius:4px 0 0 4px;
}
.is-form.plus {
    border-radius:0 4px 4px 0;
}
.input-qty {
    background-color:#fff;
    height:2.2rem;
    text-align:center;
    font-size:1rem;
    display:inline-block;
    vertical-align:top;
    margin:0;
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
    border-left:0;
    border-right:0;
    padding:0;
}
.input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
    -webkit-appearance:none;
    margin:0;
}
.checked {
  color: orange;
}
.rating {
    float:left;
    width:300px;
}
.rating span { float:right; position:relative; }
.rating span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
.rating span label {
    display:inline-block;
    width:30px;
    height:30px;
    text-align:center;
    color:#FFF;
    background:#ccc;
    font-size:30px;
    margin-right:2px;
    line-height:30px;
    border-radius:50%;
    -webkit-border-radius:50%;
}

.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
    background:#F90;
    color:#FFF;
}
    </style>

<!-- Form wizard with step validation section start -->
<?php 
$tongve= $data->soluong;
$vedamua=$data->damua;
$veconlai=$tongve-$vedamua;
echo($veconlai);

?>
<section id="validation">
<div class="row">
    <div class="col-md-6">
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
        <div class="col-md-6" 
        style="border-width: 3px;border-style: solid;border-color: aqua;padding: 20px;width: 400px;height: 800px; "
        >
        
        <p style="font-size: 25px;font-family:Times New Roman">{{$data->title}}</p>
        <p> <span>Rate: {{$data->rate}} <strong>*</strong></span> <em>|</em> 
        <span>Đánh giá: 1 <small>lượt</small></span> <em>|</em>
        <span>Đã bán: <?php echo($vedamua); ?> <small>vé</small></span>  </p>
        <p style="font-size: 19px;">Giá vé: <b style="font-size: 30px;color:red;">{{$data->gia}} <sup style="color:red;">đ</sup></b></p>
        
        <p style="font-size: 19px;">Bắt đầu: {{date("d/m/Y",strtotime($data->ngaybd))}}
        
        &emsp;&emsp;Kết thúc: {{date("d/m/Y",strtotime($data->ngayhh))}}</p>
        <p style="font-size: 19px;">Địa chỉ: {{$data->diachi1}}-{{$data->diachi2}}-{{$data->diachi3}}</p>
        <p style="font-size: 19px;">Liên hệ: {{$data->lienhe}}</p>
        <p style="font-size: 19px;">Thông tin chi tiết: </p>
        <div style="border-width: 2px;border-style: dashed;border-color: aqua;
        padding: 15px;width: 600px;height: 300px; ">
        {{$data->thongtin}}
        </div><br>
      <div class="buttons_added">
          <p style="font-size: 19px;"> Số lượng vé mua: 
      <input class="minus is-form" type="button" value="-">
      <input aria-label="quantity" class="input-qty" max="<?php echo($tongve) ?>" min="1" name="" type="number" value="1">
      <input class="plus is-form" type="button" value="+">
      <small> Số vé còn lại: <?php echo($veconlai); ?> vé</small>
           </p>
      </div><br><br><br>
        <div>
        <button type="button" class="btn btn-outline-success"><strong>+</strong> Thêm vào giỏ</button>
        &emsp;&emsp;
        <button type="button" class="btn btn-success">Mua ngay</button>
         </div>
        </div>
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
                   <table id="comment-table" class="w-50 mt-1 bg-white">
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
                <div class="rating">
    
                    <span  ><input type="radio"  name="rating"  id="str5" value="5"><label  for="str5"></label></span>
             
                    <span><input type="radio"  name="rating" id="str4"  value="4"><label  for="str4"></label></span>
                    <span><input type="radio"  name="rating" id="str3" value="3"><label for="str3"></label></span>
                    <span><input type="radio" name="rating" id="str2" value="2"><label  for="str2"></label></span>
                    <span><input type="radio"  name="rating" id="str1" value="1"><label  for="str1"></label></span>
                </div>
                <fieldset class="form-group ">
                    <textarea id="text-danhgia" name="danhgia" placeholder="Write something.." style="height:200px"></textarea>
                  </fieldset>
                    <input type="button" id="write-danhgia" value="Đánh giá sản phẩm">
                 <table id="danhgia-table" class="w-50 mt-1 bg-white">
                     <tbody>
                     @if($data->getdanhgia)
                     @foreach($data->getdanhgia as $danhgia)
                     <tr class="mb-1">
                         <td>
                       <div class="d-flex mb-2  justify-content-start">
                      <img class="mr-2" alt="postimage" style="  max-width: 50px;max-height: 100px;"
                      src="{{url('/avatar/'.$danhgia->userdanhgia->avatar)}}"
                      />
                      <a href="{{url('profile')}}" target="_blank" style="font-size: 20px;font-weight: bold !important;">{{$danhgia->userdanhgia->Name}}</a>

                       </div>
                      </td>
                      </tr>

                       <tr>
                     <td>
                           <div  class="d-flex  flex-column">
                               <div style="float: right;">
                        
                            @for($i=1;$i <= 5;$i++)
                            <span class="fa fa-star {{$i<=$danhgia->rate?'checked':''}}"></span>
                        
                             @endfor
                            </div>
                              
                                           <p class="intro"  style="font-size: 18px;">
                                           <textarea class="border border-top-0 border-right-0 border-left-0" style="height:100px;width: 700px;">{{$danhgia->text}}</textarea>
   
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
        var listcmt = $('#comment-table');
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
              newline.appendTo("#comment-table");

          });

        }
      });


     })


//danh gia
     $(".rating input:radio").attr("checked", false);

        $('.rating input').click(function () {
            $(".rating span").removeClass('checked');
            $(this).parent().addClass('checked');
        });
        var userRating;
        $('input:radio').change(
        function(){
             userRating = this.value;
          
        }); 


        $("#write-danhgia").click(function(){
         if('{{Auth::user()?1:0}}'==0){
             alert('Hãy đăng nhập/đăng kí và mua hàng để đánh giá');
             return false;
         }
        $.ajax({
        type: "POST",
        url: "{{ url('/danhgia') }}",
        data: {
          'id-mathang' : '{{$data->id}}',
          'rate' : userRating,
          'text': $("#text-danhgia").val(),
          _token: "{{ csrf_token() }}",
        },
        dataType: 'json',
        success: function (respose) {
        var listcmt = $('#danhgia-table');
        listcmt.empty();
          $.each(respose.danhgia,function( key, value ) {
            var newline = $(document.createElement('tbody'));
            var ratelight= '';
            
            var ratedark= '';
            var index;
            for (index = 1; index <=5; index++) {
                if(index<=value.rate){
                    ratelight=ratelight.concat(`
                    <span class="fa fa-star checked"></span>

                            `);
                }else{
                    ratedark=ratedark.concat(`
                <span class="fa fa-star"></span>

                `);}
            
                
            }
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
                    <div style="float: right;"> 
                        `+ratelight+ratedark+`
                    </div>
                    <p class="intro"  style="font-size: 18px;">
                    <textarea class="border border-top-0 border-right-0 border-left-0" style="height:100px;width: 700px;">`+value.text+`</textarea>
     
                    </p>
                </div>
             </td>
        </tr>`);
              newline.appendTo("#danhgia-table");

          });

        }
      });


     })
 })
</script>
<script>
    //xulycongso
    $('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var dem = 0
  } else dem = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (dem > min) dem += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) dem += 1
    }
    $this.attr('value', dem).val(dem)
  })
})
    </script>
@endsection