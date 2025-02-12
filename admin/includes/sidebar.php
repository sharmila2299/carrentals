  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0)" class="d-block"><?php echo $_SESSION['username']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="home" class="nav-link">
              <i class="nav-icon fas fa-house text-info"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="manageService" class="nav-link ">
              <i class="nav-icon fas fa-handshake-angle text-info"></i>
              <p>Service</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="manageVehicle" class="nav-link ">
              <i class="nav-icon fa-solid fa-car text-info"></i>
              <p>Vehicles</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="manageBooking" class="nav-link ">
              <i class="nav-icon fa-solid fa-book text-info"></i>
              <p>Bookings</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="manageUser" class="nav-link ">
              <i class="nav-icon fa-solid fa-user text-info"></i>
              <p>User Management</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="removedvehicle" class="nav-link ">
              <i class="nav-icon fa-solid fa-xmark text-info"></i>
              <p>Removed Vehicles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="changePassword" class="nav-link ">
              <i class="nav-icon fas fa-key text-info"></i>
              <p>Change Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-info"></i>
              <p>Logout</p>
            </a>
          </li>
      </nav>
    </div>
  </aside>

  <script>
  // When the document is ready
  document.addEventListener('DOMContentLoaded', function () {
    // Get all nav-links
    const navLinks = document.querySelectorAll('.nav-link');

    // Add event listener for click
    navLinks.forEach(link => {
      link.addEventListener('click', function () {
        // Remove the 'active' class from all links
        navLinks.forEach(item => item.classList.remove('active'));
        
        // Add the 'active' class to the clicked link
        this.classList.add('active');
      });
    });

    // Optionally: To highlight the active link based on the page, use location.pathname
    const currentPath = window.location.pathname;
    navLinks.forEach(link => {
      if (link.href.includes(currentPath)) {
        link.classList.add('active');
      }
    });
  });
</script>
