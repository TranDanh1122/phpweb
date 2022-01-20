@extends('layouts.fullLayoutMaster')
{{-- title --}}
@section('title',"Travel")

@section('vendor-styles')
	
@endsection
@section('page-styles')

@endsection
@section('content')
<style type="text/css">
.checked {
  color: orange;
}



</style>
<!-- main-menu Start -->




		<!--travel-box start-->
		<section  class="travel-box">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-12">
        				<div class="single-travel-boxes">
        					<div id="desc-tabs" class="desc-tabs">

								<ul class="nav nav-tabs" role="tablist">

									<li role="presentation" class="active">
									 	<a href="#tours" aria-controls="tours" role="tab" data-toggle="tab">
									 		<i class="fa fa-tree"></i>
									 		Miền bắc
									 	</a>
									</li>

									<li role="presentation">
										<a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">
											<i class="fa fa-building"></i>
											Miền Trung
										</a>
									</li>

									<li role="presentation">
									 	<a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">
									 		<i class="fa fa-plane"></i>
									 		Miền Nam
									 	</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">

									<div role="tabpanel" class="tab-pane active fade in" id="tours">
										<div class="tab-para">

											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12"style="   background-size: cover;  height: 200px;background-image: url({{asset('mathanganh/'.$mienbac->loadanh->first()->name)}})" >
													
												</div><!--/.col-->

												<div class="col-lg-4 col-md-6 col-sm-8">
													<div class="single-tab-select-box">
													<h2> 	<a href="{{url('/sanpham/')}}/{{$mienbac->id}}">{{$mienbac->title}} </a></h2>
														<div >
															<p >
															{{$mienbac->thongtin}}
															</p>
														</div><!-- /.travel-check-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												
												

											</div><!--/.row-->


										</div><!--/.tab-para-->

									</div><!--/.tabpannel-->

									<div role="tabpanel" class="tab-pane fade in" id="hotels">
										<div class="tab-para">

										<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12"style="   background-size: cover;  height: 200px;background-image: url({{asset('mathanganh/'.$mientrung->loadanh->first()->name)}})" >
													
												</div><!--/.col-->

												<div class="col-lg-4 col-md-6 col-sm-8">
													<div class="single-tab-select-box">
													<h2> 	<a href="{{url('/sanpham/')}}/{{$mientrung->id}}">{{$mientrung->title}} </a></h2>
														<div >
															<p >
															{{$mientrung->thongtin}}
															</p>
														</div><!-- /.travel-check-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												
												

											</div><!--/.row-->


										</div><!--/.tab-para-->

									</div><!--/.tabpannel-->

									<div role="tabpanel" class="tab-pane fade in" id="flights">
										<div class="tab-para">
										<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12"style="   background-size: cover;  height: 200px;background-image: url({{asset('mathanganh/'.$miennam->loadanh->first()->name)}})" >
													
												</div><!--/.col-->

												<div class="col-lg-4 col-md-6 col-sm-8">
													<div class="single-tab-select-box">
													<h2> 	<a href="{{url('/sanpham/')}}/{{$miennam->id}}">{{$miennam->title}} </a></h2>
														<div >
															<p >
															{{$miennam->thongtin}}
															</p>
														</div><!-- /.travel-check-icon -->
													</div><!--/.single-tab-select-box-->
												</div><!--/.col-->

												
												

											</div><!--/.row-->


											
										</div>

									</div><!--/.tabpannel-->

								</div><!--/.tab content-->
							</div><!--/.desc-tabs-->
        				</div><!--/.single-travel-box-->
        			</div><!--/.col-->
        		</div><!--/.row-->
        	</div><!--/.container-->

        </section><!--/.travel-box-->
		<!--travel-box end-->



		<!--galley start-->
		<section id="diemden" class="gallery">
			<div class="container">
				<div class="gallery-details">
					<div class="gallary-header text-center">
						<h2>
							Top điểm đến
						</h2>
						<p>
							Những điểm đến nổi tiếng trong nước được nhiều du khách lựa chọn  
						</p>
					</div><!--/.gallery-header-->
					<div class="gallery-box">
						<div class="gallery-content">
						  	<div class="filtr-container">
						  		<div class="row">

						  			<div class="col-md-6">
						  				<div class="filtr-item">
											<img src="{{asset('/images/banner/sapa.jpg')}}" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													Sapa
												</a>
											
											</div><!-- /.item-title -->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-6">
						  				<div class="filtr-item">
											<img src="{{asset('/images/banner/dannang.jpg')}}" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													Đà nẵng
												</a>
											
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-4">
						  				<div class="filtr-item">
											<img src="{{asset('/images/banner/nhatrang.jpg')}}" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													Nha Trang
												</a>
											
											</div><!-- /.item-title -->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-4">
						  				<div class="filtr-item">
											<img src="{{asset('/images/banner/dalat.jpg')}}" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													Đà Lạt 
												</a>
												
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-4">
						  				<div class="filtr-item">
											<img src="{{asset('/images/banner/sai-gon.jpg')}}" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													TP HCM
												</a>
											
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  			<div class="col-md-12">
						  				<div class="filtr-item">
											<img src="{{asset('/images/banner/can-tho.png')}}" alt="portfolio image"/>
											<div class="item-title">
												<a href="#">
													Cần Thơ
												</a>
												
											</div> <!-- /.item-title-->
										</div><!-- /.filtr-item -->
						  			</div><!-- /.col -->

						  		</div><!-- /.row -->

						  	</div><!-- /.filtr-container-->
						</div><!-- /.gallery-content -->
					</div><!--/.galley-box-->
				</div><!--/.gallery-details-->
			</div><!--/.container-->

		</section><!--/.gallery-->
		<!--gallery end-->



		<!--packages start-->
		<section id="toprate" class="packages">
			<div class="container">
				<div class="gallary-header text-center">
					<h2>
						Top ratting
					</h2>
					<p>
						Những điểm du lịch được đánh giá tốt nhất

					</p>
				</div><!--/.gallery-header-->
				<div class="packages-content">
					<div class="row">
					@foreach($topmua as $item)
						<div class="col-md-4 col-sm-6">
							
							<div class="single-package-item">
								<img src="{{asset('mathanganh/'.$item->loadanh->first()->name)}}" style="height:350px;width:500px" alt="package-place">
								<div class="single-package-item-txt">
									<h3> {{$item->title}} <span class="pull-right">{{$item->gia}}<small>đ</small> </span></h3>
									<div class="packages-para">
										<p>
											<span>
												<i class="fa fa-angle-right"></i> {{$item->lienhe}}
											</span>
											<i class="fa fa-angle-right"></i>  {{$item->loai}}
										</p>
										
									</div><!--/.packages-para-->
									<div >
										
										@for($i=1;$i <= 5;$i++)
										<span class="fa fa-star {{$i<=$item->rate?'checked':''}}"></span>
									
										@endfor
									
									</div><!--/.packages-review-->
									<div class="about-btn">
										<a  class="about-view packages-btn" href="{{url('/sanpham/')}}/{{$item->id}}">
											book now
										</a>
									</div><!--/.about-btn-->
								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->
							@endforeach
						
					</div><!--/.row-->
				</div><!--/.packages-content-->
			</div><!--/.container-->

		</section><!--/.packages-->
		<!--packages end-->

		


		<!--special-offer start-->
		<section id="spo" class="special-offer" style="   background-size: cover;  background-image: url({{asset('mathanganh/'.$miennam->loadanh->first()->name)}})" >
			<div class="container">
				<div class="special-offer-content">
					<div class="row">
						<div class="col-sm-8">
							<div class="single-special-offer">
								<div class="single-special-offer-txt">
									<h2>{{$topgiare->title}}</h2>
									<div>
									@for($i=1;$i <= 5;$i++)
										<span class="fa fa-star {{$i<=$topgiare->rate?'checked':''}}"></span>
									
										@endfor
									</div><!--/.packages-review-->
									<div class="packages-para special-offer-para">
										<p>
											<span>
												<i class="fa fa-angle-right"></i> {{$topgiare->lienhe}}
											</span>
											<span>
												<i class="fa fa-angle-right"></i> {{$topgiare->loai}}
											</span>
											
										</p>
										<p>
											<span>
												<i class="fa fa-angle-right"></i>  {{$topgiare->diachi1}}
											</span>
											<span>
												<i class="fa fa-angle-right"></i> {{$topgiare->diachi2}}
											</span>  
										</p>
										<p class="offer-para">
										{{substr($topgiare->thongtin,0,100)}}
										</p>
									</div><!--/.packages-para-->
									<div class="offer-btn-group">
										
										<div class="about-btn">
											<a  href="{{url('/sanpham/')}}/{{$topgiare->id}}" class="about-view packages-btn">
												book now
											</a>
										</div><!--/.about-btn-->
									</div><!--/.offer-btn-group-->
								</div><!--/.single-special-offer-txt-->
							</div><!--/.single-special-offer-->
						</div><!--/.col-->
						<div class="col-sm-4">
							<div class="single-special-offer">
								<div class="single-special-offer-bg">
									<img src="{{asset('/images/banner/offer-shape.png')}}" alt="offer-shape">
								</div><!--/.single-special-offer-bg-->
								<div class="single-special-shape-txt">
									<h3>special offer</h3>
									<h4><span>40%</span><br>off</h4>
									<p><span>{{$topgiare->gia}}</span><br>CHỉ có {{$topgiare->soluong}} vé</p>
								</div><!--/.single-special-shape-txt-->
							</div><!--/.single-special-offer-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.special-offer-content-->
			</div><!--/.container-->

		</section><!--/.special-offer end-->
		<!--special-offer end-->

		<!--blog start-->
	
	<section>
		<div class="row"></div>
	</section>
		
		<!--subscribe start-->
		<section id="subs" class="subscribe" style=" margin-top:50px;   background-size: cover;  background-image: url({{asset('images/banner/submit.jpg')}})">
			<div class="container">
				<div class="subscribe-title text-center">
					<h2 >
						Cảm ơn đã ghé thăm website của chúng tôi
					</h2>
					<p>
						Hãy để lại bình luận, đánh giá cũng như tố cáo những sản phẩm không tốt để giúp chúng tôi hoàn thiện hơn
					</p>
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
