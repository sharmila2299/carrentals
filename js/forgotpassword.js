    $(function() {
      $("form[name='forgotpasswordForm']").validate({
        rules: {         
          email: {
            required: true,  
            email: true       
          }
        },
        messages: {         
          email: {
            required: "Please Enter Your email",
            email: "Please Enter a valid email"
          }
        },
        
        submitHandler: function(form) {
          let formdata = new FormData(form);
          formdata.append('action', 'save');  

          $.ajax({
            type: "POST",
            url: "actions/Forgotpassword.php",  
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: formdata,
            success: function(data) {
              console.log('Success:', data);
              if (data.trim() == 'true') {
                toastr.success('Verify OTP sent to your email');
                setTimeout(function() {
                  location.href = "verifyotp";  
                }, 1000);
              } else {
                toastr.error('Please Enter a Valid email');
              }
            },
            error: function(xhr, status, error) {
              toastr.error('Error: ' + error);
              console.error('AJAX Error: ' + status + ', ' + error);
            }
          });
        }
      });
    });