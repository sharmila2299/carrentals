<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h1>Registration Form</h1>
                    </div>
                    <div class="card-body">
                        <form id="registerForm" class="px-3">
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email">
                                <small id="emailError" class="error"></small>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Enter Your password">
                                <small id="passwordError" class="error"></small>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" name="role" class="form-select">
                                    <option value="">--Select--</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="teammember">Team Member</option>
                                </select>
                                <small id="roleError" class="error"></small>
                            </div>
                            <div class="col-12 mb-2 ">
                                <label for="" class=" mb-2 ">Profile Image</label>
                                <input type="file" name="image" class="form-control p-1" id="image" onchange = "validateImage()" accept=".jpg">
                                <br>
                                <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">
                                <small id="imageError" class="error" style="color: red;"></small>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6 d-grid">
                                    <input type="reset" name="cancel" value="Reset" class="btn btn-danger">
                                </div>
                                <div class="col-6 d-grid">
                                    <button type="button" class="btn btn-primary" onclick="submitForm(event)">Create User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="js/myscript.js"></script>