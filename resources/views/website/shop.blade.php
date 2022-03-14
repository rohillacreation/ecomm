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
								<?php $i=1; ?>
				@foreach($data['cetegory'] as $cetegory)
								<li><p><input type="checkbox" onclick="cat_filter()" id ="cat{{$i++}}" value="{{$cetegory->id}}"><span>{{$cetegory->name}}</span></p></li>
					@endforeach
							</ul>
						</li>
						<li class="widget wiget-brand">
							<h5 class="title">brand</h5>
							<ul>
								<?php $i=1; ?>
								@foreach($data['brand'] as $brand)
								<li><p><input type="checkbox" id="brand{{$i++}}" onclick="cat_filter()" value="{{$brand->id}}"><span>{{$brand->name}}</span></p></li>
								@endforeach
								
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
				<div class="row product-cover block"  id="data_elements">		
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

<script>

function cat_filter(){
	var cat_arr =[];
if(document.getElementById('cat1')!= null){
	if(document.getElementById('cat1').checked) {
	cat_arr.push(document.getElementById('cat1').value);
}}
if(document.getElementById('cat2')!= null){
	if(document.getElementById('cat2').checked) {
	cat_arr.push(document.getElementById('cat2').value);
}}

if(document.getElementById('cat3')!= null){
	if(document.getElementById('cat3').checked) {
	cat_arr.push(document.getElementById('cat3').value);
}}

if(document.getElementById('cat4')!= null){
	if(document.getElementById('cat4').checked) {
	cat_arr.push(document.getElementById('cat4').value);
}}

if(document.getElementById('cat5')!= null){
	if(document.getElementById('cat5').checked) {
	cat_arr.push(document.getElementById('cat5').value);
}}
if(document.getElementById('cat6')!= null){
	if(document.getElementById('cat6').checked) {
	cat_arr.push(document.getElementById('cat5').value);
}}

if(document.getElementById('cat7')!= null){
	if(document.getElementById('cat7').checked) {
	cat_arr.push(document.getElementById('cat7').value);
}}

// brands

var brand=[];
if(document.getElementById('brand1')!= null){
	if(document.getElementById('brand1').checked) {
		brand.push(document.getElementById('brand1').value);
}}
if(document.getElementById('brand2')!= null){
	if(document.getElementById('brand2').checked) {
		brand.push(document.getElementById('brand2').value);
}}
if(document.getElementById('brand3')!= null){
	if(document.getElementById('brand3').checked) {
		brand.push(document.getElementById('brand3').value);
}}
if(document.getElementById('brand4')!= null){
	if(document.getElementById('brand4').checked) {
		brand.push(document.getElementById('brand4').value);
}}
if(document.getElementById('brand5')!= null){
	if(document.getElementById('brand5').checked) {
		brand.push(document.getElementById('brand5').value);
}}
if(document.getElementById('brand6')!= null){
	if(document.getElementById('brand6').checked) {
		brand.push(document.getElementById('brand6').value);
}}
if(document.getElementById('brand7')!= null){
	if(document.getElementById('brand7').checked) {
		brand.push(document.getElementById('brand7').value);
}}
if(document.getElementById('brand8')!= null){
	if(document.getElementById('brand8').checked) {
		brand.push(document.getElementById('brand8').value);
}}
if(document.getElementById('brand9')!= null){
	if(document.getElementById('brand9').checked) {
		brand.push(document.getElementById('brand9').value);
}}
if(document.getElementById('brand10')!= null){
	if(document.getElementById('brand7').checked) {
		brand.push(document.getElementById('brand10').value);
}}
if(document.getElementById('brand11')!= null){
	if(document.getElementById('brand11').checked) {
		brand.push(document.getElementById('brand11').value);
}}
if(document.getElementById('brand12')!= null){
	if(document.getElementById('brand12').checked) {
		brand.push(document.getElementById('brand12').value);
}}
if(document.getElementById('brand13')!= null){
	if(document.getElementById('brand13').checked) {
		brand.push(document.getElementById('brand13').value);
}}
if(document.getElementById('brand14')!= null){
	if(document.getElementById('brand14').checked) {
		brand.push(document.getElementById('brand14').value);
}}
if(document.getElementById('brand15')!= null){
	if(document.getElementById('brand15').checked) {
		brand.push(document.getElementById('brand15').value);
}}


var color =[];
       
$.ajax({
	url: 'all_filter_ajax',
	type: 'post',
	data: {

		" _token": '{{csrf_token()}}',
		"cat":cat_arr,
		"brand":brand,
		"color":color

	},
	success: function(result) {	
	
console.log(result);
	 $('#data_elements').html(result);
	
	}

});
}
	</script>

</body>
</html>