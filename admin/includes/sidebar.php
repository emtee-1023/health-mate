 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4">
   <!-- Brand Logo -->
   <a href="dashboard.php" class="brand-link">
     HealthMate
     <span class="brand-text font-weight-light">ADMIN PANEL</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="../uploads/profile.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Mark Talamson</a>
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
           <a href="doctors.php" class="nav-link">
             <i class="nav-icon fas fa-user-md"></i>
             <p>
               Doctors
             </p>
           </a>
         </li>
         <li class="nav-item">
           <a href="users.php" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
             <p>
               Users
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
           <a href="appointments.php" class="nav-link">
             <i class="nav-icon fas fa-calendar-alt"></i>
             <p>
               Appointments
             </p>
           </a>
         </li>

         <li class="nav-header">My Clients</li>
         <li class="nav-item">
           <a href="leads.php" class="nav-link">
             <i class="nav-icon fas fa-user-plus"></i>
             <p>
               Contact Us
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