<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/userlist*') ? 'active' : '' }}" href="/admin/userlist">
                    <span data-feather="users"></span>
                    User List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/productlist*') ? 'active' : '' }}" href="/admin/productlist">
                    <span data-feather="package"></span>
                    Product List
                </a>
            </li>
        </ul>

        {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/test*') ? 'active' : '' }}" href="#">
                    <span data-feather="grid"></span>
                    Post Categories
                </a>
            </li>
        </ul> --}}
    </div>
</nav>
