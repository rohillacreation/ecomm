$(document).ready(function(){
    $('.clk-rw').click(function(){
        $('.hide-table').toggleClass('show-table');
        $('.fa-plus-circle').toggleClass('hide-icon');
        $('.fa-minus-circle').toggleClass('show-icon');
    });

//Price update button from all product page
    $(".updt-prc").focus(function () {
      $(".update-btn").addClass("btn-show");
    });
    $(".update-btn").click(function () {
      $(".update-btn").removeClass("btn-show");
    });
//====Delete product from the product list


    // $(".fa-trash").click(function(){
    //     var post_di = confirm("are you sure to want delete");
    //     if (post_di == true) {
    //       $("#item_id").remove();
    //     } else {
    //       alert("you pressed cancel");
    //     }
    // });


});