<section class="border-bottom bg-header-top">
    <div class="container-fluid my-container">
        <div class="row header-top"> 
        <div class="col-lg-6 col-md-6 col-12 vertical-align center-align">
            <p class="mb-0 py-2 me-2" style="font-size:13px"><i class="fas fa-phone-alt me-1"></i> {{ $content->phone }} &nbsp;</p>
            <p class="mb-0 py-2" style="font-size:13px "><i class="fas fa-envelope me-1"></i> {{ $content->email }}</p>
        </div>
        <div class="col-12 col-lg-6 col-md-6  vertical-align justify-content-end center-align">
            <ul class="header-social d-flex " style="font-size: 15px">
                <li><a class="pe-2" href="{{$content->facebook }}" title="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li class="pe-2"><a class="" href="{{$content->twitter }}" title="twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li class="pe-2"><a class="" href="{{$content->linkedin }}" title="linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                <li class=""><a class="" href="{{$content->instagram }}" title="instagram" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>    
        </div>
    </div>
    </div>
</section>


<section class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light py-0">
        <div class="container-fluid my-container">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset($content->logo) }}" alt="">  
            </a>
               <div id="typed-strings">
               
              </div>
              <span id="typed"></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 250px;">
                    <li class="nav-item {{ $pageName == 'home' ? 'active' : ''}}">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item {{ $pageName == 'about' ? 'active' : '' }}">
                        <a class="nav-link link" href="{{ route('website.about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown nav-hov-link {{ $pageName == 'product' ? 'active' : '' }}">
                        <a class="nav-link link dropdown-toggle" href="{{ route('website.products') }}" id="navbarDropdown" aria-expanded="false">Products</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="{{ route('website.products') }}">All Product</a>
                            </li>
                            @foreach($category as $item)
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="{{ route('category.product', $item->id) }}">{{ $item->name }}</a>
                            </li>
                            @endforeach
                          </ul>
                    </li>
                    <li class="nav-item {{ $pageName == 'gallery' ? 'active' : '' }}">
                        <a class="nav-link link" href="{{ route('website.gallery') }}">Photo Gallery</a>
                    </li> 
                    {{-- <li class="nav-item">
                        <a class="nav-link link" href="{{ route('website.committee') }}">Managment</a>
                    </li> --}}
                   
                    <li class="nav-item {{ $pageName == 'news' ? 'active' : '' }}">
                        <a class="nav-link link" href="{{ route('website.news') }}">News</a>
                    </li> 
                    <li class="nav-item {{ $pageName == 'contact' ? 'active' : '' }}">
                        <a class="nav-link link pe-0" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
              
            </div>
        </div>
    </nav>
</section>