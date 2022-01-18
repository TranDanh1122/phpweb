@extends('layouts.fullLayoutMaster')
{{-- title --}}
@section('title','Dashboard Lesen Kelas')

@section('vendor-styles')

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
  border: 0px solid #f3f5f7 !important;
}
a:link {
  color: black;
  background-color: transparent;
  text-decoration: none;
}

a:visited {
  color: purple;
  background-color: transparent;
  text-decoration: none;
}

a:hover {
  color: red;
  background-color: transparent;
  /* text-decoration: underline; */
}

a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
    </style>



       
            
<div class="row m-1">
    <div class="col-md-3 mr-1 bg-white">
    <h1>Bộ lọc</h1>
    <div class="form-group ">
        <div class="d-flex justify-content-start">
        <h5>Khu vực</h5>
      </div>
        <select class="custom-select" id="region"  style="overflow: hidden;" required="">
        <option selected="" disabled="" hidden="">Chọn miền</option>
        <option value="bac">Bắc</option>
        <option value="trung">Trung</option>
        <option value="nam">Nam</option>

       </select>
     </div>
    
     <div class="form-group ">
        <div class="d-flex justify-content-start">
        <h5>Seach</h5>
      </div>
       
      <input name="search" id="search" class="form-control"/>
     <button href="javascript:void(0)" id="btn-search" class="btn btn-primary mt-1">Search</button>
     </div>
    </div>

  <div class="col-md-8 bg-white">
  <h1>Kết quả liên quan</h1>

            <table class="table table-bordered">

              <tbody id="tablebody">
                @foreach($data as $key=>$value)
               <tr class="mb-1">
                   <td><a href="{{url('sanpham/'.$value->id)}}"><img  alt="postimage" style="  max-width: 250px;max-height: 300px;"
                   src="{{url('/mathanganh/'.$value->loadanh->first()->name)}}"
                   /></a></td>
                   
                   <td>
                        <div  class="d-flex  flex-column">
                           <a href="{{url('sanpham/'.$value->id)}}" target="_blank" style="font-size: 20px;font-weight: bold !important;">{{$value->title}}</a>
               
                           <p class="bg-transparent bg-gradient text-black-50">
                             <small>
                                            <a class="name" href="{{url('nguoidang/post')}}" target="_blank" >Người đăng:{{$value->ngdang?$value->ngdang->Name:''}}</a>
                                            <em>|</em>
                                            <a href="{{url('allpost?type=loai&value='.$value->loai)}}" target="_blank">Loại:{{$value->loai}}</a>
                                            <br>
                                            <span id="rate">Rate:{{$value->rate}}*</span>
                                            <em>|</em>
                                            <span id="vé" >Số vé đã mua: {{$value->damua}}</span>
                                            <em>|</em>
                                            <span id="gia" >Giá:{{$value->gia}}</span>
                              </small>
                                        </p>
                                        <p class="intro"  style="font-size: 18px;">
                                        <span>{{$value->thongtin}}</span>

                                        </p>
                                        <p class="d-flex justify-content-around bg-transparent bg-gradient text-black-50"><small>Bắt đầu: <span>{{date("d/m/Y",strtotime($value->ngaybd))}}</span></small>
                                        <br>
                                        <small>Kết thúc: <span>{{date("d/m/Y",strtotime($value->ngayhh))}}</span></small>
                                        </p>

                        </div>
                           
                      
                    </td>
                    <td>
                     
                   
                      <div class="d-flex justify-content-between">
                        @if($value->ngdang->id==(Auth::user()?Auth::user()->id:''))
                          <a class="btn btn-outline-primary"

                                  href="{{url('suabai/'.$value->id)}}">Edit</a>
                        @endif
                          <a class="btn btn-outline-danger"
                                  href="{{url('sanpham/'.$value->id)}}">View</a>
                                  <div>
                       
                    </td>
                </tr>
                @endforeach
               

                
              </tbody>
            </table>
            <div class="bg-white" >
                 <span style="height: 50px;">{{$data->links("pagination::bootstrap-4")}}</span>
            </div>

            
</div>

</div>

     
  
</section>
<!-- Column selectors with Export Options and print table -->


@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
@endsection
{{-- page scripts --}}

@section('page-scripts')
<script>
  var auth="{{Auth::user()?Auth::user()->id:''}}";
  var token="{{csrf_token()}}"
