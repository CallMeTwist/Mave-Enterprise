<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('app.name') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo/favicon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/logo/favicon.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/logo/favicon.png') }}" sizes="16x16" type="image/png">

    <title>{{ $title ?? 'Welcome' }} | {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('kit/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/bootstrap-utilities.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/helpers.css') }}" rel="stylesheet">

    {{ $css ?? '' }}

</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-whitesmoke">
        <a class="navbar-brand text-center pt-4" href="{{ route('admin.dashboard.home') }}">
            <img src="{{ asset('assets/img/logo/favicon.png') }}" class="w-50" />
        </a>
        <div class="d-flex align-items-center justify-content-between">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard.settings.manage') }}">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light bg-whitesmoke" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard.home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt m-r-10"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link collapsed {{ request()->is('admin/dashboard/settings/*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings"
                           aria-expanded="{{ request()->is('admin/dashboard/settings/*') ? 'true' : 'false' }}" aria-controls="collapseRealtors">
                            <div class="sb-nav-link-icon"><i class="fas fa-cogs m-r-10"></i></div>
                            System Settings
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ request()->is('admin/dashboard/settings/*') ? 'show' : '' }}" id="collapseSettings" aria-labelledby="System Settings" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ request()->is('admin/dashboard/settings/profile') ? 'active' : '' }}" href="{{ route('admin.dashboard.settings.profile.manage') }}">
                                    <i class="fa fa-user-cog m-r-10"></i> Account Settings</a>
                                <a class="nav-link {{ request()->is('panel/dashboard/settings/manage') ? 'active' : '' }}" href="{{ route('admin.dashboard.settings.manage') }}">
                                    <i class="fa fa-cogs m-r-10"></i> System Settings</a>
                            </nav>
                        </div>

                        <a class="nav-link {{ request()->is('admin/dashboard/website/testimonials') ? 'active' : '' }}" href="{{ route('admin.dashboard.testimonials.manage') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-comment-dots m-r-10"></i></div>
                            Testimonials
                        </a>
                        <a class="nav-link {{ request()->is('admin/dashboard/website/faqs') ? 'active' : '' }}" href="{{ route('admin.dashboard.faqs.manage') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-question-circle m-r-10"></i></div>
                            FAQs
                        </a>
                        <a class="nav-link {{ request()->is('admin/dashboard/website/team') ? 'active' : '' }}" href="{{ route('admin.dashboard.team.manage') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog m-r-10"></i></div>
                            Team Members
                        </a>
                        <a class="nav-link {{ request()->is('admin/dashboard/website/projects') ? 'active' : '' }}" href="{{ route('admin.dashboard.projects.manage') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-road m-r-10"></i></div>
                            Projects
                        </a>
                        <a class="nav-link {{ request()->is('admin/dashboard/website/events') ? 'active' : '' }}" href="{{ route('admin.dashboard.events.manage') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-check m-r-10"></i></div>
                            Events
                        </a>
                        <a class="nav-link {{ request()->is('admin/dashboard/website/gallery') ? 'active' : '' }}" href="{{ route('admin.dashboard.galleries.manage') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-photo-film m-r-10"></i></div>
                            Galleries
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ me()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 pb-4">
                    <h1 class="mt-4">{{ $title ?? 'Dashboard'}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.home') }}">Dashboard</a></li>
                        {!! $breadcrumb ?? '' !!}
                    </ol>

                    <x-kit._partials._alert />
                    <x-kit._partials._errors />

                    {!! $slot !!}

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</div>
                        <span class="text-muted text-uppercase">Gizmo v3.5.6</span>
                        <p class="mb-0">A product of <a href="https://thepragmaticapproach.com" target="_blank" class="col-red">Deved Solutions</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('kit/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('kit/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('kit/assets/js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('kit/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('kit/assets/js/clipboard.min.js') }}"></script>
    <script>
        new ClipboardJS('.btn');
    </script>

    {{ $scripts ?? '' }}
</body>
</html>
