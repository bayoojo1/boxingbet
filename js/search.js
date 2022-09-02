$(document).ready(function() {
    $('#btnSubmit').click(function(event) {
      event.preventDefault()
      email = $("#email").val()
      $("#status").html('Loading...')
      $.ajax({
          url: 'procedures/fetch_user.php',
          type: 'POST',
          data: JSON.stringify({ email: email }),
          success: function(response) {
              $("#status").html(
               'Email: <span style="color:red;">' + response[0].email + '</span><br>' +
               'Business Name: <span>' + response[0].business_name + '</span><br>' +
               'Address: <span>' + response[0].address + '</span><br>' +
               'About Us: <span>' + response[0].aboutus + '</span>'
            )
          }
        })
    })
});
