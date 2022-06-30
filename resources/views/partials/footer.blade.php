<footer>
    <section class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="footer-content">
                        <h4 class="text-light">{{ $content->name }}</h4>
                        <p class="pt-2 text-white">{{Str::limit($content->about, 200)  }}
                        </p>
                    </div>
                    <div id="typed">

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-6 mb-4">
                    <span class="text-white border-bottom">Quick Menu</span>
                    <div class="quick-menu">
                        <ul class="mt-3">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('website.about') }}">About</a></li>
                            <li><a href="{{ route('website.products') }}">Product</a></li>
                            <li><a href="{{ route('website.gallery') }}">Gallery</a></li>
                            <li><a href="{{ route('website.news') }}">News</a></li>
                            {{-- <li><a href="{{ route('website.committee') }}">Management
                            </a></li> --}}
                           
                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <div class="footer-content">
                        <span class="text-white border-bottom">Contact Info</span>
                        <ul class="mt-3 contact-info">
                            <li class="mb-2"><i class="fa fa-map-marker-alt"></i> {{ $content->address }}</li>
                            <li class="mb-2"><a href="tel: {{ $content->phone }}"><i class="fa fa-phone"></i> {{ $content->phone }}</a></li>
                            <li class="mb-2"><a href="mailto: {{ $content->email  }}"><i class="fa fa-envelope"></i> {{ $content->email }}</a></li>
                        </ul>
                        <div class="social-links mt-3">
                            <a href="{{$content->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$content->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{$content->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="{{$content->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="{{$content->email }}" target="_blank"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6 mb-4 footer-links">
                    {{-- <h4>Location on Map</h4> --}}
                    <span class="text-white border-bottom">Location on Map</span>
                    <div class="mt-3">
                        {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.3280951562974!2d90.3665091144569!3d23.80692939253257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d6f6b8c2ff%3A0x3b138861ee9c8c30!2sMirpur%2010%20Roundabout%2C%20Dhaka%201216!5e0!3m2!1sen!2sbd!4v1654754995267!5m2!1sen!2sbd" width="100%" height="120" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1290.6746017750847!2d90.37335143890697!3d23.79799972192323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0cd4899f563%3A0xa9e3f08c3acd634c!2sEast%20Kazipara%20Masjid!5e0!3m2!1sen!2sbd!4v1655622098004!5m2!1sen!2sbd" width="100%" height="120" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer area end -->
    <!-- footer bottom start -->
    <section class="footer-botttom border-top py-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 vertical-align center-align">
                    <p class="mb-0 py-2">Copyright © 2022  all rights reserved <a href="{{ route('home') }}" target="_blank">{{$content->name}}</a></p>
                   
                </div>
                <div class="col-12 col-lg-6 col-md-6  vertical-align justify-content-end center-align">
                    Designed and Developed By &nbsp;  <a href="http://linktechbd.com/" target="_blank"> Link-Up Technology Ltd.</a>
                </div>
            </div>
        </div>
    </section>
</footer>