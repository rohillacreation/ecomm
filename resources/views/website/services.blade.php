<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Creto - Services</title>
	
	@include('website.includes.header')
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
	
	
	<!-- ================ HEADER-TITLE ================ -->
	<section class="s-header-title">
		<div class="container">
			<h1>Services</h1>
			<ul class="breadcrambs">
				<li><a href="index.html">Home</a></li>
				<li>Services</li>
			</ul>
		</div>
	</section>
	<!-- ============== HEADER-TITLE END ============== -->

	<!--============== S-CATEGORY-BICYKLE ==============-->
	<section class="s-category-bicycle">
			<div class="container">
				<div class="slider-categ-bicycle">
					@foreach($data['cetegory'] as $cetegory)
					<div class="slide-categ-bicycle">
						<div class="categ-bicycle-item">
							<img src="assets/img/categ-2.png" alt="category">
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
					<img src="assets/img/advantages-1.svg" alt="icon">
					<h5>Free shipping <br>from $500</h5>
				</div>
				<div class="our-advantages-item">
					<img src="assets/img/advantages-2.svg" alt="icon">
					<h5>Warranty service <br>for 3 months</h5>
				</div>
				<div class="our-advantages-item">
					<img src="assets/img/advantages-3.svg" alt="icon">
					<h5>Exchange and return <br>within 14 days</h5>
				</div>
				<div class="our-advantages-item">
					<img src="assets/img/advantages-4.svg" alt="icon">
					<h5>Discounts for <br>customers</h5>
				</div>
			</div>
		</div>
	</section>
	<!--============= S-OUR-ADVANTAGES END =============-->

	<!--================== S-TOP-SALE ==================-->
	<section class="s-top-sale">
		<div class="container">
			<h2 class="title">new products</h2>
			<div class="row product-cover">
				@foreach($data['product'] as $product)
				<div class="col-sm-6 col-lg-3">
					<div class="product-item">
						<ul class="product-icon-top">
							<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
							<li><i class="heart{{$product->id}} fa fa-heart" aria-hidden="true" id="{{$product->id}}"  onclick="wish(this.id)"></i></li>
						</ul>
						<a href="single-shop.html" class="product-img"><img src="{{asset('uploads/gallery/'.$product->location)}}" alt="product"></a>
						<div class="product-item-cover">
							<div class="price-cover">
								<div class="new-price">{{$product->price}}</div>
						
							</div>
							<h6 class="prod-title"><a href="single-shop.html">{{$product->name}}</a></h6>
							<a href="{{asset('product/'.$product->id)}}" class="btn"><span>buy now</span></a>
						</div>

					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!--================ S-TOP-SALE END ================-->

	<!--================== S-FEEDBACK ==================-->
		<section class="s-feedback page-serv-feedback" style="background-image: url(assets/img/bg-feedback.jpg);">
		<span class="effwct-bg-feedback"style="background-image: url(assets/img/effect-bg-feedback.svg);"></span>
		<span class="mask"></span>
		<div class="container">
			<h2 class="title">feedback</h2>
			<div class="feedback-slider">
				<div class="feedback-slide">
					<div class="feedback-item">
						<div class="feedback-content">
							<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
						</div>
						<div class="feedback-item-top">
							<img src="assets/img/feedback-photo-1.png" alt="photo">
							<div class="feedback-title">
								<h5 class="title"><span>Li piters</span></h5>
								<ul class="rating">
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="feedback-slide">
					<div class="feedback-item">
						<div class="feedback-content">
							<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
						</div>
						<div class="feedback-item-top">
							<img src="assets/img/feedback-photo-2.png" alt="photo">
							<div class="feedback-title">
								<h5 class="title"><span>Sam Barton</span></h5>
								<ul class="rating">
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="feedback-slide">
					<div class="feedback-item">
						<div class="feedback-content">
							<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
						</div>
						<div class="feedback-item-top">
							<img src="assets/img/feedback-photo-3.png" alt="photo">
							<div class="feedback-title">
								<h5 class="title"><span>Zoe Tyler</span></h5>
								<ul class="rating">
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="feedback-slide">
					<div class="feedback-item">
						<div class="feedback-content">
							<p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
						</div>
						<div class="feedback-item-top">
							<img src="assets/img/feedback-photo-2.png" alt="photo">
							<div class="feedback-title">
								<h5 class="title"><span>Sam Barton</span></h5>
								<ul class="rating">
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
									<li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ S-FEEDBACK END ================-->

	<!--=================== S-CONTACTS ===================-->
	<section class="s-contacts">
		<div class="container s-anim">
			<h2 class="title">Contact us</h2>
			<form id='contactform' action="assets/php/contact.php" name="contactform">
				<ul class="form-cover">
					<li class="inp-name"><input id="name" type="text" name="your-name" placeholder="Name"></li>
					<li class="inp-phone"><input id="phone" type="tel" name="your-phone" placeholder="Phone"></li>
					<li class="inp-email"><input id="email" type="email" name="your-email" placeholder="E-mail"></li>
					<li class="inp-text"><textarea id="comments" name="your-text" placeholder="Message"></textarea></li>
				</ul>
				<div class="checkbox-wrap">
					<div class="checkbox-cover">
						<input type="checkbox">
						<p>By using this form you agree with the storage and handling of your data by this website.</p>
					</div>
				</div>
				<div class="btn-form-cover">
					<button id="#submit" type="submit" class="btn"><span>submit comment</span></button>
				</div>
			</form>
			<div id="message"></div>
		</div>
	</section>
	<!--================= S-CONTACTS END =================-->

	<!--==================== FOOTER ====================-->
	@include('website.includes.footer')
	<!--================== FOOTER END ==================-->

	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>
	<!--=================== TO TOP END ===================-->

</body>
</html>