 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <span class="brand-text font-weight-bold">PHARMACY PANEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../assets/bootsrap-logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Health Mate</a>
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Patients
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="medicine.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Medicine
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="medicine.php" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Prescriptions
              </p>
            </a>
          </li>
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <div class="bottom">
      <a href="processes.php?logout" class="btn btn-info text-white btn-block">
              <i class="nav-icon fas fa-sign-out-alt"></i>
             
                Logout
            </a>
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>