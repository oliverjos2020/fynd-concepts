<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | FYND CONCEPTS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="FYND CONCEPTS" name="description" />
    <meta content="FYND CONCEPTS" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('logo/icon-dark.png') }}">
    {{-- <link rel="icon" type="image/x-icon" href="{{ asset('logo/icon-dark.png') }}"> --}}
    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/toastr.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    @livewireStyles
<style>
    input, select, textarea {
        border: 1px solid #ced4da !important;
    }
    input::placeholder, textarea::placeholder {
    color: #7c7e81 !important;
    }
    .bg-not-active{
        background:#c3cef8 !important;
    }
    .get-items-centered {
        display: flex !important;
        align-items: center;
    }
</style>
</head>

<body data-layout="detached" data-topbar="colored">



    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-end">

                            <div class="dropdown d-inline-block d-lg-none ms-2">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{-- <i class="mdi mdi-magnify"></i> --}}
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..."
                                                    aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="mdi mdi-magnify"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dropdown d-none d-lg-inline-block ms-1">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    data-toggle="fullscreen">
                                    <i class="mdi mdi-fullscreen"></i>
                                </button>
                            </div>


                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect"
                                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img class="rounded-circle header-profile-user"
                                        src="{{asset('assets/images/users/avatar-2.jpg')}}" alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1">{{ Auth::user()->name }}</span>
                                    {{-- <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i> --}}
                                </button>
                                {{-- <div class="dropdown-menu dropdown-menu-end"> --}}
                                    <!-- item-->
                                    {{-- <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}"><i
                                            class="bx bx-user font-size-16 align-middle me-1"></i>
                                        Profile</a> --}}
                                    {{-- <a class="dropdown-item" href="#"><i
                                            class="bx bx-wallet font-size-16 align-middle me-1"></i> My
                                        Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span
                                            class="badge bg-success float-end">11</span><i
                                            class="bx bx-wrench font-size-16 align-middle me-1"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                                        Lock screen</a> --}}
                                    {{-- <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                                        Logout</a> --}}
                                {{-- </div> --}}
                            </div>



                        </div>
                        <div>
                            <button type="button"
                                class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                                id="vertical-menu-btn">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <a href="/" class="logo logo-dark">
                                    {{-- <span class="logo-sm">

                                        <img src="{{asset('logo/d-logo-light.png')}}" alt="" height="35">
                                    </span>
                                    <span class="logo-lg">

                                        <img src="{{asset('logo/d-logo-dark.png')}}" alt="" height="35">
                                    </span> --}}
                                    <h4>FYND CONCEPTS</h4>
                                </a>

                                <a href="/" class="logo logo-light">
                                    {{-- <span class="logo-sm">

                                        <img src="{{asset('logo/d-logo-light.png')}}" alt="" height="35">
                                    </span>
                                    <span class="logo-lg">

                                        <img src="{{asset('logo/d-logo-light.png')}}" alt="" height="35">
                                    </span> --}}
                                    <h4 style="color: white; padding-top: 20px; font-weight: bolder;">FYND CONCEPTS</h4>
                                </a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </header> <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div class="h-100">

                    <div class="user-wid text-center py-4">
                        <div class="user-img">
                            <img src="{{asset('assets/images/users/avatar-2.jpg')}}" alt="" class="avatar-md mx-auto rounded-circle">
                        </div>

                        <div class="mt-3">

                            <a href="#" class="text-body fw-medium font-size-16">{{ Auth::user()->name }}</a>
                            <p class="text-muted mt-1 mb-0 font-size-13">Role:{{ Auth::user()->role->role}}</p>

                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            @if(Auth::user()->role_id == 1)
                            <li>
                                <a href="/dashboard2" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effecxt">
                                    <i class="mdi mdi-settings-outline"></i>
                                    <span>Authorization</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/role">Role Setup</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="/category" class="waves-effect">
                                    <i class="mdi mdi-hexagon-multiple-outline"></i>
                                    <span>Category</span>
                                </a>
                            </li>
                            <li>
                                <a href="/register-client" class="waves-effect">
                                    <i class="mdi mdi-account-supervisor-outline"></i>
                                    <span>Create Client</span>
                                </a>
                            </li>
                            <li>
                                <a href="/users" class="waves-effect">
                                    <i class="mdi mdi-account-supervisor-outline"></i>
                                    <span>User Management</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="mdi mdi-account-supervisor-outline"></i>
                                    <span>Clients</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="/client-management/all">All Clients</a></li>
                                    <li><a href="/client-management/local">Local Clients</a></li>
                                    <li><a href="/client-management/international">International Clients</a></li>
                                    <li><a href="/client-management/other">Other Clients </a></li>
                                </ul>
                            </li>
                            @elseif(Auth::user()->role_id == 2)
                                <li>
                                    <a href="/dashboard2" class="waves-effect">
                                        <i class="mdi mdi-airplay"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/register-client" class="waves-effect">
                                        <i class="mdi mdi-account-supervisor-outline"></i>
                                        <span>Create Client</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="mdi mdi-account-supervisor-outline"></i>
                                        <span>Clients</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="/client-management/all">All Clients</a></li>
                                        <li><a href="/client-management/local">Local Clients</a></li>
                                        <li><a href="/client-management/international">International Clients</a></li>
                                        <li><a href="/client-management/other">Other Clients </a></li>
                                    </ul>
                                </li>
                            @endif


                            <li class="menu-title">Components</li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>

                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->

                    <!-- end page title -->
                    {{-- @yield('content') --}}
                    {{ $slot }}


                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © FYND CONCEPTS.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Designed By Oliver's Concept
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
    <!-- end container-fluid -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- apexcharts -->
    {{-- <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script> --}}

    <!-- jquery.vectormap map -->
    <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>
    <script src="{{asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>

    <!-- form wizard init -->
    <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>

    <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>


   <script>
    document.addEventListener('livewire:load', function () {
        window.addEventListener('notify', event => {
            toastr[event.detail.type](event.detail.message);
        });
    });

</script>
{{-- @livewire('paypal-payment') --}}
@livewireScripts
</body>

</html>
