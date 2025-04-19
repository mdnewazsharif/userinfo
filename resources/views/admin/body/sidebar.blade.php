@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
  $appname = env("APP_NAME", "");
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{route('admin.dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{asset('upload/logo.png')}}" width="60" alt="">
						  <h3><b> {{$appname}} </b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{ ($route == 'admin.dashboard')? 'active':'' }}">
            <a href="{{ url('dashboard') }}">
              <i data-feather="pie-chart"></i>

              <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ ($route == 'user.create')? 'active':'' }}">
            <a href="{{ route('user.create') }}">
              <i data-feather="user-plus"></i>

              <span>Create New User</span>
            </a>
        </li>

        
        <li class="{{ ($route == 'user.all')? 'active':'' }}">
            <a href="{{ route('user.all') }}">
              <i data-feather="users"></i>

              <span>All Users</span>
            </a>
        </li>

        <li class="{{ ($route == 'user.deleted.all')? 'active':'' }}">
            <a href="{{ route('user.deleted.all') }}">
              <i data-feather="user-x"></i>

              <span>Blocked Users</span>
            </a>
        </li>

        <li class="{{ ($route == 'user.password.reset.view')? 'active':'' }}">
            <a href="{{ route('user.password.reset.view') }}">
              <i data-feather="refresh-cw"></i>

              <span>Reset User Password</span>
            </a>
        </li>


  


      </ul>
    </section>


  </aside>
