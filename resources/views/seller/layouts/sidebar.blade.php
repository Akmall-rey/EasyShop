<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('myshop') ? 'active' : '' }}" aria-current="page" href="/myshop">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('myshop/order-list*') ? 'active' : '' }}" href="/myshop/order-list">
                    <span data-feather="users"></span>
                    Order List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('myshop/product-list*') ? 'active' : '' }}" href="/myshop/product-list">
                    <span data-feather="package"></span>
                    Product List
                </a>
            </li>
        </ul>
    </div>
</nav>
