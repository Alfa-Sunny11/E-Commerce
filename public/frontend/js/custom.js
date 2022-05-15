
$.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
});
$(document).ready(function(){

      $('.addToCartBtn').click(function (e) {
      e.preventDefault();
      var product_id = $(this).closest('.product_data').find('.prod_id').val();
      var product_qty = $(this).closest('.product_data').find('.qty-input').val();

      // $.ajaxSetup({
      //       headers: {
      //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //       }
      // });

      $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                  'product_id': product_id,
                  'product_qty': product_qty,
            },
            success: function(response){
                  swal(response.status);
            }

      });
      // var value = parseInt(incre_value, 10);
      // value = isNaN(value) ? 0 : value;
      // if(value<10){
      //     value++;
      //     $(this).parents('.quantity').find('.qty-input').val(value);
      // }

      });

      $('.increment-btn').click(function (e) {
      e.preventDefault();
      var incre_value = $(this).parents('.quantity').find('.qty-input').val();
      var value = parseInt(incre_value, 10);
      value = isNaN(value) ? 0 : value;
      if(value < 10){
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
      }

      });

      $('.decrement-btn').click(function (e) {
      e.preventDefault();
      var decre_value = $(this).parents('.quantity').find('.qty-input').val();
      var value = parseInt(decre_value, 10);
      value = isNaN(value) ? 0 : value;
      if(value>1){
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
      }
      });
       
      $('.changeQuantity').click(function (e){
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
            
            $.ajax({
                  method: "POST",
                  url: "update-cart",
                  data: {
                        'prod_id': prod_id,
                        'prod_qty': qty,
                  },
                  success: function(response){
                        window.location.reload();
                  }
      
            });
      });
      // $('.delete-cart-item').click(function (e) {
      //       e.preventDefault();
      //       var product_id = $(this).closest('.product_data').find('.prod_id').val();

      //       $.ajaxSetup({
      //             headers: {
      //                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //             }
      //       });

      //       $.ajax({
      //             method: "POST",
      //             url: "delete-cart-item",
      //             data: {
      //                   'product_id': product_id,
 
      //             },
      //             success: function(response){
      //                   window.location.reload();
      //                   swal("",response.status, "success");
      //             }
      
      //       });
            
      //       });
});

