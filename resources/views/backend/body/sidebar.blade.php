@php
  $route = Route::current()->getName();
  $prefix = Request::route()->getPrefix();
@endphp

<!-- Start Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
 {{-- <!-- Brand Logo -->
 <a href="#" class="brand-link">
   <img src="{{ asset('backend/dist/img/AdminLTELogo.png ') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Admin Panel</span>
 </a> --}}

 <!-- Sidebar -->
 <div class="sidebar">
   <!-- Sidebar user panel (optional) -->
   <div class="user-panel mt-3 pb-3 mb-3 d-flex">
     <div class="image">
       <img src="{{ asset('backend/dist/img/user2-160x160.jpg ')}}" class="img-circle elevation-2" alt="User Image">
     </div>
     <div class="info">
       <a href="#" class="d-block">Admin</a>
     </div>
   </div>


   <!-- Sidebar Menu -->
   <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item menu-open">
         <a href="{{ route('admin.dashboard') }}" class="nav-link {{(request()->route()->getName()=='admin.dashboard')?'active':''}}">
           <i class="nav-icon fas fa-tachometer-alt"></i>
           <p>
             Dashboard
           </p>
         </a>
      </li>
      {{-- <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='category.create')?'active':''}}
             {{(request()->route()->getName()=='property.index')?'active':''}}
             {{(request()->route()->getName()=='category.edit')?'active':''}}
             {{(request()->route()->getName()=='category.view')?'active':''}}

             {{(request()->route()->getName()=='property.index')?'active':''}}
             {{(request()->route()->getName()=='property.create')?'active':''}}
             {{(request()->route()->getName()=='property.edit')?'active':''}}
             {{(request()->route()->getName()=='property.view')?'active':''}}

             {{(request()->route()->getName()=='property.purpose.index')?'active':''}}
             {{(request()->route()->getName()=='property.purpose.create')?'active':''}}
             {{(request()->route()->getName()=='property.purpose.view')?'active':''}}
             {{(request()->route()->getName()=='property.purpose.edit')?'active':''}}

             {{(request()->route()->getName()=='property-type.index')?'active':''}}
             {{(request()->route()->getName()=='property-type.create')?'active':''}}
             {{(request()->route()->getName()=='property-type.edit')?'active':''}}
             {{(request()->route()->getName()=='property-type.view')?'active':''}}

             {{(request()->route()->getName()=='property.nearest.locations.index')?'active':''}}
             {{(request()->route()->getName()=='property.nearest.locations.create')?'active':''}}
             {{(request()->route()->getName()=='property.nearest.locations.edit')?'active':''}}
             {{(request()->route()->getName()=='property.nearest.locations.view')?'active':''}}

             {{(request()->route()->getName()=='property.aminity.index')?'active':''}}
             {{(request()->route()->getName()=='property.aminity.create')?'active':''}}
             {{(request()->route()->getName()=='property.aminity.edit')?'active':''}}
             {{(request()->route()->getName()=='property.aminity.view')?'active':''}}


         ">
           <i class="fas fa-users-cog"></i>
           <p>
            Real Estate
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('property.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>My Properties</p>
             </a>
           </li>
           <!-- <li class="nav-item">
             <a href="#" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Agent Properties</p>
             </a>
          </li> -->
          <li class="nav-item">
             <a href="{{ route('property.purpose.index') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Property Purpose</p>
             </a>
          </li>
           <li class="nav-item">
             <a href="{{ route('property-type.index') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Property Types</p>
             </a>
          </li>
          <li class="nav-item">
             <a href="{{ route('property.nearest.locations.index') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Nearest Locations</p>
             </a>
          </li>
          <li class="nav-item">
             <a href="{{ route('property.aminity.index') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Aminities</p>
             </a>
          </li>
        </ul>
      </li>
       <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='location.country.create')?'active':''}}
             {{(request()->route()->getName()=='location.country.edit')?'active':''}}
             {{(request()->route()->getName()=='location.country.index')?'active':''}}
             {{(request()->route()->getName()=='location.country.view')?'active':''}}

             {{(request()->route()->getName()=='location.state.view')?'active':''}}
             {{(request()->route()->getName()=='location.state.create')?'active':''}}
             {{(request()->route()->getName()=='location.state.index')?'active':''}}
             {{(request()->route()->getName()=='location.state.edit')?'active':''}}

             {{(request()->route()->getName()=='location.city.create')?'active':''}}
             {{(request()->route()->getName()=='location.city.edit')?'active':''}}
             {{(request()->route()->getName()=='location.city.view')?'active':''}}
             {{(request()->route()->getName()=='location.city.index')?'active':''}}
         ">
           <i class="fas fa-users-cog"></i>
           <p>
            Locations
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('location.country.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Country</p>
             </a>
           </li>
          <li class="nav-item">
             <a href="{{ route('location.state.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage State</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('location.city.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage City</p>
             </a>
           </li>
        </ul>
      </li> --}}
      <li class="nav-item">
         <a href="#" class="nav-link 
         {{(request()->route()->getName()=='general.setting')?'active':''}}
         ">
         <i class="fa-solid fa-gear"></i>
           <p>
             Advance Setting
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('general.setting') }}" class="nav-link {{(request()->route()->getName()=='general.setting')?'active':''}}">
               <i class="far fa-circle nav-icon"></i>
               <p>General Setting</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='category.create')?'active':''}}
             {{(request()->route()->getName()=='category.index')?'active':''}}
             {{(request()->route()->getName()=='category.edit')?'active':''}}
             {{(request()->route()->getName()=='category.view')?'active':''}}
         ">
         <i class="fa-solid fa-bag-shopping"></i>
           <p>
            Categories
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('category.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Category</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('category.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Category</p>
             </a>
          </li>
        </ul>
      </li>
       <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='section.create')?'active':''}}
             {{(request()->route()->getName()=='section.index')?'active':''}}
             {{(request()->route()->getName()=='section.edit')?'active':''}}
             {{(request()->route()->getName()=='section.view')?'active':''}}
         ">
         <i class="fa-solid fa-building"></i>
           <p>
            Sections
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('section.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Section</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('section.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Section</p>
             </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='about.create')?'active':''}}
             {{(request()->route()->getName()=='about.index')?'active':''}}
             {{(request()->route()->getName()=='about.edit')?'active':''}}
             {{(request()->route()->getName()=='about.view')?'active':''}}
         ">
         <i class="fa-solid fa-address-card"></i>
           <p>
            About
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('about.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage About</p>
             </a>
           </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link 
            {{(request()->route()->getName()=='tour.create')?'active':''}}
            {{(request()->route()->getName()=='tour.index')?'active':''}}
            {{(request()->route()->getName()=='tour.edit')?'active':''}}
            {{(request()->route()->getName()=='tour.view')?'active':''}}
        ">
        <i class="fa-solid fa-plane"></i>
          <p>
           Tours
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('tour.index') }}" class="nav-link 
           
            ">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage Tours</p>
            </a>
          </li>
       </ul>
     </li>
   <li class="nav-item">
    <a href="#" class="nav-link 
        {{(request()->route()->getName()=='video.create')?'active':''}}
        {{(request()->route()->getName()=='video.index')?'active':''}}
        {{(request()->route()->getName()=='video.edit')?'active':''}}
        {{(request()->route()->getName()=='video.view')?'active':''}}
    ">
    <i class="fa-solid fa-video"></i>
      <p>
       Videos
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('video.index') }}" class="nav-link 
       
        ">
          <i class="far fa-circle nav-icon"></i>
          <p>Manage Videos</p>
        </a>
      </li>
   </ul>
 </li>
      {{-- <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='service.create')?'active':''}}
             {{(request()->route()->getName()=='service.index')?'active':''}}
             {{(request()->route()->getName()=='service.edit')?'active':''}}
             {{(request()->route()->getName()=='service.view')?'active':''}}
         ">
           <i class="fas fa-users-cog"></i>
           <p>
            Services
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('service.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Services</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('service.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Services</p>
             </a>
          </li>
        </ul>
      </li> --}}
      {{-- <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='agent.create')?'active':''}}
             {{(request()->route()->getName()=='agent.index')?'active':''}}
             {{(request()->route()->getName()=='agent.edit')?'active':''}}
             {{(request()->route()->getName()=='agent.view')?'active':''}}
         ">
           <i class="fas fa-users-cog"></i>
           <p>
            Director
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('agent.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Director</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('agent.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Director</p>
             </a>
          </li>
        </ul>
      </li> --}}
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='testimonial.create')?'active':''}}
             {{(request()->route()->getName()=='testimonial.index')?'active':''}}
             {{(request()->route()->getName()=='testimonial.edit')?'active':''}}
             {{(request()->route()->getName()=='testimonial.view')?'active':''}}
         ">
         <i class="fa-solid fa-users"></i>
           <p>
            Testimonial
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('testimonial.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Testimonial</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('testimonial.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Testimonial</p>
             </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='slider.create')?'active':''}}
             {{(request()->route()->getName()=='slider.index')?'active':''}}
             {{(request()->route()->getName()=='slider.edit')?'active':''}}
             {{(request()->route()->getName()=='slider.view')?'active':''}}
         ">
         <i class="fa-solid fa-sliders"></i>
           <p>
            Slider
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('slider.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Slider</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('slider.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Slider</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='brand.create')?'active':''}}
             {{(request()->route()->getName()=='brand.index')?'active':''}}
             {{(request()->route()->getName()=='brand.edit')?'active':''}}
             {{(request()->route()->getName()=='brand.view')?'active':''}}
         ">
         <i class="fa-solid fa-photo-film"></i>
           <p>
            Brands
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('brand.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Brand</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('brand.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Brand</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='counter.create')?'active':''}}
             {{(request()->route()->getName()=='counter.index')?'active':''}}
             {{(request()->route()->getName()=='counter.edit')?'active':''}}
             {{(request()->route()->getName()=='counter.view')?'active':''}}
         ">
         <i class="fa-solid fa-rotate"></i>
           <p>
            Counters
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('counter.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Counter</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('counter.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Counter</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
             {{(request()->route()->getName()=='blog.create')?'active':''}}
             {{(request()->route()->getName()=='blog.index')?'active':''}}
             {{(request()->route()->getName()=='blog.edit')?'active':''}}
             {{(request()->route()->getName()=='blog.view')?'active':''}}

             {{(request()->route()->getName()=='blog.category.create')?'active':''}}
             {{(request()->route()->getName()=='blog.category.index')?'active':''}}
             {{(request()->route()->getName()=='blog.category.edit')?'active':''}}
             {{(request()->route()->getName()=='blog.category.view')?'active':''}}

         ">
         <i class="fa-solid fa-calendar-days"></i>
           <p>
            Blogs
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('blog.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Blog</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('blog.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Blog</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('blog.category.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Blog Category</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('blog.category.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Blog Category</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="#" class="nav-link 
           {{(request()->route()->getName()=='pages.create')?'active':''}}
             {{(request()->route()->getName()=='pages.index')?'active':''}}
             {{(request()->route()->getName()=='pages.edit')?'active':''}}
             {{(request()->route()->getName()=='pages.view')?'active':''}}
         ">
         <i class="fa-brands fa-windows"></i>
           <p>
            Pages
             <i class="right fas fa-angle-left"></i>
           </p>
         </a>
         <ul class="nav nav-treeview">
           <li class="nav-item">
             <a href="{{ route('pages.index') }}" class="nav-link 
            
             ">
               <i class="far fa-circle nav-icon"></i>
               <p>Manage Pages</p>
             </a>
           </li>
           <li class="nav-item">
             <a href="{{ route('pages.create') }}" class="nav-link">
               <i class="far fa-circle nav-icon"></i>
               <p>Add Pages</p>
             </a>
           </li>
         </ul>
      </li>
      <li class="nav-item">
         <a href="{{ route('admin.logout') }}" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
           <p>
             Logout
           </p>
         </a>
      </li>
     </ul>
   </nav>
   <!-- /.sidebar-menu -->
 </div>
 <!-- /.sidebar -->
</aside>
<!-- End Main Sidebar Container -->