<!DOCTYPE HTML>
<html lang="en">
<head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Fynd Concept</title>

        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content="Fynd Concept"/>
        <meta name="description" content="Fynd Concept"/>
        <link rel="shortcut icon" href="{{ asset('logo/logo-blue.png') }}">
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{asset('home-css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('home-css/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('home-css/color.css')}}">
        <link href="{{asset('css/toastr.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        @livewireStyles
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <svg>
                    <defs>
                        <filter id="goo">
                            <fegaussianblur in="SourceGraphic" stdDeviation="2" result="blur" />
                            <fecolormatrix in="blur"   values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                            <fecomposite in="SourceGraphic" in2="gooey" operator="atop"/>
                        </filter>
                    </defs>
                </svg>
            </div>
        </div>
        <!--loader end-->
        <!-- main -->
        <div id="main">
            <!-- header -->
            <header class="main-header">
                @livewire('header-component')
            </header>
            <!-- header end  -->
            {{ $slot }}


                <footer class="main-footer fl-wrap" style="padding:0px !important;  border-top:1px solid steelblue;">
                <!--sub-footer-->
                <div class="sub-footer gray-bg fl-wrap">
                    <div class="container">
                        <div class="copyright"> &#169; Fynd Concept {{date('Y')}} .  All rights reserved.</div>
                        <div class="subfooter-nav">
                            <ul class="no-list-style">
                                <li><a href="">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--sub-footer end -->
            </footer>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="{{asset('home-js/jquery.min.js')}}"></script>
        <script src="{{asset('home-js/plugins.js')}}"></script>
        <script src="{{asset('home-js/scripts.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places"></script>
        <script src="{{asset('home-js/map-single.js')}}"></script>
        <script src="{{asset('js/toastr.min.js')}}"></script>


        <script>
         document.addEventListener('livewire:load', function () {
             window.addEventListener('notify', event => {
                 toastr[event.detail.type](event.detail.message);
             });
         });
     </script>
     <script>
        // document.addEventListener('livewire:load', function () {
        //     window.Livewire.on('updateFavoriteCount', (newCount) => {
        //         console.log('Favorite count updated:', newCount);

        //         // Update the favorite count in the header dynamically
        //         const favoriteCountElement = document.getElementById('favorite-count');
        //         if (favoriteCountElement) {
        //             favoriteCountElement.textContent = newCount;
        //         } else {
        //             console.warn('Favorite count element not found');
        //         }
        //     });
        // });
        document.addEventListener('livewire:load', function () {
            window.Livewire.on('updateFavoriteCount', (newCount) => {
                // Remove this as Livewire handles the updates
            });
        });
    </script>
     {{-- @livewire('paypal-payment') --}}
     @livewireScripts
    </body>

<!-- Mirrored from homeradar.kwst.net/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Sep 2024 22:08:19 GMT -->
</html>
