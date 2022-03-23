</body>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    <!-- JS FILES -->
    <script src="{{asset('admin-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/js/scripts.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{-- <script src="{{asset('admin-assets/js/app.js')}}"></script> --}}

    <script>
        $(document).ready(function () {
            App.init();
        });
    </script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js ">
        $('.select2').select2();
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

</html>