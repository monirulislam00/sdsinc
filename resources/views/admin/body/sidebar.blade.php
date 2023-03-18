<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center " href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 "> SDSINCBD </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @can('view dashboard')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    @can('affiliate dashboard')
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('affiliate.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Afiiliate Dashboard</span></a>
        </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    @canany([
        'view slider',
        'view products',
        'view features',
        'view portfoli',
        'view partner',
        'view service',
        'view subscribers',
        'view
        blogs',
        'view messages',
        'affiliate service',
        ])
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('view slider')
                        <a class="collapse-item" href="{{ route('slider') }}">Slider</a>
                    @endcan

                    @can('view products')
                        <a class="collapse-item" href="{{ route('products.index') }}">Products</a>
                    @endcan
                    @can('view features')
                        <a class="collapse-item" href="{{ route('feature') }}">Feature</a>
                    @endcan
                    @can('view portfolio')
                        <a class="collapse-item" href="{{ route('portfolio') }}">Portfolio</a>
                    @endcan
                    @can('view partner')
                        <a class="collapse-item" href="{{ route('partner') }}">Partner</a>
                    @endcan
                    @can('view service')
                        <a class="collapse-item" href="{{ route('service') }}">Service</a>
                    @endcan
                    @can('affiliate service')
                        <a class="collapse-item" href="{{ route('affiliate.services') }}">Affiliate service</a>
                    @endcan
                    @can('view subscribers')
                        <a class="collapse-item" href="{{ route('subscribers.index') }}">Subscribers</a>
                    @endcan
                    @can('view blogs')
                        <a class="collapse-item" href="{{ route('blog') }}">Blog</a>
                    @endcan
                    @can('view messages')
                        <a class="collapse-item" href="{{ route('contact') }}">Contact message</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany

    @hasrole('admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTeam"
                aria-expanded="true" aria-controls="collapseTeam">
                <i class="fas fa-users"></i>
                <span>Our team</span>
            </a>
            <div id="collapseTeam" class="collapse" aria-labelledby="headingTeam" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('about.team') }}">Director</a>
                    <a class="collapse-item" href="{{ route('about.management') }}">Management</a>
                    <a class="collapse-item" href="{{ route('about.HR') }}">HR</a>
                    <a class="collapse-item" href="{{ route('about.account') }}">Account</a>
                    <a class="collapse-item" href="{{ route('about.biometric') }}">Bio-Metric</a>
                    <a class="collapse-item" href="{{ route('about.webdev') }}">Web-Dev</a>
                    <a class="collapse-item" href="{{ route('about.network') }}">Network</a>
                    <a class="collapse-item" href="{{ route('about.ecom') }}">E-Commerce</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapseTeam">
                <i class="fas fa-user-alt"></i>
                <span>Users & Admins</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingTeam" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
                    <a class="collapse-item" href="{{ route('user.affiliates') }}">Affilates</a>
                    <a class="collapse-item" href="{{ route('roles.index') }}">Roles</a>
                </div>
            </div>
        </li>
    @endhasrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
