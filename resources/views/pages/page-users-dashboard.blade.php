@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title',"User's Dashboard")

@section('vendor-styles')

@endsection
@section('page-styles')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<style type="text/css">
.checked {
  color: orange;
}
</style>

<section >
    <div class="row justify-content-center" >
  <div class="col-lg-12 d-md-block text-center align-self-center pl-0 pr-0 pb-1 bg-white">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
        <li data-target="#carousel-example-generic" data-slide-to="5"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="img-fluid" src="{{asset('images/login_banner/11.jpg')}}" alt="First slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/22.jpg')}}" alt="2 slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/33.jpg')}}" alt="3 slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/44.jpg')}}" alt="4 slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/55.jpg')}}" alt="5 slide"
          style="width:1250px;height:300px;">
        </div>

      </div>
      <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-- end slide -->

  <div class="col-lg-12 mt-1">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Xếp hạng</h5>
        </div>
        <hr></hr>
        <div class="row">
        <div class="card-body col-4">
          <div class="col-12">
            <h6>Lượt mua vé</h6>
            <table class="table">

            <tbody>
              @foreach($topmua as $key=>$value)
              @if($key==0)
            <tr class="mb-1">
                  <td><img  alt="postimage" style="  max-width: 150px;max-height: 200px;"
                  src="{{asset('mathanganh/'.$value->loadanh->first()->name)}}"
                  /></td>
                  
                  <td>
                        <div  class="d-flex  flex-column">
                          <a href="{{url('sanpham/'.$value->id)}}" target="_blank" style="cursor:pointer;font-size: 20px;font-weight: bold !important;">{{$value->title}}</a>
              
                          <p class="bg-transparent bg-gradient text-black-50">
                            <small>           
                               <span id="luotmua" >{{$value->damua}}</span>                  
                              </small>
                            </p>
                                        <!-- <p class="intro"  style="font-size: 18px;">
                                        <span>{{$value->thongtin}}</span>

                                        </p>
                                        <p class="d-flex justify-content-around bg-transparent bg-gradient text-black-50"><small>Bắt đầu: <span>{{date("d/m/Y",strtotime($value->ngaybd))}}</span></small>
                                        <br>
                                        <small>Kết thúc: <span>{{date("d/m/Y",strtotime($value->ngayhh))}}</span></small>
                                        </p> -->

                        </div>
                          
                      
                    </td>
                  
                </tr>
                @else
                <tr>

                  <td colspan="2">
                    <div class="d-flex justify-content-between">
                    <a href="{{url('sanpham/'.$value->id)}}" target="_blank" style="cursor:pointer;font-size: 14px;font-weight: bold !important;">{{$value->title}}</a>
                    <small>{{$value->damua}}</small>
                    </div>
                 </td>
                </tr>
                @endif
              
                @endforeach
               

                
              </tbody>
            </table>
          </div>
          
        
        </div>
        <div class="card-body col-4">
          <div class="col-12">
            <h6>Đánh giá tốt</h6>
            <table class="table">

            <tbody>
              @foreach($toprate as $key=>$value)
              @if($key==0)
            <tr class="mb-1">
                  <td><img  alt="postimage" style="  max-width: 150px;max-height: 200px;"
                  src="{{asset('mathanganh/'.$value->loadanh->first()->name)}}"
                  /></td>
                  
                  <td>
                        <div  class="d-flex  flex-column">
                          <a href="{{url('sanpham/'.$value->id)}}" target="_blank" style="cursor:pointer;font-size: 20px;font-weight: bold !important;">{{$value->title}}</a>
              
                         

                         
                                    <div  class="d-flex  flex-column">
                                        <div style="float: right;"> 
                                        @for($i=1;$i <= 5;$i++)
                                        @if($i<=$value->rate)
                                        <span class="fa fa-star checked"></span>
                                        @else
                                        <span class="fa fa-star "></span>
                                        @endif
                                        @endfor
                                        </div>
                                        
                                    </div>
                               
                            <small>           
                               <span id="luotmua" >{{$value->rate}}</span>                  
                              </small>
                           

                                        <!-- <p class="intro"  style="font-size: 18px;">
                                        <span>{{$value->thongtin}}</span>

                                        </p>
                                        <p class="d-flex justify-content-around bg-transparent bg-gradient text-black-50"><small>Bắt đầu: <span>{{date("d/m/Y",strtotime($value->ngaybd))}}</span></small>
                                        <br>
                                        <small>Kết thúc: <span>{{date("d/m/Y",strtotime($value->ngayhh))}}</span></small>
                                        </p> -->

                        </div>
                          
                      
                    </td>
                  
                </tr>
                @else
                <tr>

                  <td colspan="2">
                    <div class="d-flex justify-content-between">
                    <a href="{{url('sanpham/'.$value->id)}}" target="_blank" style="cursor:pointer;font-size: 14px;font-weight: bold !important;">{{$value->title}}</a>
                    <small>{{$value->rate}}</small>
                    </div>
                 </td>
                </tr>
                @endif
                 @endforeach
              

                
              </tbody>
            </table>
          </div>
         
        
        </div>
        <div class="card-body col-4">
          <div class="col-12">
            <h6>Giá rẻ</h6>
            <table class="table">

            <tbody>
              @foreach($topgiare as $key=>$value)
              @if($key==0)
            <tr class="mb-1">
                  <td><img  alt="postimage" style="  max-width: 150px;max-height: 200px;"
                  src="{{asset('mathanganh/'.$value->loadanh->first()->name)}}"
                  /></td>
                  
                  <td>
                        <div  class="d-flex  flex-column">
                          <a href="{{url('sanpham/'.$value->id)}}" target="_blank" style="cursor:pointer;font-size: 20px;font-weight: bold !important;">{{$value->title}}</a>
              
                          <p class="bg-transparent bg-gradient text-black-50">
                            <small>           
                               <span id="luotmua" >{{$value->gia}}</span>                  
                              </small>
                            </p>
                                        <!-- <p class="intro"  style="font-size: 18px;">
                                        <span>{{$value->thongtin}}</span>

                                        </p>
                                        <p class="d-flex justify-content-around bg-transparent bg-gradient text-black-50"><small>Bắt đầu: <span>{{date("d/m/Y",strtotime($value->ngaybd))}}</span></small>
                                        <br>
                                        <small>Kết thúc: <span>{{date("d/m/Y",strtotime($value->ngayhh))}}</span></small>
                                        </p> -->

                        </div>
                          
                      
                    </td>
                  
                </tr>
                @else
                <tr>

                  <td colspan="2">
                    <div class="d-flex justify-content-between">
                    <a href="{{url('sanpham/'.$value->id)}}" target="_blank" style="cursor:pointer;font-size: 14px;font-weight: bold !important;">{{$value->title}}</a>
                    <small>{{$value->gia}}</small>
                    </div>
                 </td>
                </tr>
                @endif
              
                @endforeach
              

                
              </tbody>
            </table>
          </div>
          
        
        </div>
        </div>
      </div>
    </div>
    <!-- end xep hang -->

    <div class="col-lg-12 ">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Đề cử</h5>
        </div>
       <hr></hr>
        <div class="row">
        <div class="card-body col-5">
          <div class="col-7">
            <h6>Lượt mua vé</h6>
            <table class="table">

            <tbody>
              @foreach($topgiare as $key=>$value)
            <tr class="mb-1">
                  <td><img  alt="postimage" style="  max-width: 150px;max-height: 200px;"
                  src="{{url('mathanganh/'.$value->loadanh?($value->loadanh->first()?$value->loadanh->first()->name:''):'')}}"
                  /></td>
                  
                  <td>
                        <div  class="d-flex  flex-column">
                          <a ref="{{url('sanpham/'.$value->id)}}" target="_blank" style="font-size: 20px;font-weight: bold !important;">{{$value->title}}</a>
              
                          <p class="bg-transparent bg-gradient text-black-50">
                            <small>
                                          
                                          
                                            <span id="luotmua" >120</span>
                                            
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
                  
                </tr>
              
                @endforeach
              

                
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-2"></div>
        <div class="card-body col-5">
          <div class="col-7">
            <h6>Lượt mua vé</h6>
            <table class="table">

            <tbody>
              @foreach($topgiare as $key=>$value)
            <tr class="mb-1">
                  <td><img  alt="postimage" style="  max-width: 150px;max-height: 200px;"
                  src="{{url('mathanganh/'.$value->loadanh?($value->loadanh->first()?$value->loadanh->first()->name:''):'')}}"
                  /></td>
                  
                  <td>
                        <div  class="d-flex  flex-column">
                          <a ref="{{url('suabai/'.$value->id)}}" target="_blank" style="font-size: 20px;font-weight: bold !important;">{{$value->title}}</a>
              
                          <p class="bg-transparent bg-gradient text-black-50">
                            <small>
                                          
                                          
                                            <span id="luotmua" >120</span>
                                            
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
                  
                </tr>
              
                @endforeach
              

                
              </tbody>
            </table>
          </div>
         
        
        </div>
        </div>

    
 
</div>
</div>
</section>


@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')

@endsection
{{-- page scripts --}}
@section('page-scripts')

@endsection
