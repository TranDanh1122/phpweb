
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

    </style>

<!-- Form wizard with step validation section start -->
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
    <p style="font-size: 25px;font-family:Times New Roman">Ve di du lich Viet Nam</p>
    <p> <span>Rate: 1 <strong>*</strong></span> <em>|</em> 
    <span>Danh gia: 12000 <small>luot</small></span> <em>|</em>
    <span>Da ban: 1200 <small>ve</small></span>  </p>
    <p style="font-size: 19px;">Gia Ve: <b style="font-size: 30px;color:red;">99.009 <sup style="color:red;">d</sup></b></p>
    
    <p style="font-size: 19px;">Bat Dau: <span>1-1-2021</span>
    
    &emsp;&emsp;Ket Thuc: <span>1-2-2021</span></p>
    <p style="font-size: 19px;">Dia chi: Duong 2-4/tp Nha Trang</p>
    <p style="font-size: 19px;">Lien he: 19000000</p>
    <p style="font-size: 19px;">Thong tin chi tiet: </p>
    <div style="border-width: 2px;border-style: dashed;border-color: aqua;
    padding: 15px;width: 600px;height: 300px; ">
    san pham du lich den tu cty du lich
    </div><br>
  <div class="buttons_added">
      <p style="font-size: 19px;"> So luong ve mua: 
  <input class="minus is-form" type="button" value="-">
  <input aria-label="quantity" class="input-qty" max="100" min="1" name="" type="number" value="1">
  <input class="plus is-form" type="button" value="+">
  <small> So ve con lai: 100 ve</small>
       </p>
  </div><br><br><br>
    <div>
    <button type="button" class="btn btn-outline-success"><strong>+</strong> Them vao gio</button>
    <button type="button" class="btn btn-success">Mua ngay</button>
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
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
})
    </script>
@endsection