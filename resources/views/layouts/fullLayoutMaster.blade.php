<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
{{-- pageConfigs variable pass to Helper's updatePageConfig function to update page configuration  --}}
@isset($pageConfigs)
  {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
// confiData variable layoutClasses array in Helper.php file.
  $configData = Helper::applClasses();
@endphp

<html class="no-js" >

	<head>
		<!-- META DATA -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

<!-- TITLE OF SITE -->

<!-- favicon img -->
<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>

<!--font-awesome.min.css-->
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />

<!--animate.css-->
<link rel="stylesheet" href="{{asset('css/animate.css')}}" />

<!--hover.css-->
<link rel="stylesheet" href="{{asset('css/hover-min.css')}}" />

<!--datepicker.css-->
<link rel="stylesheet"  href="{{asset('css/datepicker.css')}}" />

<!--owl.carousel.css-->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" />

<!-- range css-->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" />

<!--bootstrap.min.css-->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

<!-- bootsnav -->
<link rel="stylesheet" href="{{asset('css/bootsnav.css')}}" />

<!--style.css-->
<link rel="stylesheet" href="{{asset('css/style.css')}}" />

<!--responsive.css-->
<link rel="stylesheet" href="{{asset('css/responsive.css')}}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title') - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{asset('images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/ico/favicon.ico')}}">

    {{-- Include core + vendor Styles --}}
    @include('panels.styles')
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body>
  <header class="top-area">
			<div class="header-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="logo">
								<a href="{{url('/')}}">
									Du <span>lịch</span>
								</a>
							</div><!-- /.logo-->
						</div><!-- /.col-->
						<div class="col-sm-10">
							<div class="main-menu">
							
								<!-- Brand and toggle get grouped for better mobile display -->
						
								<div class="d-flex justify-content-start">		  
									<ul class="nav  d-flex justify-content-start">
										<li ><a href="{{url('/')}}">home</a></li>
										<li ><a href="{{url('/')}}#diemden">Điểm đến</a></li>		
                    <li ><a href="{{url('/')}}#toprate">TOP RATE</a></li>									
										<li ><a href="{{url('/allpost')}}">Sản phẩm </a></li>
										<li class="dropdown dropdown-user  nav-item">
											@if(Auth::user())
											<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
											<div class="user-nav d-lg-flex d-none">
												<span class="user-name">{{Auth::user()->Name}}</span><span class="user-status">{{Auth::user()->loai==1?"-Guest":"-Bussiness"}}</span>
											</div>
											
											</a>
											
											@else
											<a href="{{url('/login')}}" >
											<div class="user-nav d-lg-flex d-none">
												<span class="user-name">Đăng nhập/Đăng ký</span><span class="user-status"></span>
											</div>
											</a>
											@endif
										
										</li>
										<li>
                    @if(Auth::user())
										@if(Auth::user()->loai==2)
												<a class="book-btn " href="{{url('/dangbai')}}"><i class="bx bx-envelope mr-50"></i> Đăng bài</a>
											
										@endif
                    @endif
										</li>
										@if(Auth::user())
										<li>
									
										<a href="{{url('auth/logout')}}" >
											<div class="user-nav d-lg-flex d-none">
												<span class="user-name">Logout</span><span class="user-status"></span>
											</div>
											</a>
											
										
										</li>
										@endif
										
										<!--/.project-btn--> 
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.main-menu-->
						</div><!-- /.col-->
					</div><!-- /.row -->
					<div class="home-border"></div><!-- /.home-border-->
				</div><!-- /.container-->
			</div><!-- /.header-area -->

		</header><!-- /.top-area-->
		<!-- main-menu End -->
		<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
			your browser</a> to improve your experience and security.</p>
		<![endif]-->
<!-- Column selectors with Export Options and print table -->
<!--about-us start -->
<section id="home" class="about-us" style=" background-image: url({{asset('images/banner/big_img.jpg')}})">
			<div class="container">
				<div class="about-us-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="single-about-us">
								<div class="about-us-txt">
									<h2>
										Hãy cứ đi, đi và thực hiện ước mơ của bạn

									</h2>
									<div class="about-btn">
										<a  class="about-view" href="{{url('/allpost')}}">
											explore now
                </a >
									</div><!--/.about-btn-->
								</div><!--/.about-us-txt-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
						<div class="col-sm-0">
							<div class="single-about-us">
								
							</div><!--/.single-about-us-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.about-us-content-->
			</div><!--/.container-->

		</section><!--/.about-us-->
		<!--about-us end -->
<section >

		

    <!-- BEGIN: Content-->

         @yield('content')
        
    <!-- END: Content-->

    {{-- scripts --}}
    @include('panels.scripts')

  </body>
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
  <div style="margin:50px"></div>
  @include('panels.footer')
  <!-- END: Body-->
</html>
