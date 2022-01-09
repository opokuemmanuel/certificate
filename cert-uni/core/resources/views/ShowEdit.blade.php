<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add School</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
{{--    <link href="assets/img/favicon.png" rel="icon">--}}
{{--    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">--}}

<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="{{ asset('./assets/img/favicon.png') }}" rel="stylesheet">
    <link href="{{ asset('./assets/img/apple-touch-icon.png') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet">

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
                <h1 class="logo mr-auto"><a href="login.html">{{ Auth::user()->university_name}}</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="login.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul style="color: white">
                        <li><a href="login.html">Home</a></li>

                        <li class="drop-down"><a>Membership</a>
                            <ul>
                                {{--                                href="{{route('Show_SignUp')}}"--}}
                                <li>
                                    {{--                                    <a href="{{route('allDepartment')}}">All Department</a>--}}
                                    <form action="{{ route('program') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                                        <button type="submit" class="btn btn-dark" style="background: transparent; color: black; border: white; margin-left: 10px;">Add program</button>
                                    </form>
                                </li>
                                <li><a href="{{route('homePage')}}">Add Department</a></li>
                                <li>
                                    {{--   <a href="{{route('allDepartment')}}">All Department</a>--}}
                                    <form action="{{ route('allDepartment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                                        <button type="submit" class="btn btn-dark" style="background: transparent; color: black; border: white; margin-left: 10px;">All Department</button>
                                    </form>
                                </li>
                                <li>
                                    {{-- <a href="{{route('allDepartment')}}">All Department</a>--}}
                                    <form action="{{ route('all_program') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                                        <button type="submit" class="btn btn-dark" style="background: transparent; color: black; border: white; margin-left: 10px;">All program</button>
                                    </form>
                                </li>

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
    <section class="inner-page">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    {{--   <a href="{{route('allDepartment')}}">All Department</a>--}}
                    <form action="{{ route('all_student') }}" method="get">
                        @csrf
                        <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                        <button type="submit" class="btn btn-dark" style="background: transparent; color: black; border: white; margin-left: 10px;"><strong>View Student Info</strong></button>
                    </form>
                </div>
                <div id="app">
                    @include('flash-message')
                    @yield('content')
                </div>
                <div id="app">
                    @if(!empty($successMsg))
                        <div class="alert alert-success">
                            {{$successMsg}}
                        </div>
                    @endif
                </div>
                <div class="card-body card-block">
                    <form  method="POST" action="{{route('Update_info')}}"  class="" >
                        @csrf

                        <div class="form-group"><label for="vat" class=" form-control-label">Student Name</label>
                            <input type="text"  name="student_name" value="{{$arr->Student_name}}" placeholder="student name" class="form-control" required>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group"><label for="vat" class=" form-control-label">Student Name</label>
                            <input type="hidden"  name="id" value="{{$arr->id}}" placeholder="student name" class="form-control" required>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group">
                            <input type="hidden"  name="school" placeholder="department" class="form-control" value="{{$arr->School}}" required>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group"><label for="vat" class=" form-control-label">Select Program</label>
                            <select name="program" id="SelectLm"  class="form-control-sm form-control" required>
                                    <option>{{$arr->Program}}</option>
                            </select>
                        </div>

                        <div class="form-group"><label for="vat" class=" form-control-label">Select Class</label>
                            <select name="class" id="SelectLm" class="form-control-sm form-control" required>
                                    <option>{{$arr->Class}}</option>
                            </select>
                        </div>
                        <div class="form-group"><label for="vat" class=" form-control-label">Year of completion</label>
                            <input type="text"  name="year" value="{{$arr->Year_of_completion}}" placeholder="year of completion" class="form-control"  required>
                            <span class="help-block"></span>
                        </div>

                        <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                        <button type="submit" class="btn btn-primary btn-sm">
                            Submit
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </section>

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

<script src="{{ asset('./assets/vendor/jquery/jquery.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/jquery.easing/jquery.easing.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/php-email-form/validate.js') }}" ></script>
<script src="{{ asset('./assets/vendor/waypoints/jquery.waypoints.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/counterup/counterup.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/owl.carousel/owl.carousel.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/isotope-layout/isotope.pkgd.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/venobox/venobox.min.js') }}" ></script>
<script src="{{ asset('./assets/vendor/aos/aos.js') }}" ></script>
<script src="{{ asset('./assets/js/main.js') }}" ></script>
{{--<!-- Template Main JS File -->--}}
{{--<script src="assets/js/main.js"></script>--}}

</body>

</html>



