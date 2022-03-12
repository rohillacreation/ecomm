<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Creto - Shop</title>
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

	<!--===================== SHOP =====================-->
	<section class="s-shop">
		<div class="container">
			<div class="shop-sidebar-btn btn"><span>filter</span></div>
			<div class="row">
				<div class="col-12 col-lg-3 shop-sidebar">
					<ul class="widgets wigets-shop">
						<li class="widget wiget-cart">
							<h5 class="title">Cart</h5>
							<p class="not-product">No products in the cart.</p>
						</li>
						<li class="widget wiget-shop-category">
							<h5 class="title">bikes</h5>
							<ul>
								<li><p><input type="checkbox" checked><span>Road Bike</span></p></li>
								<li><p><input type="checkbox"><span>Mountain Bike</span></p></li>
								<li><p><input type="checkbox"><span>BMX Bike</span></p></li>
								<li><p><input type="checkbox"><span>City Bike</span></p></li>
								<li><p><input type="checkbox"><span>Kids Bike</span></p></li>
							</ul>
						</li>
						<li class="widget wiget-price">
							<h5 class="title">price($)</h5>
							<div id="slider-range"></div>
							<div class="amount-cover">
								<input type="text" id="amount-min">
								<span>&mdash;</span>
								<input type="text" id="amount-max">
							</div>
						</li>
						<li class="widget wiget-gender">
							<h5 class="title">gender</h5>
							<ul>
								<li><p><input type="checkbox"><span>Men’s</span></p></li>
								<li><p><input type="checkbox"><span>Women’s</span></p></li>
								<li><p><input type="checkbox"><span>Kids</span></p></li>
							</ul>
						</li>
						<li class="widget wiget-brand">
							<h5 class="title">brand</h5>
							<ul>
								<li><p><input type="checkbox"><span>Focus</span></p></li>
								<li><p><input type="checkbox"><span>Radon</span></p></li>
								<li><p><input type="checkbox"><span>Cube</span></p></li>
								<li><p><input type="checkbox"><span>Bikes</span></p></li>
								<li><p><input type="checkbox"><span>Cruzee</span></p></li>
							</ul>
						</li>
						<li class="widget wiget-color">
							<h5 class="title">color</h5>
							<ul>
								<li style="background: #f3deca"></li>
								<li style="background: #fa9483"></li>
								<li style="background: #2d4057"></li>
								<li style="background: #4097aa"></li>
								<li style="background: #0ac693"></li>
								<li style="background: #0c5061"></li>
								<li style="background: #f74440"></li>
								<li style="background: #e0e44a"></li>
							</ul>
						</li>
					</ul>
					<a href="#" class="reset-filter-btn">Reset Filters</a>
				</div>
				<div class="col-12 col-lg-9 shop-cover">
					<div class="baner-shop">
						<span class="mask"></span>
						<img src="assets/img/banner-shop.jpg" alt="img">
						<div class="baner-item-content">
							<h2>our discount program</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmmpor incididunt ut labore et dolore magna aliqua.</p>
							<a href="single-shop.html" class="btn"><span>read more</span></a>
							<div class="banner-sale-cover">
								<div class="banner-sale">30% off</div>
								<p>Lorem ipsum dolor sit amet</p>
							</div>
						</div>
					</div>
					
					
					
					<h2 class="title">All Products</h2>
					<div class="shop-sort-cover">
						<div class="sort-left"> Result Found <b> {{count($data['product'])}} </b></div>
						<div class="sort-right">
							<div class="sort-by">
								<span class="sort-name">sort by:</span>
								<select class="nice-select">
									<option selected="selected" disabled>best selling</option>
									<option>new product</option>
									<option>sale product</option>
								</select>
							</div>
					
						</div>
					</div>
					<div class="shop-product-cover">
						<div class="row product-cover block">

						
					@if(isset($data['product']))
						@foreach($data['product'] as $product)
							<div class="col-sm-6 col-lg-3">
									<div class="product-item">
										<!-- <span class="top-sale">top sale</span> -->
										<ul class="product-icon-top">
											<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
										</ul>
										<a href="{{asset('uploads/gallery/'.$product->location)}}" class="product-img"><img class="lazy" src="{{asset('uploads/gallery/'.$product->location)}}" alt="product"></a>
										<div class="product-item-cover">
											<div class="price-cover">
												<div class="new-price"><i class="fa fa-inr" aria-hidden="true"> </i>  {{$product->price}} </div>
												<!-- <div class="old-price">$1.799</div> -->
											</div>
											<h6 class="prod-title"><a href="asset('shopNow/'.$product->id)}}">{{$product->name}}</a></h6>
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
						<div class="pagination-cover">
							<ul class="pagination">
								<li class="pagination-item item-prev"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
								<li class="pagination-item active"><a href="#">1</a></li>
								<li class="pagination-item"><a href="#">2</a></li>
								<li class="pagination-item"><a href="#">3</a></li>
								<li class="pagination-item"><a href="#">4</a></li>
								<li class="pagination-item"><a href="#">5</a></li>
								<li class="pagination-item item-next"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--=================== SHOP END ===================-->
	@include('website.includes.footer')

	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>

</body>
</html>