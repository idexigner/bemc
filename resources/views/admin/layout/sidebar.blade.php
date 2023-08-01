<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.html" class="brand-link">
    <img src="{{ url('/')}}/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Mims</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('/')}}/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->title}} {{ auth()->user()->firstname}} {{ auth()->user()->lastname}}</a>
      </div>
    </div>

   

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>Dashboard</p>
          </a>
        </li>
       
        <li class="nav-item"><!--  menu-open -->
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              General Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if(auth()->user()->user_mapping->module_generic == 1)
              <li class="nav-item">
                <a href="{{ route('generic.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generic</p>
                </a>
              </li>
            @endif
            @if(auth()->user()->user_mapping->module_brand == 1)
            <li class="nav-item">
              <a href="{{ route('brand.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->user_mapping->module_manufacturer == 1)
            <li class="nav-item">
              <a href="{{ route('manufacturer.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manufacturer</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->user_mapping->module_dosage_form == 1)
            <li class="nav-item">
              <a href="{{ route('dosageform.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dosage Form</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->user_mapping->module_strength == 1)
            <li class="nav-item">
              <a href="{{ route('strength.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Strength</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->user_mapping->module_pack_size == 1)
            <li class="nav-item">
              <a href="{{ route('packsize.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pack Size</p>
              </a>
            </li>
            @endif
            @if(auth()->user()->user_mapping->module_indication == 1)
            <li class="nav-item">
              <a href="{{ route('indication.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Indication</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @if(auth()->user()->user_mapping->module_scroller == 1)
        <li class="nav-item">
          <a href="{{ route('scroller') }}" class="nav-link">
            <i class="nav-icon fas fa-arrow-left"></i>
            <p>Scroller</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_doctor == 1)
        <li class="nav-item">
          <a href="{{ route('doctor.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Doctor</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_job == 1)
        <li class="nav-item">
          <a href="{{ route('job.index') }}" class="nav-link">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>Job</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_news == 1)
        <li class="nav-item">
          <a href="{{ route('news.index') }}" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>News</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_journal == 1)
        <li class="nav-item">
          <a href="{{ route('journal.index') }}" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>Journal</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_address == 1)
        <li class="nav-item">
          <a href="{{ route('address.index') }}" class="nav-link">
            <i class="nav-icon fas fa-location-arrow"></i>
            <p>Address</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_advertisement == 1)
        <li class="nav-item">
          <a href="{{ route('advertisement.index') }}" class="nav-link">
            <i class="nav-icon fas fa-ad"></i>
            <p>Advertisement</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_special_report == 1)
        <li class="nav-item">
          <a href="{{ route('special_report.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Special Report</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_video == 1)
        <li class="nav-item ">
          <a href="{{ route('video.index') }}" class="nav-link">
            <i class="nav-icon fas fa-video"></i>
            <p>Video</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_user == 1)
        <li class="nav-item ">
          <a href="{{ route('user.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Users</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->user_mapping->module_setting == 1)
        <li class="nav-item"><!--  menu-open -->
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Setting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('setting.country.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Country</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('setting.state.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>State</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('setting.city.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>City</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('setting.address.category.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Address Category</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('setting.location.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Location</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('setting.advertisement.position.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advertisement Position</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('setting.specialization.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Specialization</p>
              </a>
            </li>
           
          </ul>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
    
        
   
        
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>