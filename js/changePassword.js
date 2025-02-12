jQuery.noConflict();
(function($) {
  function validation() {
    let old_password = $('#old_password').val();
    let password = $('#password').val();
    let confPassword = $('#confPassword').val();

    if (old_password === '') {
      toastr.error("Enter Present Password");
      $('#old_password').focus();
      return false;
    }
    if (password === '') {
      toastr.error("Enter New Password...");
      $('#password').focus();
      return false;
    }
    if (confPassword === '') {
      toastr.error("Confirm Your New Password");
      $('#confPassword').focus();
      return false;
    }
    if (password !== confPassword) {
      toastr.error('Password and Confirm Password Mismatch');
      $('#confPassword').focus();
      return false;
    }

    return true;
  }

  // Change Password Function
  function changePassword(event) {
    event.preventDefault(); // Prevent form submission

    if (validation()) {
      let old_password = $('#old_password').val();
      let password = $('#password').val();

      $.ajax({
        url: 'actions/loginActions',
        type: 'POST',
        data: {
          'action': 'changePassword',
          'old_password': old_password,
          'password': password
        },
        success: function(data) {
          if (data === "true") {
            toastr.success("Password Changed Successfully..");
            setTimeout(function() {
              window.location.href = "home";
            }, 1000);
          } else if (data === "Invalid") {
            toastr.error('Old Password is Incorrect');
            $('#old_password').val('');
            $('#old_password').focus();
          } else {
            toastr.error('Password Change Unsuccessful..');
          }
        },
        error: function(xhr, status, error) {
          toastr.error("An error occurred: " + error);
        }
      });
    }
  }

  // Bind the changePassword function to the form's submit event
  $('#changePasswordForm').on('submit', changePassword);
})(jQuery);
