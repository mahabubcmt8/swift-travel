<style>
  .nav-pills .nav-link {
  color: #f5f5f5;
  }
  .nav-pills .nav-link:not(.active):hover {
      color: #e2fb10;
  }
  .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
      background-color: #d8f1057a;
  }

  .nav-pills .nav-link {
      color: #fff;
  }

  [class*=sidebar-dark-] {
  background-color: #28a745;
  }

  [class*=sidebar-dark-] .sidebar a {
  color: #fff;
  }

  [class*=sidebar-dark] .user-panel {
  border-bottom: 1px solid #fff;
}
.navbar-light .navbar-nav .nav-link {
    color: #fff;
}
.nav-sidebar .nav-link p {
    color: #fff;
}
[class*=sidebar-dark-] .nav-sidebar>.nav-item>.nav-treeview {
    background-color: #af0c9d;
    color: #fff;
}
.nav-sidebar>.nav-item .nav-icon {
  color: #fff;
}
.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
    color: #fff;
}
</style>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#17A2B8;">
 <!-- Left navbar links -->
 <ul class="navbar-nav">
   <li class="nav-item">
     <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
   </li>
   <li class="nav-item d-none d-sm-inline-block text-center">
     <a class="btn btn-success" target="_blank" href="{{ route('home') }}" class="nav-link">Visit Site</a>
   </li>
 </ul>

 <!-- Right navbar links -->
 <ul class="navbar-nav ml-auto">
   <!-- Messages Dropdown Menu -->
   <li class="nav-item dropdown">
     <a class="nav-link" data-toggle="dropdown" href="#">
       <i class="far fa-comments"></i>
       <span class="badge badge-danger navbar-badge">3</span>
     </a>
     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       <a href="#" class="dropdown-item">
         <!-- Message Start -->
         <div class="media">
           <img src="{{ asset('backend/dist/img/user1-128x128.jpg ') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
           <div class="media-body">
             <h3 class="dropdown-item-title">
               Brad Diesel
               <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
             </h3>
             <p class="text-sm">Call me whenever you can...</p>
             <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
           </div>
         </div>
         <!-- Message End -->
       </a>
       <div class="dropdown-divider"></div>
       <a href="#" class="dropdown-item">
         <!-- Message Start -->
         <div class="media">
           <img src="{{ asset('backend/dist/img/user8-128x128.jpg ') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
           <div class="media-body">
             <h3 class="dropdown-item-title">
               John Pierce
               <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
             </h3>
             <p class="text-sm">I got your message bro</p>
             <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
           </div>
         </div>
         <!-- Message End -->
       </a>
       <div class="dropdown-divider"></div>
       <a href="#" class="dropdown-item">
         <!-- Message Start -->
         <div class="media">
           <img src="{{ asset('backend/dist/img/user3-128x128.jpg ') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
           <div class="media-body">
             <h3 class="dropdown-item-title">
               Nora Silvester
               <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
             </h3>
             <p class="text-sm">The subject goes here</p>
             <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
           </div>
         </div>
         <!-- Message End -->
       </a>
       <div class="dropdown-divider"></div>
       <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
     </div>
   </li>
   <!-- Notifications Dropdown Menu -->
   <li class="nav-item dropdown">
     <a class="nav-link" data-toggle="dropdown" href="#">
       <i class="far fa-bell"></i>
       <span class="badge badge-warning navbar-badge">15</span>
     </a>
     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
       <span class="dropdown-item dropdown-header">15 Notifications</span>
       <div class="dropdown-divider"></div>
       <a href="#" class="dropdown-item">
         <i class="fas fa-envelope mr-2"></i> 4 new messages
         <span class="float-right text-muted text-sm">3 mins</span>
       </a>
       <div class="dropdown-divider"></div>
       <a href="#" class="dropdown-item">
         <i class="fas fa-users mr-2"></i> 8 friend requests
         <span class="float-right text-muted text-sm">12 hours</span>
       </a>
       <div class="dropdown-divider"></div>
       <a href="#" class="dropdown-item">
         <i class="fas fa-file mr-2"></i> 3 new reports
         <span class="float-right text-muted text-sm">2 days</span>
       </a>
       <div class="dropdown-divider"></div>
       <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
     </div>
   </li>
   <li class="nav-item">
     <a class="nav-link" data-widget="fullscreen" href="#" role="button">
       <i class="fas fa-expand-arrows-alt"></i>
     </a>
   </li>
 </ul>
</nav>
<!-- /.navbar -->