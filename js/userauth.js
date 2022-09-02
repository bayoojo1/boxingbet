$(document).ready(function() {
$('#btnLogin').click(function(event) {
  event.preventDefault()
  identity = $("#identity").val()
  password = $("#password").val()
  if(identity == '') {
    swal({
      title: "Error!",
      text: "You need to supply either your email or mobile number",
      icon: "error",
    });
    return false;
  }
  if(password == '') {
    swal({
      title: "Error!",
      text: "Password cannot be empty",
      icon: "error",
    });
    return false;
  }
  $("#btnLogin").prop('disabled', true);
  $("#btnLogin").val('Wait...');
  $.ajax({
      url: 'procedures/login.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ identity: identity, password : password }),
      success: function(response) {
        if(response.indexOf('mailnotfound') !== -1) {
          swal({
            title: "Email Not Found!",
            text: "We don't have your email or mobile number on record.",
            icon: "error",
          });
          return false;
        } 
        if(response.indexOf('mobilenotfound') !== -1) {
          swal({
            title: "Mobile Not Found!",
            text: "We don't have your email or mobile number on record.",
            icon: "error",
          });
          return false;
        }
        if(response.indexOf('invalid') !== -1) {
          swal({
            title: "Error!",
            text: "Please check you are providing correct email, mobile or password.",
            icon: "error",
          });
          return false;
        }
        if(response.indexOf('redirect') !== -1) {
            window.location = 'submitstaking.php'; 
            return false;
        }
        if(response.indexOf('success') !== -1) {
            window.location = 'index.php'; 
        } 
      }
  })
})
});


