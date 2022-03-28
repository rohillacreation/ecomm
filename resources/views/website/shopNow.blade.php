<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<title>Creto - Shop</title>
	<!-- =================== META =================== -->
	<!-- =================== STYLE =================== -->
	<link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap-grid.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body id="home">
	<!--================ PRELOADER ================-->
	<div class="preloader-cover">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!--============== PRELOADER END ==============-->
	@include('website.includes.header')
	<!-- ================ HEADER-TITLE ================ -->
	<section class="s-header-title">
		<div class="container">
			<h1>Shop</h1>
			<ul class="breadcrambs">
				<li><a href="index.html">Home</a></li>
				<li>Shop</li>
			</ul>
		</div>
	</section>
	<!-- ============== HEADER-TITLE END ============== -->

	<!-- ============== S-SINGLE-PRODUCT ============== -->
	<section class="s-single-product">
		<div class="container">
			<div class="row">
				@foreach($data['product'] as $product)
				<div class="col-12 col-md-5">
					<!--===== SLIDER-SINGLE-FOR =====-->
					<div class="slider-single-for">
						@foreach($data['images'] as $image)
						<div class="slide-single-for">
							<a href="{{asset('uploads/gallery/'.$image->location)}}" class="single-for-img" data-fancybox="prod1">
								<img src="{{asset('uploads/gallery/'.$image->location)}}" alt="img">
							</a>
						</div>
						@endforeach
					</div>
					<!--=== SLIDER-SINGLE-FOR END ===-->
					<!--===== SLIDER-SINGLE-NAV =====-->
					<div class="slider-single-nav">
						@foreach($data['images'] as $image)
						<div class="slide-single-nav">
							<div class="single-nav-img">
								<img src="{{asset('uploads/gallery/'.$image->location)}}" alt="img">
							</div>
						</div>
						@endforeach
					</div>
					<!--=== SLIDER-SINGLE-NAV END ===-->
				</div>
				<div class="col-12 col-md-7 single-shop-left">
					<h2 class="title">{{$product->name}}</h2>
					<div class="single-price">
						<div class="new-price">{{$product->price}}</div>

					</div>

					<div class="frame-size">
						<label>Color</label>
						<ul>
							@foreach($data['colors'] as $color)
							<li class="active"> {{$color->color}}</li>
							@endforeach
						</ul>
					</div>
					<div class="single-btn-cover">
						<a href="{{asset('product/'.$product->id)}}" class="btn btn-buy-now"><span>buy now</span></a>
						<a href="#" class="btn btn-wishlist"><span>add to wishlist</span></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- ============ S-SINGLE-PRODUCT END ============ -->

	<!--=============== SINGLE-SHOP-TABS ===============-->
	<section class="single-shop-tabs">
		<div class="container">
			<div class="tab-wrap">
				<ul class="tab-nav product-tabs">
					<li class="item" rel="tab1"><span>Description</span></li>
					<li class="item" rel="tab2"><span>Reviews(2)</span></li>
				</ul>
				<div class="tabs-content">
					<div class="tab tab1">
						<div class="row">
							<div class="col-lg-6">
								<p><?php echo $data['product'][0]->description; ?></p>
								<ul class="description-toggle">
									<li>
										<span class="title">main configuration <i class="fa fa-angle-down" aria-hidden="true"></i></span>
										<ul class="description-toggle-info">
											<li>Frame Size: <span>26</span></li>
											<li>Class: <span>City</span></li>
											<li>Number of speeds <span>7</span></li>
											<li>Type: <span>Rigid</span></li>
											<li>Country registration: <span>USA</span></li>
										</ul>
									</li>
									<li>
										<span class="title">Drive <i class="fa fa-angle-down" aria-hidden="true"></i></span>
										<ul class="description-toggle-info">
											<li>Frame Size: <span>26</span></li>
											<li>Class: <span>City</span></li>
											<li>Number of speeds <span>7</span></li>
											<li>Type: <span>Rigid</span></li>
											<li>Country registration: <span>USA</span></li>
										</ul>
									</li>
									<li>
										<span class="title">Wheelset <i class="fa fa-angle-down" aria-hidden="true"></i></span>
										<ul class="description-toggle-info">
											<li>Frame Size: <span>26</span></li>
											<li>Class: <span>City</span></li>
											<li>Number of speeds <span>7</span></li>
											<li>Type: <span>Rigid</span></li>
											<li>Country registration: <span>USA</span></li>
										</ul>
									</li>
									<li>
										<span class="title">Special <i class="fa fa-angle-down" aria-hidden="true"></i></span>
										<ul class="description-toggle-info">
											<li>Frame Size: <span>26</span></li>
											<li>Class: <span>City</span></li>
											<li>Number of speeds <span>7</span></li>
											<li>Type: <span>Rigid</span></li>
											<li>Country registration: <span>USA</span></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="col-lg-6">
								<div class="single-video">
									<a href="#" class="popup-open play_video btn-video" rel="action1" style="background-image: url({{asset('assets/img/bg-section-banner.jpg')}});"><i class="fa fa-play" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="tab tab2">
						<ul class="reviews-list">
							<li class="item">
								<div class="review-item">
									<div class="review-avatar"><img src="{{asset('assets/img/about-team-4.jpg')}}" alt="img"></div>
									<div class="review-content">
										<div class="name">Sam Piters</div>
										<div class="date">Dec 26, 2019</div>
										<p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis cupiditate vel dicta animi nostrum delectus at doloremque nam eligendi unde! Nulla temporibus ut, libero, architecto tempora impedit ipsa mollitia unde.</p>
										<a href="#" class="review-btn"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
									</div>
								</div>
								<ul class="child">
									<li class="item">
										<div class="review-item">
											<div class="review-avatar"><img src="{{asset('assets/img/about-team-4.jpg')}}" alt="img"></div>
											<div class="review-content">
												<div class="name">Anna Smith</div>
												<div class="date">Dec 27, 2019</div>
												<p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla eligendi a cum corporis, minus reprehenderit quo aut at, quas quisquam?</p>
												<a href="#" class="review-btn"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a>
											</div>
										</div>
									</li>
								</ul>
							</li>
						</ul>
						<div class="reviews-form">
							<h3 class="title">Leave a Comment</h3>
							<form action="/">
								<ul class="form-cover">
									<li class="inp-name"><input type="text" name="your-name" placeholder="Name"></li>
									<li class="inp-email"><input type="email" name="your-email" placeholder="E-mail"></li>
									<li class="inp-text"><textarea name="your-text" placeholder="Message"></textarea></li>
								</ul>
								<div class="checkbox-wrap">
									<div class="checkbox-cover">
										<input type="checkbox">
										<p>By using this form you agree with the storage and handling of your data by this website.</p>
									</div>
								</div>
								<div class="btn-form-cover">
									<button type="submit" class="btn"><span>submit comment</span></button>
								</div>
							</form>
						</div>
					</div>
					<div class="tab tab3">
						<div class="faq-item">
							<h5 class="title"><span>I already own a bike. Why do I need bike share?</span></h5>
							<p>The power of enabling one-way trips rather than a forced round trip due to having a personal vehicle is transformative. Bike share opens up mobility options that weren’t previously convenient and makes public transit more viable. It also enables greater access to multi-modal trips where you may use bike share for the first part of your trip, but may take the trolley, a car service or even catch a ride with a friend on the way home.</p>
						</div>
						<div class="faq-item">
							<h5 class="title"><span>Tell me about the bikes.</span></h5>
							<p>Our smart-bikes from Social Bicycles (SoBi) have brains! This sets them apart from other bike-share systems. On the back of the bike is a GPS-enabled, solar-powered panel with an on-board lock.</p>
							<p>With this panel, you can check out the bike, unlock and lock it, put it on hold and report a problem. It will even let you know how many miles you rode and how many calories you burned by logging into your Social Bicycles account.</p>
							<p>One of our favorite features on our bikes is the chainless shaft drive. You won’t have to worry about your pants getting caught or getting greasy! They also have nifty extras like 3 speeds, an adjustable seat post, front and rear lights that illuminate automatically, a large, full-sized basket, puncture resistant tires and a bell (just above the left hand grip – give it a turn!).</p>
						</div>
						<div class="faq-item">
							<h5 class="title"><span>What are Coast Hub Stations and Park and Go racks?</span></h5>
							<p>A Coast Hub station is where you go to find, check out and return a bike. It’s equipped with bikes and racks that the bikes are locked to.</p>
							<p>Locking outside of a station will incur a $3 convenience fee. You’ll also see designated Park and Go racks at businesses around town. This is free Coast parking, so feel free to park here as well!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--============= SINGLE-SHOP-TABS END =============-->

	<!--=============== RELATED PRODUCTS ===============-->
	<section class="s-related-products">
		<div class="container">
			<h2 class="title">Related Products</h2>
			<div class="row product-cover">


				@if(isset($data['suggested_product']))
				@foreach($data['suggested_product'] as $product)
				<div class="col-sm-6 col-lg-3">
					<div class="product-item">
						<!-- <span class="sale">11%</span> -->
						<ul class="product-icon-top">
							<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
							<li><i class="heart{{$product->id}} fa fa-heart" aria-hidden="true" id="{{$product->id}}"  onclick="wish(this.id)"></i></li>

						</ul>
						<a href="{{asset('uploads/gallery/'.$product->location)}}" class="product-img"><img src="{{asset('uploads/gallery/'.$product->location)}}" alt="product"></a>
						<div class="product-item-cover">
							<div class="price-cover">
								<i class="fa fa-rupee" style="font-size:24px; padding:10px"></i>
								<div class="new-price">{{$product->price}}</div>
								<!-- <div class="old-price">$1.799</div> -->
							</div>
							<h6 class="prod-title"><a href="{{asset('shopNow/'.$product->id)}}">{{$product->name}}</a></h6>
							<a href="{{asset('shopNow/'.$product->id)}}" class="btn"><span>buy now</span></a>
						</div>
						<!-- <div class="prod-info">
							<ul class="prod-list">
								<li>Frame Size: <span>17</span></li>
								<li>Class: <span>City</span></li>
								<li>Number of speeds: <span>7</span></li>
								<li>Type: <span>Rigid</span></li>
								<li>Country registration: <span>USA</span></li>
							</ul>
						</div> -->
					</div>
				</div>
				@endforeach

				@endif

			</div>
		</div>
	</section>
	<!--============= RELATED PRODUCTS END =============-->
	@include('website.includes.footer')
	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>
	<!--=================== TO TOP END ===================-->


	<!--=================== POPUP VIDEO ===================-->
	<div class="overlay close_vid"></div>
	<div class="popup popup-action1 popup-wideo">
		<div class="popup-close close_vid"></div>
		<div class="popup-video">
			<iframe src="{{asset('uploads/gallery/'.$product->video)}}" allowfullscreen id="video-modal"></iframe>
		</div>
	</div>
	<!--================ POPUP VIDEO END ================-->
	<!--=================== SCRIPT	===================-->



	<script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
	<script src="{{asset('assets/js/slick.min.js')}}"></script>
	<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
	<script src="{{asset('assets/js/jquery.nice-select.js')}}"></script>
	<script src="{{asset('assets/js/jquery.fancybox.js')}}"></script>
	<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>

</html>