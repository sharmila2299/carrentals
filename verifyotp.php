<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enter Captcha</title>
    
    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(43deg, #1a1a1a, #4e4e4e, #1a1a1a); 
            background-size: cover;
            background-position: center;
            position: relative;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: -1;
        }
        .login-box {
            box-shadow: 20px 17px 15px rgb(148 154 163 / 28%);
            border-radius: 5px;
            background-color: white;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .login-box:hover {
            transform: translateY(-10px); 
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3); 
        }
        .card-header {
            border-bottom: none;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }
        .input-group-text {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 3px;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="login-box w-100" style="max-width: 500px;">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <b>ENTER CAPTCHA</b>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Please Enter the CAPTCHA</p>
                    <form id="captchaForm" name="captchaForm" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="captcha" name="captcha" readonly value="<?php echo $_SESSION['otp']; ?>" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-shield-alt"></span>
                                </div>
                            </div>
                        </div>
                        <small id="captchaError" class="error"></small>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter the captcha" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <small id="nameError" class="error"></small>

                        <div class="row mt-3">
                            <div class="col-6">
                                <button type="button" class="btn btn-danger btn-block w-100" onclick="window.location = 'login'">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btn-block w-100">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(function() {
            // jQuery validation
            $("form[name='captchaForm']").validate({
                rules: {         
                    name: {
                        required: true,  // name is required
                        equalTo: "#captcha" // Ensure captcha matches the generated value
                    }
                },
                messages: {         
                    name: {
                        required: "Please Enter the Captcha",
                        equalTo: "Captcha does not match"
                    }
                },

                // Submit handler for form
                submitHandler: function(form) {
                    // Prepare the form data
                    let formdata = new FormData(form);
                    formdata.append('action', 'otpcheck');  // Appending action type

                    // AJAX call for form submission
                    $.ajax({
                        type: "POST",
                        url: "actions/Forgotpassword.php",  // Replace with correct PHP script URL
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        data: formdata,
                        success: function(data) {
                            console.log('Success:', data);
                            if (data.trim() == 'true') {
                                toastr.success('Captcha Verified Successfully');
                                setTimeout(function() {
                                    location.href = "forgot";  // Redirect to next page
                                }, 1000);
                            } else {
                                toastr.error('Captcha Verification Failed');
                            }
                        },
                        error: function(xhr, status, error) {
                            toastr.error('Error: ' + error);
                            console.error('AJAX Error: ' + status + ', ' + error);
                        }
                    });
                },

                // Custom error placement
                errorPlacement: function(error, element) {
                    error.insertAfter(element); // Place the error message directly after the input field
                }
            });
        });
    </script>
</body>
</html>