$(document).ready(function() {
  $('#btnRegister').click(function(event) {
    event.preventDefault()
    identity = $("#identity").val()
    password = $("#password").val()
    confirmPass = $("#confirmpassword").val()
    terms = $("#terms").prop('checked') ? 'Y': 'N'
    if($("#terms").is(":checked") == false) {
      swal({
        text: "You must accept our terms and conditions to proceed.",
        icon: "error",
      });
      return false;
    }
    if(identity == '') {
      swal({
        text: "Email or mobile cannot be empty!",
        icon: "error",
      });
      return false;
    }
    if(password == '' || confirmPass == '') {
      swal({
        text: "Your password cannot be empty!",
        icon: "error",
      });
      return false;
    }
    if(password != confirmPass) {
      swal({
        text: "The supplied passwords are not the same.",
        icon: "error",
      });
      return false;
    }
    if(password.length < 8) {
      swal({
        text: "Your password cannot be less than 8 character!",
        icon: "error",
      });
      return false;
    }
    $("#btnRegister").prop('disabled', true);
    $("#btnRegister").val('Wait...');
    $.ajax({
      url: 'procedures/register.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ identity: identity, password : password, confirmPass: confirmPass, terms: terms }),
      success: function(response) {
        if(response.indexOf('accept_terms') !== -1) {
          swal({
            title: "Terms and Conditions!",
            text: "You must accept our terms and condition to proceed",
            icon: "error",
          });
          return false;
        } else if(response.indexOf('user_exist') !== -1) {
          swal({
            title: "Email or Mobile Taken!",
            text: "User Already Exists, please use another email or mobile.",
            icon: "info",
          });
          return false;
        } else if(response.indexOf('not_match') !== -1) {
          swal({
            title: "Password mismatch!",
            text: "Passwords do NOT match.",
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

$(document).ready(function() {
  $('#btnRegisterBoxer').click(function(event) {
    event.preventDefault()
    identity = $("#identity").val()
    password = $("#password").val()
    confirmPass = $("#confirmpassword").val()
    fname = $("#fname").val()
    lname = $("#lname").val()
    alias = $("#alias").val()
    aboutme = $("#aboutme").val()
    weight = $("#weight").val()
    height = $("#height").val()
    stance = $("input[name='stance']:checked").val()
    clubname = $("#clubname").val()
    coach = $("#coach").val()
    state = $("#state").val()
    nationality = $("#nationality").val()
    age = $("#age").val()
    sex = $("input[name='sex']:checked").val()
    terms = $("#terms").prop('checked') ? 'Y': 'N'
    if($("#terms").is(":checked") == false) {
      swal({
        text: "You must accept our terms and conditions to proceed.",
        icon: "error",
      });
      return false;
    }
    if(identity == '') {
      swal({
        text: "Email or mobile cannot be empty!",
        icon: "error",
      });
      return false;
    }
    if(password == '' || confirmPass == '') {
      swal({
        text: "Your password cannot be empty!",
        icon: "error",
      });
      return false;
    }
    if(password != confirmPass) {
      swal({
        text: "The supplied passwords are not the same.",
        icon: "error",
      });
      return false;
    }
    if(password.length < 8) {
      swal({
        text: "Your password cannot be less than 8 character!",
        icon: "error",
      });
      return false;
    }
    if(fname == '' || lname == '' || alias == '' || aboutme == '' || weight == '' || height == '' || stance == '' || clubname == '' || coach == '' || state == '' || nationality == '' || age == '' || sex == '') {
       swal({
        text: "All fields must be filled.",
        icon: "error",
      });
      return false; 
    }
    $("#btnRegisterBoxer").prop('disabled', true);
    $("#btnRegisterBoxer").val('Wait...');
    $.ajax({ 
      url: 'procedures/registerBoxer.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ identity: identity, password : password, confirmPass: confirmPass, fname: fname, lname: lname, alias: alias, aboutme: aboutme, weight: weight, height: height, stance: stance, clubname: clubname, coach: coach, state: state, nationality: nationality, age: age, sex: sex, terms: terms }),
      success: function(response) {
        if(response.indexOf('accept_terms') !== -1) {
          swal({
            title: "Terms and Conditions!",
            text: "You must accept our terms and condition to proceed",
            icon: "error",
          });
          return false;
        } else if(response.indexOf('user_exist') !== -1) {
          swal({
            title: "Email or Mobile Taken!",
            text: "User Already Exists, please use another email or mobile.",
            icon: "info",
          });
          return false;
        } else if(response.indexOf('not_match') !== -1) {
          swal({
            title: "Password mismatch!",
            text: "Passwords do NOT match.",
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


$(document).ready(function() {
  $('#signUpStakeBtn').click(function(event) {
    event.preventDefault()
    identity = $("#identity").val()
    password = $("#password").val()
    confirmPass = $("#confirmpassword").val()
    terms = 'Y'
    if(identity == '') {
      swal({
        text: "Email or mobile cannot be empty!",
        icon: "error",
      });
      return false;
    }
    if(password == '' || confirmPass == '') {
      swal({
        text: "Your password cannot be empty!",
        icon: "error",
      });
      return false;
    }
    if(password != confirmPass) {
      swal({
        text: "The supplied passwords are not the same.",
        icon: "error",
      });
      return false;
    }
    if(password.length < 8) {
      swal({
        text: "Your password cannot be less than 8 character!",
        icon: "error",
      });
      return false;
    }
    $("#signUpStakeBtn").prop('disabled', true);
    $("#signUpStakeBtn").val('Wait...');
    $.ajax({
      url: 'procedures/register.php',
      type: 'POST',
      dataType: 'text',
      data: JSON.stringify({ identity: identity, password : password, confirmPass: confirmPass, terms: terms }),
      success: function(response) {
        if(response.indexOf('user_exist') !== -1) {
          swal({
            title: "Email or Mobile Taken!",
            text: "User Already Exists, please use another email or mobile.",
            icon: "info",
          });
          return false;
        } else if(response.indexOf('not_match') !== -1) {
          swal({
            title: "Password mismatch!",
            text: "Passwords do NOT match.",
            icon: "error",
          });
          return false;
        } else {
          window.location = 'welcome.php';
        }
      }
   }) 
  })
});