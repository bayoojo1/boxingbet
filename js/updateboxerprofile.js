$(document).ready(function() {
  $('#btnRegisterBoxer').click(function(event) {
    event.preventDefault()
     form = $('#postData')[0]
    // Create an FormData object
      data = new FormData(form)
    $("#btnRegisterBoxer").prop('disabled', true);
    $("#btnRegisterBoxer").val('Wait...');
    $.ajax({
        enctype: 'multipart/form-data',
        url: 'procedures/updateBoxerProfile.php',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        
        success: function(response) {
        if(response.indexOf('accept_terms') !== -1) { 
          swal({
            title: "Terms and Conditions!",
            text: "You must accept our terms and condition to proceed",
            icon: "error",
          });
          return false;
        } else if(response.indexOf('all_fields') !== -1) {
          swal({
            title: "All fields are required!",
            text: "You need to fill all required fields.",
            icon: "info",
          });
          return false;
        } else if(response.indexOf('below') !== -1) {
            swal({
            title: "Below Recommendation!",
            text: "That image is below recommended dimension",
            icon: "error",
          });
          return false;
        } else if(response.indexOf('uploadpix') !== -1) {
            swal({
            title: "No picture uploaded!",
            text: "You need to upload your picture.",
            icon: "error",
          });
          return false;
        } else if(response.indexOf('toolarge') !== -1) {
            swal({
            title: "Picture size!",
            text: "Your image file is larger than 1mb.",
            icon: "error",
          });
          return false;      
        } else if(response.indexOf('filetype') !== -1) {
            swal({
            title: "File Type Error!",
            text: "Your file is not .gif|.jpg|.png|.jpeg type.",
            icon: "error",
          });
          return false;
        } else if(response.indexOf('unknown') !== -1) {
            swal({
            title: "Unknown Error!",
            text: "An unknown error occurred.",
            icon: "error",
          });
          return false;      
        } else if(response.indexOf('invalid') !== -1) {
            swal({
            title: "Invalid Image!",
            text: "Your are trying to upload an invalid image type.",
            icon: "error",
          });
          return false;
        } else if(response.indexOf('failed') !== -1) {
            swal({
            title: "Failed Upload!",
            text: "Your file upload attempt failed! Try again.",
            icon: "error",
          });
          return false;      
        } else {
          window.location = 'profile.php?u=' + response
        }
      }
   }) 
  })
});