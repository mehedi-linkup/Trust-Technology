<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link {{ $pageName == 'home' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ $pageName == 'profile' || $pageName == 'about' || $pageName == 'register' || $pageName == 'updateProfile' ? 'active' : 'collapsed' }}"
                    href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ $pageName == 'profile' || $pageName == 'about' || $pageName == 'register' || $pageName == 'updateProfile' ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ $pageName == 'profile' ? 'active' : '' }}"
                            href="{{ route('company.edit') }}">Company Content</a>
                        <a class="nav-link {{ $pageName == 'about' ? 'active' : '' }}"
                            href="{{ route('admin.about') }}">About Us</a>
                        <a class="nav-link {{ $pageName == 'register' ? 'active' : '' }}"
                            href="{{ route('register.create') }}">Add New User</a>
                        <a class="nav-link {{ $pageName == 'updateProfile' ? 'active' : '' }}"
                            href="{{ route('settings') }}">Update Profile</a>

                    </nav>
                </div>
                <a class="nav-link {{ $pageName == 'gallery' || $pageName == 'banner' || $pageName == 'video' || $pageName == 'backbanner' ? 'active' : 'collapsed' }}"
                    href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false"
                    aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                    Website Content
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ $pageName == 'gallery' || $pageName == 'banner' || $pageName == 'video' || $pageName == 'backbanner' ? 'show' : '' }}"
                    id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <div class="collapsePages" id="pagesCollapseAuth" aria-labelledby="headingOne"
                        data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            {{-- <a class="nav-link" href="{{ route('management.index') }}">Management</a> --}}

                            <a class="nav-link {{ $pageName == 'gallery' ? 'active' : '' }}"
                                href="{{ route('gallery.index') }}">Gallery</a>
                            <a class="nav-link {{ $pageName == 'banner' ? 'active' : '' }}"
                                href="{{ route('banner.index') }}">Slider</a>
                            <a class="nav-link {{ $pageName == 'video' ? 'active' : '' }}"
                                href="{{ route('video.index') }}">Video</a>
                            <a class="nav-link {{ $pageName == 'backbanner' ? 'active' : '' }}"
                                href="{{ route('back.banner.edit') }}">Banner</a>
                        </nav>
                    </div>
                </div>
                <a class="nav-link {{ $pageName == 'product' || $pageName == 'category' ? 'active' : 'collapsed' }}"
                    href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="false"
                    aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                    Product
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ $pageName == 'product' || $pageName == 'category' ? 'show' : '' }}"
                    id="collapsePages1" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <div class="collapsePages" id="pagesCollapseAuth" aria-labelledby="headingOne"
                        data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ $pageName == 'category' ? 'active' : '' }}"
                                href="{{ route('category.index') }}">Category</a>
                            <a class="nav-link {{ $pageName == 'product' ? 'active' : '' }}"
                                href="{{ route('product.index') }}">Product</a>
                        </nav>
                    </div>
                </div>
                <a class="nav-link {{ $pageName == 'news' ? 'active' : '' }}" href="{{ route('news.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    News And Event
                </a>
                <a class="nav-link {{ $pageName == 'contact' ? 'active' : '' }}"
                    href="{{ route('contact.list') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                    Message List
                </a>
                <a class="nav-link" href="{{ route('logout') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                    Sign Out
                </a>
            </div>
        </div>
    </nav>
</div>
