<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot Password</title>
    
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
                    <b>FORGOT PASSWORD</b>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Reset Your Password</p>
                    <form id="forgotpasswordForm" name="forgotpasswordForm" method="POST">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email" id="email" name="email" required>
                           
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <small id="emailError" class="error"></small>
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
                    formdata.append('action', 'emailcheck');  

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
                },

                errorPlacement: function(error, element) {
                    error.insertAfter(element); 
                }
            });
        });
    </script>
</body>
</html>