</script>
<script>
  
  $(document).ready(function(){
  
    $('#region').change(function(){
      $.ajax({
        url:"{{url('fill-region')}}",
        data:{
          region: $(this).val(),
          _token:token
        },
        type:"post",
        success:function(response){
            if(response.error){
              alert("Error");
            }else{
           
              var table=$(document.getElementById('tablebody'));
							table.empty();
              $.each(response.response,function(key,value){
                edit="";
                if(value.ngdang==auth){
                        
                      edit=  `<a class="btn btn-outline-primary"

                                href="{{url('suabai/')}}/`+value.id+`">Edit</a>`;}
              
              html=`              <tr class="mb-1">
                   <td><a href="{{url('sanpham/')}}/`+value.id+`"><img  alt="postimage" style="  max-width: 250px;max-height: 300px;"
                   src="{{url('/mathanganh/')}}/`+value.loadanh[0].name+`"
                   /></a></td>
                   
                   <td>
                        <div  class="d-flex  flex-column">
                           <a href="{{url('sanpham/')}}/`+value.id+`" target="_blank" style="font-size: 20px;font-weight: bold !important;">`+value.title+`</a>
               
                           <p class="bg-transparent bg-gradient text-black-50">
                             <small>
                                            <a class="name" href="{{url('nguoidang/post')}}" target="_blank" >Người đăng:`+(value.ngdang?value.ngdang[0].Name:'')+`</a>
                                            <em>|</em>
                                            <a href="{{url('allpost?type=loai&value=')}}`+value.loai+`" target="_blank">Loại:`+value.loai+`</a>
                                            <br>
                                            <span id="rate">Rate:`+value.rate+`*</span>
                                            <em>|</em>
                                            <span id="vé" >Số vé đã mua: `+value.damua+`</span>
                                            <em>|</em>
                                            <span id="gia" >Giá:`+value.gia+`</span>
                              </small>
                                        </p>
                                        <p class="intro"  style="font-size: 18px;">
                                        <span>`+value.thongtin+`</span>

                                        </p>
                                        <p class="d-flex justify-content-around bg-transparent bg-gradient text-black-50"><small>Bắt đầu: <span>`+moment(value.ngaybd).format("DD/MM/YYYY")+`</span></small>
                                        <br>
                                        <small>Kết thúc: <span>`+moment(value.ngayhh).format("DD/MM/YYYY")+`</span></small>
                                        </p>

                        </div>
                           
                      
                    </td>
                    <td>
                     
                   
                      <div class="d-flex justify-content-between">`+
                       
                               edit+
                          `<a class="btn btn-outline-danger"
                                  href="{{url('sanpham/')}}/`+value.id+`">View</a>
                                  <div>
                       
                    </td>
                </tr>`;
                table.html(html);
            })
          }
          }
        
      })
    })
    $('#btn-search').click(function(){
      $.ajax({
        url:"{{url('fill-search')}}",
        data:{
          searchval: $('#search').val(),
          _token:token
        },
        type:"post",
        success:function(response){
            if(response.error){
              alert("Error");
            }else{
           
              var table=$(document.getElementById('tablebody'));
							table.empty();
              $.each(response.response,function(key,value){
                edit="";
                if(value.ngdang==auth){
                        
                      edit=  `<a class="btn btn-outline-primary"

                                href="{{url('suabai/')}}/`+value.id+`>Edit</a>`;}
              
              html=`              <tr class="mb-1">
                   <td><a href="{{url('sanpham/')}}/`+value.id+`"><img  alt="postimage" style="  max-width: 250px;max-height: 300px;"
                   src="{{url('/mathanganh/')}}/`+value.loadanh[0].name+`"
                   /></a></td>
                   
                   <td>
                        <div  class="d-flex  flex-column">
                           <a href="{{url('sanpham/')}}/`+value.id+`" target="_blank" style="font-size: 20px;font-weight: bold !important;">`+value.title+`</a>
               
                           <p class="bg-transparent bg-gradient text-black-50">
                             <small>
                                            <a class="name" href="{{url('nguoidang/post')}}" target="_blank" >Người đăng:`+(value.ngdang?value.ngdang[0].Name:'')+`</a>
                                            <em>|</em>
                                            <a href="{{url('allpost?type=loai&value=')}}`+value.loai+`" target="_blank">Loại:`+value.loai+`</a>
                                            <br>
                                            <span id="rate">Rate:`+value.rate+`*</span>
                                            <em>|</em>
                                            <span id="vé" >Số vé đã mua: `+value.damua+`</span>
                                            <em>|</em>
                                            <span id="gia" >Giá:`+value.gia+`</span>
                              </small>
                                        </p>
                                        <p class="intro"  style="font-size: 18px;">
                                        <span>`+value.thongtin+`</span>

                                        </p>
                                        <p class="d-flex justify-content-around bg-transparent bg-gradient text-black-50"><small>Bắt đầu: <span>`+moment(value.ngaybd).format("DD/MM/YYYY")+`</span></small>
                                        <br>
                                        <small>Kết thúc: <span>`+moment(value.ngayhh).format("DD/MM/YYYY")+`</span></small>
                                        </p>

                        </div>
                           
                      
                    </td>
                    <td>
                     
                   
                      <div class="d-flex justify-content-between">`+
                       
                               edit+
                          `<a class="btn btn-outline-danger"
                                  href="{{url('sanpham/')}}/`+value.id+`">View</a>
                                  <div>
                       
                    </td>
                </tr>`;
                table.html(html);
            })
          }
          }
        
      })
    })

  })
</script>

@endsection
