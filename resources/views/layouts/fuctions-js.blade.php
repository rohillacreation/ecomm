<script>

    function add_cart(pro_id,var_id) {

    var qty  = $('#value_quantity').val();

   
  
    if (qty > 0 && qty % 1 == 0) {


    console.log(pro_id,qty,var_id);

    $.ajax({

            url: '/add_cart',

            type: 'post',

            data: {

            " _token": '{{csrf_token()}}',
            "pro_id": pro_id,
            "var_id": var_id,
            "qty": qty,

            },

        success: function(result) {

            $('#pop_content').html(result)
                show_pop()
        }

    });

    }
}



    function buy_now(product_id,variant_id) {
        
        var qty  = $('#value_quantity').val();

        //checking quntity is a whole number and grater than 
        if (qty > 0 && qty % 1 == 0) {

            if (variant_id === 0) {
                
                const url = 'http://127.0.0.1:8000/buyNow/' + product_id +'/' + qty;
                window.location.replace(url);
                
            } else {
                
                const url = 'http://127.0.0.1:8000/buyNow/' + product_id +'/' + variant_id + '/' + qty;
                window.location.replace(url);

            }
            
        }

        else
        {
                $('#pop_content').html('<p>sorry, you cannot do this action yet</p>')
                show_pop()
        }
        
    }

    

</script>