@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title',"User's Dashboard")

@section('vendor-styles')

@endsection

@section('content')
<style type="text/css">

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
          <img class="img-fluid" src="{{asset('images/login_banner/b1.jpg')}}" alt="First slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/b2.jpg')}}" alt="2 slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/b3.jpg')}}" alt="3 slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/b4.jpg')}}" alt="4 slide"
          style="width:1250px;height:300px;">
        </div>
        <div class="carousel-item">
          <img class="img-fluid" src="{{asset('images/login_banner/b5.jpg')}}" alt="5 slide"
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
          <div class="col-7">
            <h6>Lượt mua vé</h6>
            <table class="table">

            <tbody>
              @foreach($topmua as $key=>$value)
            <tr class="mb-1">
                   <td><img  alt="postimage" style="  max-width: 150px;max-height: 200px;"
                   src="{{asset('mathanganh/'.$value->loadanh?($value->loadanh->first()?$value->loadanh->first()->name:''):'')}}"
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
        <div class="card-body col-4">
          <div class="col-7">
            <h6>Đánh giá tốt</h6>
            <table class="table">

            <tbody>
              @foreach($toprate as $key=>$value)
            <tr class="mb-1">
                  <td><img  alt="postimage" style="  max-width: 150px;max-height: 200px;"
                  src="{{asset('mathanganh/'.$value->loadanh?($value->loadanh->first()?$value->loadanh->first()->name:''):'')}}"
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
        <div class="card-body col-4">
          <div class="col-7">
            <h6>Giá rẻ</h6>
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
