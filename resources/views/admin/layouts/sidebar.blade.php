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
                <a class="nav-link {{ Request::is('admin/user-list*') ? 'active' : '' }}" href="/admin/user-list">
                    <span data-feather="users"></span>
                    User List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/product-list*') ? 'active' : '' }}" href="/admin/product-list">
                    <span data-feather="package"></span>
                    Product List
                </a>
            </li>
        </ul>
    </div>
</nav>
