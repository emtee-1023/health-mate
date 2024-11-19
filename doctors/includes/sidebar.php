 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-primary elevation-4">
   <!-- Brand Logo -->
   <a href="dashboard.php" class="brand-link">
     <img src="../img/logo.jpg" alt="Logo" class="brand-image" style="opacity: .8; width: 200px; max-height: 40px;">
   </a> <br>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="../uploads/<?= $_SESSION['pfp'] ?>" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Dr. <?= $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></a>
         <span><?= $_SESSION['clinic'] ?></span>
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
           <a href="index.php" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>

         <li class="nav-item">
           <a href="appointments.php" class="nav-link">
             <i class="nav-icon fas fa-calendar-alt"></i>
             <p>
               Appointments
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="prescriptions.php" class="nav-link">
             <i class="nav-icon fas fa-pills"></i>
             <p>
               Prescriptions
             </p>
           </a>
         </li>

         </li>
         <li class="nav-item">
           <a href="patients.php" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
             <p>
               Patients
             </p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
     <div class="bottom">
       <a href="processes.php?logout" class="btn btn-primary text-white btn-block">
         <i class="nav-icon fas fa-sign-out-alt"></i>
         Logout
       </a>
     </div>
   </div>
   <!-- /.sidebar -->
 </aside>