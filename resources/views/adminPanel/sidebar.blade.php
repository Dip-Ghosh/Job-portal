<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bangladesh Job| Portal</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Jobs</span>
        </a>
        <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('jobs.index') }}">List</a>
                <a class="collapse-item" href="{{ route('jobs.create') }}">Create</a>
            </div>

        </div>
    </li>

    <!-- organization start -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Organizations</span>
        </a>
        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('organizations.index') }}">List</a>
                <a class="collapse-item" href="{{ route('organizations.create') }}">Create</a>
            </div>

        </div>
    </li>
    <!-- organization end -->

    <!-- Industry start -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Industry</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('industries.index') }}">List</a>
                <a class="collapse-item" href="{{ route('industries.create') }}">Create</a>
            </div>

        </div>
    </li>
    <!-- Industry end -->

    <!-- locations start -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Locations</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('locations.index') }}">List</a>
                <a class="collapse-item" href="{{ route('locations.create') }}">Create</a>
            </div>

        </div>
    </li>
    <!-- locations end -->


    <!-- job Title start -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Job Title</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('jobs-title.index') }}">List</a>
                <a class="collapse-item" href="{{ route('jobs-title.create') }}">Create</a>
            </div>

        </div>
    </li>
    <!-- job Title end -->

    <!-- Company start -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Company</span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('companies.index') }}">List</a>
                <a class="collapse-item" href="{{ route('companies.create') }}">Create</a>
            </div>

        </div>
    </li>
    <!-- Company end -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
