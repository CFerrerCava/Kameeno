<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Rubik:400,500,700%7cShadows+Into+Light&display=swap">
        <link rel="stylesheet" href="assets/css/libraries.css" />
        <!-- <link rel="stylesheet" href="assets/css/animate.css" /> -->
        <link rel="stylesheet" href="assets/css/style.css" />
        @yield('styles')
    </head>
    <body id="page-top">

        <div id="app_vue">
            @yield('nav')
            @yield('content')
             <!-- Copyright Section-->
            <section class="copyright py-4 text-center text-white">
                <div class="container"><small>Copyright © Nortec © 2020</small></div>
            </section>
            <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
            <div class="scroll-to-top d-lg-none position-fixed">
                <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
            </div>

            @yield('modals')
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="/assets_client/mail/jqBootstrapValidation.js"></script>
        <script src="/assets_client/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="/assets_client/js/scripts.js"></script>


        @yield('scripts')
    </body>
</html>
