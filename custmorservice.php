<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Support Popup</title>
  <link rel="icon" type="image/jpg" sizes="32x32" href="images/sl1.jpg">
 
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: url('https://i.pinimg.com/originals/03/e2/fb/03e2fb6e8d44cb56fed5d1df0051ee91.gif') no-repeat center center fixed;
      background-size: cover;
      transition: filter 0.3s ease;
    }

    .help-button {
      position: absolute;
      top: 662px;
      right: 50px;
      z-index: 10;
      font-size: 1.2rem;
      background-color: #589680; 
      color: white;
      border: none;
      padding: 5px 24px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .help-button:hover {
      background-color: #c82333;
      cursor: pointer;
    }

    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 20;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      padding: 30px;
      width: 90%;
      max-width: 500px;
    }

    .popup-header {
      background-color: #007bff;
      color: white;
      padding: 15px;
      text-align: center;
      border-radius: 15px 15px 0 0;
    }

    .popup-body {
      padding: 20px;
    }

    .popup-footer {
      text-align: right;
    }

    .popup-footer .btn {
      margin: 5px;
      width:201px;
    }

    .navbar {
      background: #f8f9fa;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-size: 24px;
      font-weight: bold;
      color: #28a745 !important;
    }

    .navbar-brand span {
      color: #17a2b8;
    }

    .listitems li a {
      color: #343a40 !important;
      font-size: 18px;
      font-weight: bold;
      padding: 8px 15px;
      transition: all 0.3s ease-in-out;
    }

    .listitems li a:hover {
      color: #fff !important;
      background-color: #007bff;
      border-radius: 5px;
    }

    .listitems li:last-child .nav-link {
      color: #fff !important;
      background: #dc3545;
      border-radius: 20px;
      padding: 8px 20px;
      font-size: 16px;
      transition: background 0.3s ease-in-out;
    }

    .listitems li:last-child .nav-link:hover {
      background: #bd2130;
      color: #fff !important;
    }

    .navbar-toggler {
      border: none;
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }

    @media (max-width: 991px) {
      .listitems li a {
        padding: 10px;
        text-align: center;
        display: block;
      }
    }
  </style>
</head>
<body>
<?php include("includes/dashboardnav.php") ?>


<button class="btn help-button" onclick="showPopup()">Help</button>


<div class="popup" id="popupForm">
  <div class="popup-header">
    <h3>Customer Support</h3>
  </div>
  <div class="popup-body">
<form>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <label for="issue" class="form-label">Issue</label>
        <textarea class="form-control" id="issue" name="issue" rows="3" placeholder="Describe your issue"></textarea>
      </div>
      <div class="mb-3">
        <label for="file" class="form-label">Attach File</label>
        <input type="file" class="form-control" id="attachment" name="attachment">
        <br>
        <img id="previewImg" alt="Uploaded Image Preview" width="80px" height="80px" style="display:none;">

      </div>
    </form>
  </div>
  <div class="popup-footer">
    <button class="btn btn-danger" onclick="hidePopup()">Close</button>
    <button class="btn btn-success" onclick="update(event)">Submit</button>
  </div>
</div>

</body>
</html>
<script src="js/support.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
  function showPopup() {
    document.getElementById('popupForm').style.display = 'block';
    document.body.classList.add('blur');
  }

  function hidePopup() {
    document.getElementById('popupForm').style.display = 'none';
    document.body.classList.remove('blur');
  }
</script>


