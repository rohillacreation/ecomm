<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Creto - Gallery</title>
	
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
			<h1>Gallery</h1>
			<ul class="breadcrambs">
				<li><a href="index.html">Home</a></li>
				<li>Gallery</li>
			</ul>
		</div>
	</section>
	<!-- ============== HEADER-TITLE END ============== -->

	<!--==================== S-GALLERY ====================-->
	<section class="s-gallery">
		<div class="container">
			<div class="row-gallery">
				<div class="grid-gallery">
					<div class="grid-sizer"></div>
					<div class="gallery-item gallery-item-big">
						<a href="assets/img/gal-1.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-1.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #1</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item">
						<a href="assets/img/gal-2.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-2.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #2</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item">
						<a href="assets/img/gal-3.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-3.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #3</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item">
						<a href="assets/img/gal-4.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-4.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #4</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item gallery-item-big">
						<a href="assets/img/gal-5.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-5.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #5</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item gallery-item-big">
						<a href="assets/img/gal-6.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-6.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #6</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item">
						<a href="assets/img/gal-7.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-7.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #7</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item">
						<a href="assets/img/gal-8.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-8.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #8</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
					<div class="gallery-item">
						<a href="assets/img/gal-9.jpg" data-fancybox="gallery1">
							<img src="assets/img/gal-9.jpg" alt="img">
							<div class="gal-item">
								<h3 class="title">photo #9</h3>
								<p>Satisfied Customers</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================== S-GALLERY END ==================-->

	@include('website.includes.footer')


	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>
	<!--=================== TO TOP END ===================-->

</body>
</html>