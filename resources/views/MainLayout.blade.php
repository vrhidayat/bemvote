<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Bemvote">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery">
    <meta property="og:title" content="Bemvote">
    <meta property="og:description" content="Bemvote">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="{{ asset('theme/images/favicon.svg') }}">

    <!-- Title -->
    <title>Bemvote</title>


    <!-- *************
   ************ Common Css Files *************
  ************ -->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}

    <!-- Animated css -->
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}">

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="{{ asset('theme/fonts/bootstrap/bootstrap-icons.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('theme/css/main.min.css') }}">


    <!-- *************
   ************ Vendor Css Files *************
  ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('theme/vendor/overlay-scroll/OverlayScrollbars.min.css') }}">

    <!-- Data Tables -->
    <link rel="stylesheet" href="{{ asset('theme/vendor/datatables/dataTables.bs5.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/vendor/datatables/dataTables.bs5-custom.css') }}" />

    <!-- Date Range CSS -->
    <link rel="stylesheet" href="{{ asset('theme/vendor/daterange/daterange.css') }}">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="{{ asset('theme/vendor/calendar/css/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/vendor/calendar/css/custom.css') }}" />
</head>

<body>

    <!-- Loading wrapper start -->
    <!-- <div id="loading-wrapper">
   <div class="spinner">
                <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
    <div class="line4"></div>
    <div class="line5"></div>
    <div class="line6"></div>
            </div>
  </div> -->
    <!-- Loading wrapper end -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Sidebar wrapper start -->
        <nav class="sidebar-wrapper">

            <!-- Sidebar brand starts -->
            <div class="sidebar-brand">
                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('theme/images/logo.svg') }}" alt="Admin Dashboards" />
                </a>
            </div>
            <!-- Sidebar brand starts -->

            <!-- Sidebar menu starts -->
            <div class="sidebar-menu">
                <div class="sidebarMenuScroll">
                    <ul>
                        <li class="{{ request()->routeIs('home') ? 'active-page-link' : '' }}">
                            <a href="{{ route('home') }}">
                                <i class="bi bi-house"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        @if (auth()->user()->role == 'admin')
                            <li class="{{ request()->routeIs('kandidat') ? 'active-page-link' : '' }}">
                                <a href="{{ route('kandidat') }}">
                                    <i class="bi bi-person-square"></i>
                                    <span class="menu-text">Kandidat</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('user') ? 'active-page-link' : '' }}">
                                <a href="{{ route('user') }}">
                                    <i class="bi bi-person"></i>
                                    <span class="menu-text">User</span>
                                </a>
                            </li>
                        @endif
                        <li
                            class="sidebar-dropdown {{ (request()->routeIs('jadwal') ? 'active' : request()->routeIs('calendar')) ? 'active' : '' }}">
                            <a href="#">
                                <i class="bi bi-calendar"></i>
                                <span class="menu-text">Jadwal</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    @if (auth()->user()->role == 'admin')
                                        <li>
                                            <a href="{{ route('jadwal') }}"
                                                class="{{ request()->routeIs('jadwal') ? 'current-page' : '' }}">Jadwal</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('calendar') }}"
                                            class="{{ request()->routeIs('calendar') ? 'current-page' : '' }}">Calendar</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="{{ request()->routeIs('event') ? 'active-page-link' : '' }}">
                            <a href="{{ route('event') }}">
                                <i class="bi bi-collection"></i>
                                <span class="menu-text">Event</span>
                            </a>
                        </li>
                        {{-- <li class="{{ request()->routeIs('jadwal') ? 'active-page-link' : '' }}">
                            <a href="{{ route('jadwal') }}">
                                <i class="bi bi-calendar"></i>
                                <span class="menu-text">Jadwal</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <!-- Sidebar menu ends -->

        </nav>
        <!-- Sidebar wrapper end -->

        <!-- *************
    ************ Main container start *************
   ************* -->
        <div class="main-container">

            <!-- Page header starts -->
            <div class="page-header">

                <div class="toggle-sidebar" id="toggle-sidebar"><i class="bi bi-list"></i></div>

                <!-- Breadcrumb start -->
                @yield('breadcrumbs')
                <!-- Breadcrumb end -->

                <!-- Header actions ccontainer start -->
                <div class="header-actions-container">

                    <!-- Search container start -->
                    <div class="search-container">

                        <!-- Search input group start -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search anything">
                            <button class="btn" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <!-- Search input group end -->

                    </div>
                    <!-- Search container end -->

                    <!-- Leads start -->
                    <a href="orders.html" class="leads d-none d-xl-flex">
                        <div class="lead-details">You have <span class="count"> 21 </span> new leads </div>
                        <span class="lead-icon"><i
                                class="bi bi-bell-fill animate__animated animate__swing animate__infinite infinite"></i><b
                                class="dot animate__animated animate__heartBeat animate__infinite"></b></span>
                    </a>
                    <!-- Leads end -->

                    <!-- Header actions start -->
                    <ul class="header-actions">
                        <li class="dropdown d-none d-md-block">
                            <a href="#" id="countries" data-toggle="dropdown" aria-haspopup="true">
                                <img src="{{ asset('theme/images/flags/1x1/br.svg') }}" class="flag-img"
                                    alt="Admin Panels" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mini" aria-labelledby="countries">
                                <div class="country-container">
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('theme/images/flags/1x1/us.svg') }}"
                                            alt="Clean Admin Dashboards" />
                                    </a>
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('theme/images/flags/1x1/in.svg') }}"
                                            alt="Google Dashboards" />
                                    </a>
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('theme/images/flags/1x1/gb.svg') }}"
                                            alt="AI Admin Dashboards" />
                                    </a>
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('theme/images/flags/1x1/tr.svg') }}"
                                            alt="Modern Dashboards" />
                                    </a>
                                    <a href="{{ route('home') }}">
                                        <img src="{{ asset('theme/images/flags/1x1/ca.svg') }}"
                                            alt="Best Admin Dashboards" />
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                aria-haspopup="true">
                                @auth
                                    <span class="user-name d-none d-md-block">{{ auth()->user()->nama }}</span>
                                @endauth
                                <span class="avatar">
                                    <img src="{{ asset('theme/images/user.png') }}" alt="Admin Templates">
                                    <span class="status online"></span>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userSettings">
                                <div class="header-profile-actions">
                                    <a href="profile.html">Profile</a>
                                    <a href="account-settings.html">Settings</a>
                                    <a href="{{ route('sign.out') }}">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Header actions end -->

                </div>
                <!-- Header actions ccontainer end -->

            </div>
            <!-- Page header ends -->

            <!-- Content wrapper scroll start -->
            @yield('mainContent')
            <!-- Content wrapper scroll end -->

        </div>
        <!-- *************
    ************ Main container end *************
   ************* -->

    </div>
    {{-- Bootstrap 5.3 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> --}}
    <!-- Page wrapper end -->

    <!-- *************
   ************ Required JavaScript Files *************
  ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="{{ asset('theme/js/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/js/modernizr.js') }}"></script>
    <script src="{{ asset('theme/js/moment.js') }}"></script>
    <script src="{{ asset('theme/js/updateStatusJadwal.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <!-- *************
   ************ Vendor Js Files *************
  ************* -->

    <!-- Overlay Scroll JS -->
    <script src="{{ asset('theme/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

    <!-- Input Mask JS -->
    <script src="{{ asset('theme/vendor/input-masks/cleave.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/input-masks/cleave-phone.js') }}"></script>
    <script src="{{ asset('theme/vendor/input-masks/cleave-custom.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('theme/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

    <!-- Custom Data tables -->
    <script src="{{ asset('theme/vendor/datatables/custom/custom-datatables.js') }}"></script>

    <!-- Date Range JS -->
    <script src="{{ asset('theme/vendor/daterange/daterange.js') }}"></script>
    <script src="{{ asset('theme/vendor/daterange/custom-daterange.js') }}"></script>

    <!-- Calendar JS -->
    <script src="{{ asset('theme/vendor/calendar/js/main.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/calendar/custom/daygrid-calendar.js') }}"></script>

    <!-- Main Js Required -->
    <script src="{{ asset('theme/js/main.js') }}"></script>


</body>

</html>
