<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Registered Schools</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
{{--    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">--}}
{{--    <link href="assets/vendor/aos/aos.css" rel="stylesheet">--}}

    <!-- Template Main CSS File -->
{{--    <link href="assets/css/style.css" rel="stylesheet">--}}

    <!-- =======================================================
    * Template Name: Techie - v2.1.0
    * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-9 d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="login.html">Cert Verify</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="login.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul style="color: white">
                        <li><a href="{{route('registered_schools')}}">Home</a></li>

                        <li class="drop-down"><a>Membership</a>
                            <ul>

                                <li><a href="{{route('Show_SignUp')}}">SignUp</a></li>
                                <li><a href="{{route('view_add_school')}}">Add School</a></li>
                                <li><a href="{{route('registered_schools')}}">View Registered School's</a></li>
                                <li><a href="#">School Account</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav><!-- .nav-menu -->
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="get-started-btn scrollto">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

    </div>
</header><!-- End Header -->

<main id="main">



    <div class="col-lg-12" style="margin-top: 100px;">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Users</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive-lg">
                    <div id="app">
                        @if(!empty($successMsg))
                            <div class="alert alert-success">
                                {{$successMsg}}
                            </div>
                        @endif
                    </div>
                    <thead>
                    <tr>
                        <th >University name</th>
                        <th >Email</th>
                        <th>Website</th>
                        <th >Location</th>
                        <th >Account</th>
                        <th >Date Registered</th>
                        <th >Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($prod as $prodd)
                    <tr>

                        <td>{{$prodd->University_name}}</td>
                        <td>{{$prodd->Email}}</td>
                        <td>{{$prodd->Website}}</td>
                        <td>{{$prodd->Location}}</td>
                        <td>{{$prodd->Account}}</td>
                        <td>{{$prodd->created_at}}</td>
                        <td>
                            <a href="{{url('/EditAccount/'.$prodd->id)}}" class="btn btn-success" style="color: white; margin-top: 5px">Edit</a>
                            <a href="{{url('/deleteAccount/'.$prodd->id)}}" class="btn btn-danger" style="color: white; margin-top: 5px">Remove Account</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="fixed-bottom">
    <div class="container">

        <div class="copyright-wrap d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>2021</span></strong>. All Rights Reserved
                </div>

            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>

    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}" ></script>
<script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}" ></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}" ></script>
<script src="{{ asset('assets/js/main.js') }}" ></script>
{{--<script src="assets/vendor/jquery/jquery.min.js"></script>--}}
{{--<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>--}}
{{--<script src="assets/vendor/php-email-form/validate.js"></script>--}}
{{--<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>--}}
{{--<script src="assets/vendor/counterup/counterup.min.js"></script>--}}
{{--<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>--}}
{{--<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>--}}
{{--<script src="assets/vendor/venobox/venobox.min.js"></script>--}}
{{--<script src="assets/vendor/aos/aos.js"></script>--}}

{{--<!-- Template Main JS File -->--}}
{{--<script src="assets/js/main.js"></script>--}}

</body>

</html>