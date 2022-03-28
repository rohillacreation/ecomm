<!--==================== FOOTER ====================-->
<footer>
	<div class="container">
		<div class="row footer-item-cover">
			<div class="footer-subscribe col-md-7 col-lg-8">
				<h6>subscribe</h6>
				<p>Subscribe us and you won't miss the new arrivals, as well as discounts and sales.</p>
				<form class="subscribe-form">
					<i class="fa fa-at" aria-hidden="true"></i>
					<input class="inp-form" type="email" name="subscribe" placeholder="E-mail">
					<button type="submit" class="btn btn-form"><span>send</span></button>
				</form>
			</div>
			<div class="footer-item col-md-5 col-lg-4">
				<h6>info</h6>
				<ul class="footer-list">
					<li><a href="shop.html">FAQ</a></li>
					<li><a href="shop.html">Contacts</a></li>
					<li><a href="shop.html">Shipping + Heading</a></li>
					<li><a href="shop.html">Exchanges</a></li>
					<li><a href="shop.html">2019 Catalog</a></li>
					<li><a href="shop.html">Returns</a></li>
					<li><a href="shop.html">Search</a></li>
				</ul>
			</div>
		</div>
		<div class="row footer-item-cover">
			<div class="footer-touch col-md-7 col-lg-8">
				<h6>stay in touch</h6>
				<ul class="footer-soc social-list">
					<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li><a target="_blank" href="https://www.youtube.com"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				</ul>
				<div class="footer-autor">Questions? Please write us at: <a href="mailto:rovadex@gmail.com">rovadex@gmail.com</a></div>
			</div>
			<div class="footer-item col-md-5 col-lg-4">
				<h6>shop</h6>
				<ul class="footer-list">
					<li><a href="shop.html">Road Bike</a></li>
					<li><a href="shop.html">City Bike</a></li>
					<li><a href="shop.html">Mountain Bike</a></li>
					<li><a href="shop.html">Kids Bike</a></li>
					<li><a href="shop.html">BMX Bike</a></li>
				</ul>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="footer-copyright"><a target="_blank" href="https://rovadex.com">Rovadex</a> © 2019. All Rights Reserved.</div>
			<ul class="footer-pay">
				<li><a href="#"><img src="{{url('assets/img/footer-pay-1.png')}}" alt="img"></a></li>
				<li><a href="#"><img src="{{url('assets/img/footer-pay-2.png')}}" alt="img"></a></li>
				<li><a href="#"><img src="{{url('assets/img/footer-pay-3.png')}}" alt="img"></a></li>
				<li><a href="#"><img src="{{url('assets/img/footer-pay-4.png')}}" alt="img"></a></li>
			</ul>
		</div>
	</div>
</footer>
<!--================== FOOTER END ==================-->

<script>
	var url = document.URL

	var url = url.substr(url.lastIndexOf('/') + 1);
	var element = document.getElementById(url);
	element.classList.add("active");
</script>



<script src="{{url('assets/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{url('assets/js/slick.min.js')}}"></script>
<script src="{{url('assets/js/jquery.nice-select.js')}}"></script>
<script src="{{url('assets/js/wow.js')}}"></script>
<script src="{{url('assets/js/lazyload.min.js')}}"></script>
<script src="{{url('assets/js/scripts.js')}}"></script>
<script>
	// ajax to check all wishlists
	$.ajax({
		url: '/getWhishList/',
		type: 'get',
		data: {},
		success: function(result) {
			result.forEach(myFunction);

			function myFunction(item) {
				if (document.getElementsByName('heart'+item) != null) {
					 $location = document.getElementsByClassName('heart'+item);
					 $location[0].style.color = "red";
				}
			}

		}
	})
</script>
<script>
	function wish(product_id) {

		if (document.getElementById(product_id).style.color == "red") {
			document.getElementById(product_id).style.color = "gray";
			window.alert("Remove from Whishlist");
		} else {
			document.getElementById(product_id).style.color = "red";
			window.alert("Added to Whishlist");
		}
		$.ajax({
			url: '/addWishList/' + product_id,
			type: 'get',
			data: {
				"product_id": product_id
			},
			success: function(result) {}

		})
	}
</script>