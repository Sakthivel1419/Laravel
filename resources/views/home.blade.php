@extends('layouts.app')


@section('content')
<link href="{{asset('css/dash_style.css')}}" rel="stylesheet" />

<!-- Bootstrap CDN -->
<link href="https://bootswatch.com/4/cosmo/bootstrap.min.css" rel="stylesheet" />



<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

{{-- <script src="{{asset('js/views/home.js')}}"></script> --}}





{{-- <div class="container"> --}}
    {{-- <div class="row justify-content-center"> --}}
<div id=wrapper>
    <div id="sidebar-wrapper" class="d-none d-lg-block">

        {{-- <div class="col-md-8"> --}}
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
            <!--Main Navigation-->
          <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
              <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">

                  <a href="{{ url('/dashboard') }}" class="list-group-item list-group-item-action py-2 ripple {{ (\Request::path() == 'dashboard') ? "active" : ""  }}">
                      <i class="fas fa-chart-area fa-fw me-3"></i><span>Dashboard</span>
                  </a>

                  <a href="{{ url('/company') }}" id="companyId" class="list-group-item list-group-item-action py-2 ripple {{ (\Request::path() == 'company') ? "active" : ""  }} ">
                      <i class="fas fa-lock fa-fw me-3"></i><span>Company</span>
                  </a>

                  @if(Auth::user()->role == 1)
                    <a href="{{ url('/users') }}" class="list-group-item list-group-item-action py-2 ripple {{ (\Request::path() == 'users') ? "active" : ""  }}">
                        <i  class="fas fa-chart-line fa-fw me-3"></i><span>Users</span>
                    </a>
                  @endif

                  <a href="{{ url('/products') }}" class="list-group-item list-group-item-action py-2 ripple {{ (\Request::path() == 'products') ? "active" : ""  }}">
                      <i class="fas fa-chart-pie fa-fw me-3"></i><span>Products</span>
                  </a>

                  @if(Auth::user()->role == 1)
                    <a href="{{ url('/mapping') }}" class="list-group-item list-group-item-action py-2 ripple {{ (\Request::path() == 'mapping') ? "active" : ""  }}">
                        <i  class="fas fa-chart-bar fa-fw me-3"></i><span>Mapping</span>
                    </a>
                  @endif
                </div>
              </div>
            </nav>
            <!-- Sidebar -->

            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-blue fixed-top">

              <!-- Container wrapper -->
              <div class="container-fluid">

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
                  aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
                </button>

                <!-- Brand -->
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                <a class="navbar-brand">
                    {{-- {{ config('app.name', 'Demo App') }} --}}
                    <img src="{{asset('/js/images/demo_Icon.png')}}"/>

                </a>
                
                <!-- Right links -->
                <ul class="navbar-nav ms-auto d-flex flex-row">

                  <!-- Avatar -->
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item">{{ Auth::user()->role == 1 ? 'admin':'user' }}</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                    
                  </li>
                </ul>
              </div>

              <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->
          </header>
          <!--Main Navigation-->

          <!--Main layout-->
          <div class="workspace p-3" id="workspace">
            <!-- Main content is loaded here -->
              @yield('home-content')
          </div>
          <!--Main layout-->
        {{-- </div> --}}
    </div>
</div>


@endsection
