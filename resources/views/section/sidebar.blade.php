  <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
      <div class="logo">
        <a href="/" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ url('/assets/img/logo-small.png')}}">
          </div>
        </a>
        <a href="/" class="simple-text logo-normal">
          {{config('app.name')}}
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          @guest
          <li class="nav-item btn-rotate dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nc-icon nc-lock-circle-open"></i> Login
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item {{Request::path() ==='login' ? 'bg-secondary text-light':''}}" href="{{ url('/login')}}?redirect_to=/dashboard">Admin Login</a>
              <a class="dropdown-item {{Request::path() ==='patient-login' ? 'bg-secondary text-light':''}}" href="{{ url('/patient-login')}}?redirect_to=/dashboard">Patient Login</a>
              <a class="dropdown-item {{Request::path() ==='doctor-login' ? 'bg-secondary text-light':''}}" href="{{ url('/doctor-login')}}?redirect_to=/dashboard">Doctor Login</a>
              <a class="dropdown-item {{Request::path() ==='receptionist-login' ? 'bg-secondary text-light':''}}" href="{{ url('/receptionist-login')}}?redirect_to=/dashboard">Receptionist Login</a>
            </div>
          </li>

          <li class="nav-item btn-rotate dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nc-icon nc-badge"></i> Register
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item {{Request::path() ==='patient-register' ? 'bg-secondary text-light':''}}" href="{{ url('/patient-register')}}">Patient Register</a>
              <a class="dropdown-item {{Request::path() ==='doctor-register' ? 'bg-secondary text-light':''}}" href="{{ url('/doctor-register')}}">Doctor Register</a>
            </div>
          </li>
          @else
          <li>
            <a href="/dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @include ('section.admin_sidebar')
          @include ('section.patient_sidebar')
          @include ('section.doctor_sidebar')
          @include ('section.hospital_sidebar')
          @endguest
        </ul>
      </div>
    </div>