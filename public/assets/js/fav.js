function trash(url){ 

    let y = document.getElementById('container')
  
    $.ajax({
      type: 'GET',
      url: url,
      success: function (response) {
        y.innerHTML = response
      }
    });
  }

  // $(document).ready(function () {

  //   $('.card').click(function (e) {
  //       e.preventDefault();

  //       var product_id = $(this).closest(".cartpage").find('.product_id').val();

  //       var data = {
  //           '_token': $('input[name=_token]').val(),
  //           "product_id": product_id,
  //       };

  //       // $(this).closest(".cartpage").remove();

  //       $.ajax({
  //           url: '/delete-from-cart',
  //           type: 'DELETE',
  //           data: data,
  //           success: function (response) {
  //               window.location.reload();
  //           }
  //       });
  //   });

// });