<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Creto - Contacts Us</title>
	<!-- =================== META =================== -->
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
			<h1>Contacts Us</h1>
			<ul class="breadcrambs">
				<li><a href="index.html">Home</a></li>
				<li>Contacts</li>
			</ul>
		</div>
	</section>
	<!-- ============== HEADER-TITLE END ============== -->

	<!--================= CONTACTS-TOP =================-->
	<section class="contacts-top">
		<div class="container">
			<div class="row contact-top-cover">
				<div class="col-12 col-lg-6 contact-img">
					<img src="assets/img/cont-img-1.jpg" alt="img">
				</div>
				<div class="col-12 col-lg-6 contact-info">
					<h2 class="title">Contact Information</h2>
					<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit <a href="#">totam rem</a> aperiam, eaque sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam.</p>
					<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim Nor again is there anyone who loves or pursues or desires to obtain.</p>
					<ul class="social-list">
						<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.youtube.com"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--================ CONTACTS-TOP END ================-->

	<!--================ CONTACTS-BLOCK ================-->
	<section class="s-contacts-block">
		<div class="container">
			<div class="row contacts-block">
				<div class="col-12 col-md-4">
					<div class="contact-block-item">
						<div class="contact-block-left">
							<img src="assets/img/cont-icon-1.svg" alt="img">
							<h6>need help</h6>
						</div>
						<div class="contact-block-right">
							<ul>
								<li><a href="tel:18004886040">1-800-488-6040</a></li>
								<li><a href="tel:18005784090">1-800-578-4090</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="contact-block-item">
						<div class="contact-block-left">
							<img src="assets/img/cont-icon-2.svg" alt="img">
							<h6>questions</h6>
						</div>
						<div class="contact-block-right">
							<ul>
								<li><a href="mailto:team@gmail.com">team@gmail.com</a></li>
								<li><a href="mailto:help@gmail.com">help@gmail.com</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="contact-block-item">
						<div class="contact-block-left">
							<img src="assets/img/cont-icon-3.svg" alt="img">
							<h6>address</h6>
						</div>
						<div class="contact-block-right">
							<ul>
								<li><a class="item-scroll" href="#map">8500, Lorem Street, Chicago, IL, 55030</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--============== CONTACTS-BLOCK END ==============-->

	<!--=================== S-CONTACTS ===================-->
	<section class="s-contacts page-contacts">
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

	<!--===================== S-MAP =====================-->
	<section class="s-map">
		<div id="map" class="cont-map google-map"></div>
	</section>
	<!--=================== S-MAP END ===================-->
@include('website.includes.footer')

	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>
	
</html>
