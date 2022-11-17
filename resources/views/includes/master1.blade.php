<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">

    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">

    <meta name="author" content="PIXINVENT">

    <title>Dashboard </title>

    <link rel="apple-touch-icon" href="{{asset('public/app-assets/images/ico/apple-icon-120.png')}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/app-assets/images/logo/codifyc.png')}}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
 integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu">


    <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/vendors.min.css')}}">

    

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/extensions/toastr.min.css')}}">

    <!-- END: Vendor CSS-->



    <!-- BEGIN: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap-extended.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/colors.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/components.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/dark-layout.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/bordered-layout.css')}}">



    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/dashboard-ecommerce.css')}}" >



    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">

    <!-- END: Page CSS-->

    @yield('css_link')

    <!-- BEGIN: Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">

    <!-- END: Custom CSS-->



</head>

<!-- END: Head-->



<!-- BEGIN: Body-->



<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">


    <!-- BEGIN: Header-->

    @include('includes.navigation1')

    <!-- END: Header-->





    <!-- BEGIN: Main Menu-->

    @include('includes.sidebar1')

    <!-- END: Main Menu-->



    <!-- BEGIN: Content-->

    <div class="app-content content ">

        <div class="content-overlay"></div>

        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">

            <div class="content-header row">

            </div>

            <div class="content-body">

                <!-- Dashboard Ecommerce Starts -->

                @yield('content')

                <!-- Dashboard Ecommerce ends -->



            </div>

        </div>

    </div>

    <!-- END: Content-->



    <div class="sidenav-overlay"></div>

    <div class="drag-target"></div>



    <!-- BEGIN: Footer-->

    @include('includes.footer')

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    <!-- END: Footer-->





    <!-- BEGIN: Vendor JS-->

    <script src="{{asset('public/app-assets/vendors/js/vendors.min.js')}}"></script>

    <!-- BEGIN Vendor JS-->



    <!-- BEGIN: Page Vendor JS-->

    <script src="{{asset('public/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>

    <!-- END: Page Vendor JS-->



    <!-- BEGIN: Theme JS-->

    <script src="{{asset('public/app-assets/js/core/app-menu.js')}}"></script>

    <script src="{{asset('public/app-assets/js/core/app.js')}}"></script>

    <!-- END: Theme JS-->

    @yield('js_link');

    <!-- BEGIN: Page JS-->

        <!-- END: Page JS-->
<script type="text/javascript">
        $(document).ready(function(){
            $(".notice").on('click',function(){
                //alert("response.notification");
                $.ajax({
                    type: "GET",
                    url: "{{route('fetch_notifications')}}",
                    dataType: "json",
                    success: function(response){
                        $('.new').empty();
                        $('.new').append(`<div class="badge badge-pill badge-light-primary">`+response.notification.length+` New</div>`);
                        $('.noti').empty();
                        $.each(response.notification, function( key, item ){
                     $('.noti').append(`<div class="media d-flex align-items-start"> <div class="media-body "><p class="media-heading"><span class="font-weight-bolder">`+item.message+`</span></p></div></div>`);
                    });
                        

                    }
                    
                });

            });

        });
    </script>


    <script>

        $(window).on('load', function() {

            if (feather) {

                feather.replace({

                    width: 14,

                    height: 14

                });

            }

        })

    </script>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
          <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
          <script>
        
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
        
            var pusher = new Pusher('59fe67dd5ecb806605eb', {
              cluster: 'ap2'
            });
        
            var channel = pusher.subscribe('test');
            channel.bind('my-event', function(data) {
                alert();
              alert(JSON.stringify(data));
            });
          </script>

</body>

<!-- END: Body-->



</html>