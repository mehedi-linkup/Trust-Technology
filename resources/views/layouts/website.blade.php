<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset($content->logo) }}" type="image/gif" sizes="16x16">
    <title>{{ $content->name }} | @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Lato:wght@100;300;400;700;900&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('content/website/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/website/css/simple-lightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('content/website/css/owl.carousel.min.css')}}" />
    {{-- <link href="{{ asset('content/website/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{ asset('content/website/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('content/website/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css" media="screen" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    @stack('website-css')
</head>

<body>
    <!-- Start Navbar section -->
    @include('partials.header')
    <!-- End Navbar section -->

    <!-- Client section end -->
    @yield('website-contents') 
    <!-- footer -->
    @include('partials.footer')
    <!-- All script -->
    <script src="{{ asset('content/website/js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('content/website/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('content/website/js/typed.js')}}"></script>
    <script src="{{ asset('content/website/js/all.min.js') }}"></script>
    <script src="{{ asset('content/website/js/owl.carousel.min.js') }}"></script>
    @stack('website-js')
    <script>
        $('.mobile-menu').on('click',function(){
            $('.main-menu').slideToggle();
        });
    </script>
    <script>
         var typed6 = new Typed('#typed', {
            strings: ['{{ $content->name }}'],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true
        });
    </script>
    
    <script>
        $(document).ready(function() {
            // add all to same gallery
            $(".gallery a").attr("data-fancybox", "mygallery");
            // assign captions and title from alt-attributes of images:
            $(".gallery a").each(function() {
                $(this).attr("data-caption", $(this).find("img").attr("alt"));
                $(this).attr("title", $(this).find("img").attr("alt"));
            });
            // start fancybox:
            $(".gallery a").fancybox();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".gallery a").fancybox();
        });
    </script>
   <script>
       $('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    })
   </script>
   <script>
       $('.more-category').on('click',function(){
           $('.category-last').slideToggle();
       })
   </script>
</body>

</html>