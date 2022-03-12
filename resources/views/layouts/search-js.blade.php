<script>
    $(document).ready(function() {

        const overlay = document.querySelector('#search_result')

        const pop = document.querySelector('#search_result')


        $('#search').keypress(function(e) {

            var key = e.which;

            if (key == 13) {
                var search = $('#search').val();

                if (search === "") {

                } else {

                    search_value(search);


                }

            }

        });

        $('#search_get').click(function() {

            var search = $('#search').val();

            if (search === "") {

            } else {

                search_value(search);


            }


        });

        $('#hide_result').click(function() {
            close_result()
        });



        function close_result() {
            overlay.classList.remove('flex')
            overlay.classList.add('hidden')
        }

        function show_result() {
            overlay.classList.remove('hidden')
            overlay.classList.add('flex')
        }

        function search_value(search) {

            $.ajax({

                url: '/live_search',

                type: 'post',

                data: {

                    " _token": '{{csrf_token()}}',
                    "search": search,

                },

                success: function(result) {
                    console.log(result);
                    $('#search_content').html(result);
                    show_result();
                }
            });

        }
    });

    function product_id(id) {

        console.log(id);

        const url = "http://127.0.0.1:8000/product/" + id;
        window.location.replace(url);
    }

    function cat_id(id) {
        const url = "http://127.0.0.1:8000/category/" + id;
        window.location.replace(url);
    }

    function brand_id(id) {
        const url = "http://127.0.0.1:8000/brand/" + id;
        window.location.replace(url);
    }

    //variant choosing

    $('#var_change').change(function() {

        var var_id = $(this).val();
        var pro_id = $(' #pro_id').val();


        if(var_id == 0){
            window.location.reload();
        }

        else{

            $.ajax({

                url: '/variant_change',

                type: 'post',

                data: {

                " _token": '{{csrf_token()}}',
                "var_id": var_id,
                "pro_id": pro_id,

                },

                success: function(result) {

                $('#var-result').html(result)

                }
            });

        }


    });


    // open pop - up function
    function show_pop() {

        const pop = document.querySelector('#pop')


        pop.classList.remove('hidden')
        pop.classList.add('flex')
    }

    // close pop-up function

    function close_pop() {

        const pop = document.querySelector('#pop')

        pop.classList.remove('flex')
        pop.classList.add('hidden')
    }

    // close pop-up 

    $('#hide_pop').click(function() {
        close_pop()
    });

</script>