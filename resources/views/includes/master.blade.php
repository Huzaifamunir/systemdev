<!DOCTYPE html>
<html lang="en">

<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->



<head>
    <meta charset=UTF-8>
    

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">

    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">

    <meta name="author" content="PIXINVENT">

    <title>Dashboard </title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
 integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

    <link rel="apple-touch-icon" href="{{asset('public/app-assets/images/ico/apple-icon-120.png')}}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/app-assets/images/logo/codifyc.png')}}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    
    <!-- css for charts -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/plugins/charts/chart-apex.css')}}">



    <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/vendors.min.css')}}">
    <!-- css for dashboard card -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/card_dashboard.css')}}">

    

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/extensions/toastr.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/extensions/dragula.min.css')}}">

    <!-- END: Vendor CSS-->



    <!-- BEGIN: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap.css')}}">
    
   
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap-extended.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/colors.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/components.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/dark-layout.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/bordered-layout.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/page-profile.css')}}">


    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/plugins/forms/form-quill-editor.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/dashboard-ecommerce.css')}}" >
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/plugins/forms/form-validation.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/app-todo.css')}}">



    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/plugins/extensions/ext-component-toastr.css')}}">

    <!-- END: Page CSS-->

    @yield('css_link')

    <!-- BEGIN: Custom CSS-->
    <!-- css for user registration form -->

    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/registration.css')}}">

    <!-- END: Custom CSS-->
    <!-- css for invoice page -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/invoice.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/app-invoice.css')}}">/
    <!-- css link for select2 -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css"> -->
    
    <!--Pusher Start-->
    
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
           <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('2706bb75d7f452e0212f', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('abcc123-development');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
          
    <!--End Pusher-->



</head>

<!-- END: Head-->



<!-- BEGIN: Body-->



<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">



    <!-- BEGIN: Header-->

    @include('includes.navigation')

    <!-- END: Header-->





    <!-- BEGIN: Main Menu-->

    @include('includes.sidebar')

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
        <!-- BEGIN Vendor JS-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- BEGIN: Vendor JS-->

    <script src="{{asset('public/app-assets/vendors/js/vendors.min.js')}}"></script>


    <!-- BEGIN: Page Vendor JS-->

    <script src="{{asset('public/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>

    <script src="{{asset('public/app-assets/vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('public/app-assets/vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('public/app-assets/vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('public/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('public/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('public/app-assets/vendors/js/extensions/dragula.min.js')}}"></script>

    <script src="{{asset('public/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

    <script src="{{asset('public/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script src="{{asset('public/ckeditor/ckeditor_/ckeditor5/ckeditor.js')}}"> </script>


  <script src="public/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
    <script src="public/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="public/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    


    <!-- BEGIN: Theme JS-->

    <script src="{{asset('public/app-assets/js/core/app-menu.js')}}"></script>

     <script src="{{asset('public/app-assets/js/core/app.js')}}"></script>
     <script src="{{asset('public/app-assets/js/scripts/pages/app-invoice.js')}}"></script>
    
    

    <!-- END: Theme JS-->
    <!-- Charts JS-->
    <script src="{{asset('public/app-assets/js/scripts/cards/card-statistics.js')}}"></script>
    <script src="{{asset('public/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>

    <!-- BEGIN: Page JS-->
    <script src="{{asset('public/app-assets/js/scripts/pages/app-todo.js')}}"></script>
    <!-- END: Page JS-->

<script src="{{asset('public/app-assets/js/scripts/pages/page-profile.js')}}"></script>

    @yield('js_link');

    <!-- BEGIN: Page JS-->

        <!-- END: Page JS-->



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

</body>

<!-- END: Body-->

</html>