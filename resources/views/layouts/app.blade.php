<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href=" {{ asset('css/fontawsome.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('fonts/flaticon.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/meanmenu.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/owl.carousel.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/nice-select.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/owl.theme.default.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/magnific-popup.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/jquery-ui.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/odometer.min.css') }} ">
        <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
        <link rel="stylesheet" href=" {{ asset('css/responsive.css') }} ">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;800&display=swap" rel="stylesheet">

        <style>
            * {
                font-family: 'Rubik', sans-serif !important;
            }
        </style>

       <div class="navbar-area">
       <div class="main-responsive-nav">
           <div class="container">
               <div class="mobile-nav">
                   <a href="index.html" class="logo"><img src="{{ asset('images/small-logo.png') }}" alt="logo"/></a>
                   <ul class="menu-sidebar menu-small-device">
                       <li>
                           <button class="popup-button"><i class="fas fa-search"></i></button>
                       </li>
                       <li><a class="default-button" href="contact.html">احصل على عرض <i class="fas fa-angle-right"></i></a>
                       </li>
                   </ul>
               </div>
           </div>
       </div>

       <div class="main-nav">
           <div class="container">
               <nav class="navbar navbar-expand-md navbar-light">
                   <a class="navbar-brand" href="index.html">
                       <img src="{{ asset('images/small-logo.png') }}" alt="logo"/>
                   </a>
                   <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                       <ul class="navbar-nav justify-content-center flex-grow-1">
                           <li class="nav-item"><a href="contact.html" class="nav-link">الصفحة الرئيسية</a></li>
                           <li class="nav-item"><a href="contact.html" class="nav-link">البلاغات</a></li>
                           <li class="nav-item"><a href="contact.html" class="nav-link">الأخبار</a></li>
                           <li class="nav-item"><a href="contact.html" class="nav-link">الخدمات</a></li>
                           <li class="nav-item"><a href="contact.html" class="nav-link">اتصل بنا</a></li>
                       </ul>
                       <div class="menu-sidebar">
                           <ul>
                               <li>
                                   <a class="default-button" href="contact.html">
                                       <i class="fas fa-sign-in-alt"></i>
                                       تسجيل دخول
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </div>
               </nav>
           </div>
       </div>
   </div>

       <div>
           {{ $slot }}
       </div>

       <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
       <script src=" {{ asset('js/jquery.min.js') }}"></script>
       <script src=" {{ asset('js/jquery-ui.min.js') }}"></script>
       <script src=" {{ asset('js/bootstrap.bundle.min.js') }}"></script>
       <script src=" {{ asset('js/meanmenu.js') }}"></script>
       <script src=" {{ asset('js/owl.carousel.min.js') }} "></script>
       <script src=" {{ asset('js/magnific-popup.min.js') }}"></script>
       <script src=" {{ asset('js/TweenMax.js') }}"></script>
       <script src=" {{ asset('js/nice-select.min.js') }} "></script>
       <script src=" {{ asset('js/form-validator.min.js') }} "></script>
       <script src=" {{ asset('js/contact-form-script.js') }}"></script>
       <script src=" {{ asset('js/ajaxchimp.min.js') }} "></script>
       <script src=" {{ asset('js/owl.carousel2.thumbs.min.js') }}"></script>
       <script src=" {{ asset('js/appear.min.js') }} "></script>
       <script src=" {{ asset('js/odometer.min.js') }} "></script>
       <script src=" {{ asset('js/custom.js') }}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </body>
</html>
