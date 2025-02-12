<style>

  .navbar {
    background: #f8f9fa;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .navbar-brand {
    font-size: 24px;
    
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

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home"><span>Spondia's</span> Rentals</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto listitems">
      <li class="nav-item">
        <a class="nav-link" href="home">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userprofile">User Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="changepassword">Change Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="custmorservice">Custmor Support</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>