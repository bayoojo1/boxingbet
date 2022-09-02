$(document).ready(function() {
    $("#setDiscount").click(function() {
        boxerid = $("input[name='selectPromoCode']:checked").val()
        discount = $("#discount").val()
        if(boxerid == '' || discount == '') {
            swal({
              title: "Error",
              text: "You need to select a boxer and provide a discount",
              icon: "error",
            });
            return false
        }
        $("#setDiscount").prop('disabled', true);
        $("#setDiscount").val('Wait...');
        $.ajax({
          url: 'procedures/promocode.php',
          type: 'POST',
          dataType: 'text',
          data: JSON.stringify({ boxerid: boxerid, discount: discount }),
          success: function(response) {
            if(response.indexOf('success') !== -1) {
                swal({
                  title: "Success",
                  text: "Promo Code and discount successfully set. Refresh the page to view.",
                  icon: "success",
                });
            }
          }
       })
    })
})

function deletePromoCode(id) {
    $(document).ready(function() {
    boxerid = id.split('-')[1]
       $.ajax({
          url: 'procedures/deletepromocode.php',
          type: 'POST',
          data: { boxerid: boxerid },
          success: function(response) {
            if(response.indexOf('success') !== -1) {
                swal({
                  title: "Success",
                  text: "Promo Code and discount deleted for this boxer!.",
                  icon: "success",
                });
            }
          }
       })
    })
}
