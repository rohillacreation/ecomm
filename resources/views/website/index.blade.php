<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<title>Creto</title>
	@include('website.includes.header')
</head>

<body id="home" class="inner-scroll">
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
	<!-- ================= HEADER ================= -->
	<header class="header">
		<a href="#" class="nav-btn">
			<span></span>
			<span></span>
			<span></span>
		</a>

		<!-- =============== main-slider =============== -->
		<section class="s-main-slider">
			<div class="main-slide-navigation"></div>
			<ul class="main-soc-list">
				<li><a href="https://www.facebook.com/rovadex">facebook</a></li>
				<li><a href="https://twitter.com/RovadexStudio">twitter</a></li>
				<li><a href="https://www.instagram.com/rovadex/">instagram</a></li>
			</ul>
			<div class="main-slider">
				<?php $i = 0; ?>
				@foreach($data['product'] as $product)

				@if($i++>9) @break
				@endif
				<div class="main-slide">
					<div class="main-slide-bg" style="background-image: url(assets/img/bg-slider.svg);"></div>
					<div class="container">
						<div class="main-slide-info">
							<h2 class="title">best bikes for you</h2>
							<p><?php echo $product->description ?></p>
							<a href="{{asset('/product/'.$product->id)}}" class="btn"><span>buy now</span></a>
						</div>
						<div class="slide-img-cover">
							<a href="single-shop.html" class="lable-bike">
								<div class="lable-bike-img">
									<img class="border-2 border-gray-300" src="{{asset('uploads/gallery/'.$product->location)}}" alt="var_image">
								</div>
								<div class="lable-bike-item">
									<div class="model">{{$product->name}}</div>
									<div class="price">{{$product->price}}</div>
								</div>
							</a>
							<img class="border-2 border-gray-300" style="height:250px" src="{{asset('uploads/gallery/'.$product->location)}}" alt="var_image">
						</div>


					</div>
				</div>

				@endforeach
			</div>
		</section>
		<!-- ============= main-slider end ============= -->




		<!--================ S-FIND-BIKE ================-->
		<section class="s-find-bike">
			<div class="container">
				<form class="find-bike-form" action="{{asset('/home_search')}}" method="post">
					@csrf
					<h2 class="title">find the bike</h2>
					<ul class="form-wrap">
						<li>

							<label>Type</label>
							<select class="nice-select id" id="type_select" onchange="type_ajex(this.value)" name="type">

								@foreach($data['cetegory'] as $cetegory)
								<option selected="selected" value="{{$cetegory->id}}">{{$cetegory->name}}</option>
								@endforeach
							</select>
						</li>
						<li>
							<label>brand</label>

							<input type="text" name="brand" list="brand_select" onchange="brand_ajex(this.value)" placeholder="All">
							<datalist class="" id="brand_select" name="brand">
								<option class="nice-select" value="None">All</option>

							</datalist>

						</li>
						<li>
							<label>color</label>
							<select class="slect_size id" id="color_select" name="color">
								<option class="nice-select" value="None">All</option>

							</select>
						</li>
						<li> <button class="btn" type="submit"> Search </button></li>
					</ul>
				</form>
			</div>
		</section>
		<!--============== S-FIND-BIKE END ==============-->


		<!--============== S-CATEGORY-BICYKLE ==============-->
		<section class="s-category-bicycle">
			<div class="container">
				<div class="slider-categ-bicycle">
					@foreach($data['cetegory'] as $cetegory)
					<div class="slide-categ-bicycle">
						<div class="categ-bicycle-item">
							<img src="{{asset('assets/img/categ-2.png')	}}" alt="category">
							<div class="categ-bicycle-info">
								<h4 class="title">{{$cetegory['name']}}</h4>
								<form action="{{asset('shop/'.$cetegory->id)}}" method="post">
									@csrf
									<button href="" class="btn"><span>view more</span></button>
								</form>
							</div>
						</div>
					</div>

					@endforeach


				</div>
			</div>
		</section>
		<!--============ S-CATEGORY-BICYKLE END ============-->

		<!--=============== S-OUR-ADVANTAGES ===============-->
		<section class="s-our-advantages" style="background-image: url(assets/img/bg-advantages.jpg);">
			<span class="mask"></span>
			<div class="container">
				<h2 class="title">Our Advantages</h2>
				<div class="our-advantages-wrap">
					<div class="our-advantages-item">
						<img class="lazy" src="{{asset('assets/img/placeholder-all.png')}}" data-src="{{asset('assets/img/advantages-1.svg')}}" alt="icon">
						<h5>Free shipping <br>from $500</h5>
					</div>
					<div class="our-advantages-item">
						<img class="lazy" src="{{asset('assets/img/placeholder-all.png')}}" data-src="{{asset('assets/img/advantages-1.svg')}}" alt="icon">
						<h5>Warranty service <br>for 3 months</h5>
					</div>
					<div class="our-advantages-item">
						<img class="lazy" src="{{asset('assets/img/placeholder-all.png')}}" data-src="{{asset('assets/img/advantages-1.svg')}}" alt="icon">
						<h5>Exchange and return <br>within 14 days</h5>
					</div>
					<div class="our-advantages-item">
						<img class="lazy" src="{{asset('assets/img/placeholder-all.png')}}" data-src="{{asset('assets/img/advantages-1.svg')}}" alt="icon">
						<h5>Discounts for <br>customers</h5>
					</div>
				</div>
			</div>
		</section>
		<!--============= S-OUR-ADVANTAGES END =============-->

		<!--================== S-PRODUCTS ==================-->
		<section class="s-products">
			<div class="container">
				<div class="tab-wrap">
					<div class="products-title-cover">
						<h2 class="title">our products</h2>
						<ul class="tab-nav product-tabs">
							<li class="item" rel="tab_all"><span>All</span></li>
							@foreach($data['cetegory'] as $cetegory)
							<li class="item" rel="tab{{$cetegory->id}}" onclick="second_cat(this.id)" id="{{$cetegory->id}}"><span>{{$cetegory->name}}</span></li>
							@endforeach
						</ul>
					</div>

					<div class="tabs-content">


						<div class="tab tab_all">
							<div class="row product-cover">


								@foreach($data['product'] as $product)
								<div class="col-sm-6 col-lg-3">
									<div class="product-item">
										<!-- <span class="top-sale">top sale</span> -->
										<ul class="product-icon-top">
											<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
											<li><i class="heart{{$product->id}} fa fa-heart" aria-hidden="true" id="{{$product->id}}"  onclick="wish(this.id)"></i></li>
										</ul>
										<a href="single-shop.html" class="product-img"><img class="lazy" src="{{asset('uploads/gallery/'.$product->location)}}" alt="product"></a>
										<div class="product-item-cover">
											<div class="price-cover">
												<div class="new-price"><i class="fa fa-inr" aria-hidden="true"> </i> {{$product->price}} </div>
												<!-- <div class="old-price">$1.799</div> -->
											</div>
											<h6 class="prod-title"><a href="single-shop.html">{{$product->name}}</a></h6>
											<a href="{{asset('/shopNow/'.$product->id)}}" class="btn"><span>buy now</span></a>
										</div>

									</div>
								</div>

								@endforeach
							

							</div>
							<p>
								{{ $data['product']->links('website.includes.pagination') }}
								</p>
						</div>
						<?php $i = 1; ?>


						@foreach($data['data_by_category'] as $cetegory_all_data)
						<div class="tab tab{{$i++}}">
							<div class="row product-cover">

								@foreach($cetegory_all_data as $product)
								<div class="col-sm-6 col-lg-3">
									<div class="product-item">
										<!-- <span class="top-sale">top sale</span> -->
										<ul class="product-icon-top">
											<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
											<li><i class="heart{{$product->id}} fa fa-heart" aria-hidden="true" id="{{$product->id}}"  onclick="wish(this.id)"></i></li>
										</ul>
										<a href="single-shop.html" class="product-img"><img class="lazy" src="{{asset('uploads/gallery/'.$product->location)}}" alt="product"></a>
										<div class="product-item-cover">
											<div class="price-cover">
												<div class="new-price"><i class="fa fa-inr" aria-hidden="true"> </i> {{$product->price}} </div>
												<!-- <div class="old-price">$1.799</div> -->
											</div>
											<h6 class="prod-title"><a href="single-shop.html">{{$product->name}}</a></h6>
											<a href="{{asset('/shopNow/'.$product->id)}}" class="btn"><span>buy now</span></a>
										</div>

									</div>
								</div>
								@endforeach
							</div>
						</div>
						@endforeach
						<!--  -->



					</div>
				</div>
		</section>
		<!--================ S-PRODUCTS END ================-->

		<!--================== S-SUBSCRIBE ==================-->
		<section class="s-subscribe" style="background-image: url(assets/img/bg-subscribe.jpg);">
			<span class="mask"></span>
			<span class="subscribe-effect wow fadeIn" data-wow-duration="1s" style="background-image: url(assets/img/subscribe-effect.svg);"></span>
			<div class="container">
				<div class="subscribe-left">
					<h2 class="title"><span>Subscribe</span></h2>
					<p>Subscribe us and you won't miss the new arrivals, as well as discounts and sales.</p>
					<form class="subscribe-form">
						<i class="fa fa-at" aria-hidden="true"></i>
						<input class="inp-form" type="email" name="subscribe" placeholder="E-mail">
						<button type="submit" class="btn btn-form btn-yellow"><span>send</span></button>
					</form>
				</div>
				<img class="wow fadeInRightBlur lazy" data-wow-duration=".8s" data-wow-delay=".3s" src="assets/img/placeholder-all.png" data-src="assets/img/subscribe-img.png" alt="img">
			</div>
		</section>
		<!--================ S-SUBSCRIBE END ================-->

		<!--================== S-TOP-SALE ==================-->
		<section class="s-top-sale">
			<div class="container">
				<h2 class="title">Top sale</h2>
				<div class="row product-cover">


					@foreach($data['product'] as $product)
					<div class="col-sm-6 col-lg-3">
						<div class="product-item">
							<!-- <span class="top-sale">top sale</span> -->
							<ul class="product-icon-top">
								<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
								<li><i class="heart{{$product->id}} fa fa-heart" aria-hidden="true" id="{{$product->id}}"  onclick="wish(this.id)"></i></li>
							</ul>
							<a href="single-shop.html" class="product-img"><img class="lazy" src="{{asset('uploads/gallery/'.$product->location)}}" alt="product"></a>
							<div class="product-item-cover">
								<div class="price-cover">
									<div class="new-price"><i class="fa fa-inr" aria-hidden="true"> </i> {{$product->price}} </div>
									<!-- <div class="old-price">$1.799</div> -->
								</div>
								<h6 class="prod-title"><a href="single-shop.html">{{$product->name}}</a></h6>
								<a href="{{asset('shopNow/'.$product->id)}}" class="btn"><span>buy now</span></a>
							</div>

						</div>
					</div>
					@endforeach

				</div>
				<p>
								{{ $data['product']->links('website.includes.pagination') }}
								</p>
			</div>
		</section>
		<!--================ S-FEEDBACK END ================-->

		<!--================== S-OUR-NEWS ==================-->
		<section class="s-our-news">
			<div class="container">
				<h2 class="title">Our News</h2>
				<div class="news-cover row">
					<div class="col-12 col-md-6 col-lg-4">
						<div class="news-item">
							<h6 class="title"><a href="news.html">doloremque laudantium, totam rem aperiam, eaque ipsa quae</a></h6>
							<div class="news-post-thumbnail">
								<a href="news.html"><img class="lazy" src="{{asset('assets/img/placeholder-all.png')}}" data-src="assets/img/news-1.jpg" alt="news"></a>
							</div>
							<div class="meta">
								<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> Dec 26,2019</span>
								<span class="post-by"><i class="fa fa-user" aria-hidden="true"></i> By <a href="#">Samson</a></span>
							</div>
							<div class="post-content">
								<p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque lauda ntium, totam rem aperiam, eaque.</p>
							</div>
							<a href="news.html" class="btn-news">read more</a>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="news-item">
							<h6 class="title"><a href="news.html">At vero eos et accusamus et iusto odio dignissimos ducim</a></h6>
							<div class="news-post-thumbnail">
								<a href="single-news.html"><img class="lazy" src="{{asset('assets/img/placeholder-all.png')}}" data-src="assets/img/news-2.jpg" alt="news"></a>
							</div>
							<div class="meta">
								<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> Dec 26,2019</span>
								<span class="post-by"><i class="fa fa-user" aria-hidden="true"></i> By <a href="#">Samson</a></span>
							</div>
							<div class="post-content">
								<p>Corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui.</p>
							</div>
							<a href="single-news.html" class="btn-news">read more</a>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4">
						<div class="news-item">
							<h6 class="title"><a href="news.html">On the other hand, we denounce with righteous indignation a</a></h6>
							<div class="news-post-thumbnail">
								<a href="news.html"><img class="lazy" src="{{asset('assets/img/placeholder-all.png')}}" data-src="assets/img/news-3.jpg" alt="news"></a>
							</div>
							<div class="meta">
								<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> Dec 26,2019</span>
								<span class="post-by"><i class="fa fa-user" aria-hidden="true"></i> By <a href="#">Samson</a></span>
							</div>
							<div class="post-content">
								<p>Blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those.</p>
							</div>
							<a href="single-news.html" class="btn-news">read more</a>
						</div>
					</div>
				</div>
				<div class="btn-cover"><a class="btn" href="news.html"><span>view more</span></a></div>
			</div>
		</section>
		<!--================ S-OUR-NEWS END ================-->

		<!--=================== S-CLIENTS ===================-->
		<section class="s-clients">
			<div class="container">
				<div class="clients-cover">
					<div class="client-slide">
						<div class="client-slide-cover">
							<img src="{{asset('assets/img/client-1.svg')}}" alt="img">
						</div>
					</div>
					<div class="client-slide">
						<div class="client-slide-cover">
							<img src="{{asset('assets/img/client-2.svg')}}" alt="img">
						</div>
					</div>
					<div class="client-slide">
						<div class="client-slide-cover">
							<img src="{{asset('assets/img/client-4.svg')}}" alt="img">
						</div>
					</div>
					<div class="client-slide">
						<div class="client-slide-cover">
							<img src="{{asset('assets/img/client-5.svg')}}" alt="img">
						</div>
					</div>
					<div class="client-slide">
						<div class="client-slide-cover">
							<img src="{{asset('assets/img/client-6.svg')}}" alt="img">
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--================= S-CLIENTS END =================-->

		<!--=================== S-BANNER ===================-->
		<section class="s-banner" style="background-image: url(assets/img/bg-section-banner.jpg);">
			<span class="mask"></span>
			<div class="banner-img">
				<div class="banner-img-bg wow fadeIn" data-wow-duration=".6s" style="background-image: url(assets/img/effect-section-banner.svg);"></div>
				<img class="lazy wow fadeInLeftBlur" data-wow-duration=".8s" data-wow-delay=".3s" src="assets/img/placeholder-all.png" data-src="assets/img/bike-banner.png" alt="img">
			</div>
			<div class="container">
				<h2 class="title">Hyper E-Ride Bike 700C</h2>
				<p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem.</p>
				<div class="banner-price">
					<div class="new-price">$1.699</div>
					<div class="old-price">$1.799</div>
				</div>
				<div id="clockdiv">
					<div>
						<span class="days"></span>
						<div class="smalltext">Days</div>
					</div>
					<div>
						<span class="hours"></span>
						<div class="smalltext">Hours</div>
					</div>
					<div>
						<span class="minutes"></span>
						<div class="smalltext">Minutes</div>
					</div>
					<div>
						<span class="seconds"></span>
						<div class="smalltext">Seconds</div>
					</div>
				</div>
			</div>
		</section>
		<!--================= S-BANNER END =================-->

		<!--================== S-INSTAGRAM ==================-->
		<section class="s-instagram">
			<div class="instagram-cover">
				<a href="#" class="instagram-item">
					<ul>
						<li class="comments">234 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
						<li class="like">134 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
					</ul>
					<img class="lazy" src="assets/img/placeholder-all.png" data-src="assets/img/instagram-1.jpg" alt="img">
				</a>
				<a href="#" class="instagram-item">
					<ul>
						<li class="comments">222 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
						<li class="like">118 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
					</ul>
					<img class="lazy" src="assets/img/placeholder-all.png" data-src="assets/img/instagram-2.jpg" alt="img">
				</a>
				<a href="#" class="instagram-item">
					<ul>
						<li class="comments">224 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
						<li class="like">124 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
					</ul>
					<img class="lazy" src="assets/img/placeholder-all.png" data-src="assets/img/instagram-3.jpg" alt="img">
				</a>
				<a href="#" class="instagram-item">
					<ul>
						<li class="comments">155 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
						<li class="like">107 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
					</ul>
					<img class="lazy" src="assets/img/placeholder-all.png" data-src="assets/img/instagram-4.jpg" alt="img">
				</a>
				<a href="#" class="instagram-item">
					<ul>
						<li class="comments">350 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
						<li class="like">140 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
					</ul>
					<img class="lazy" src="assets/img/placeholder-all.png" data-src="assets/img/instagram-5.jpg" alt="img">
				</a>
			</div>
		</section>
		<!--================ S-INSTAGRAM END ================-->

		@include('website.includes.footer');
		<!--===================== TO TOP =====================-->
		<a class="to-top" href="#home">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</a>
		<!--=================== TO TOP END ===================-->
		<!--==================== SCRIPT	====================-->
		<script>
			function type_ajex(cat_id) {
				$.ajax({
					url: 'brand_ajax',
					type: 'post',
					data: {

						" _token": '{{csrf_token()}}',
						"id": cat_id

					},
					success: function(result) {
						$('#brand_select').html(result);

					}

				})
			}
			// catagory ajax

			function brand_ajex(brand_id) {

				$.ajax({
					url: 'color_ajax',
					type: 'post',
					data: {

						" _token": '{{csrf_token()}}',
						"id": brand_id

					},
					success: function(result) {
						//window.alert(result);
						$('#color_select').html(result);

					}

				})
			}
		</script>

</body>

</html>