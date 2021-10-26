@extends('layouts.contentLayoutMaster')
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
    </style>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">


       
            

            <table class="table table-bordered">

              <tbody>
                @foreach($data as $key=>$value)
               <tr>
                   <td><img  alt="postimage" src="{{asset('mathanganh/'.$value->loadanh?($value->loadanh->first()?$value->loadanh->first()->name:''):'')}}"/></td>
                   <td>
                        <div  class="d-flex  flex-column">
                           <span  style="font-weight: bold !important;">{{$value->title}}</span>
               
                           
                            <span>{{$value->thongtin}}</span>
                        </div>
                           
                      
                    </td>
                    <td>
                          <button type="button" class="btn btn-outline-primary"
                                  href="{{url('suabai/'.$value->id)}}">Edit</button>
                          <button type="button" class="btn btn-outline-danger"
                                  href="{{url('suabai/'.$value->id)}}">View</button>
                       
                    </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
              
            
  
</section>
<!-- Column selectors with Export Options and print table -->


@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')

@endsection
{{-- page scripts --}}
@section('page-scripts')


@endsection
