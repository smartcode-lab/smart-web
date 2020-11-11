<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('admin.home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Information</div>
                <a class="nav-link" href="{{route('admin.menu.home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Meniu
                </a>
                <a class="nav-link" href="{{route('admin.post.home')}}">
                    <div class="sb-nav-link-icon"><i class="fa fa-address-book"></i></div>
                    post
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Bleno
        </div>
    </nav>
</div>
