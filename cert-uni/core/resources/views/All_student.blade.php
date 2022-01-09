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
    <div class="col-lg-12" style="margin-top: 100px;">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="get" action="{{route('search_info')}}">
                            <div class="form-group"><label for="vat" class=" form-control-label">Select Program</label>
                                <select name="program" id="SelectLm"  class="form-control-sm form-control" required>
                                    <option aria-disabled=""></option>
                                    @foreach($pros as $prod)
                                        <option>{{$prod->program}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Name:</label>
                                <input class="form-control" name="student_name" id="message-text">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Seacrh</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <form action="{{ route('all_program') }}" method="get">
                    @csrf
                    <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                    <button type="button"  data-toggle="modal" data-target="#exampleModal" class="btn btn-dark" style="background: transparent; color: black; border: white; margin-left: 10px;">Search Info</button>
                </form>
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
                        <th >Student_name</th>
                        <th >School</th>
                        <th >Program</th>
                        <th >Class</th>
                        <th >Year_of_completion</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pro as $prodd)
                        <tr>
                            <td>{{$prodd->Student_name}}</td>
                            <td>{{$prodd->School}}</td>
                            <td>{{$prodd->Program}}</td>
                            <td>{{$prodd->Class}}</td>
                            <td>{{$prodd->Year_of_completion}}</td>
                            <td>
                                <a href="{{url('/EditInfo/'.$prodd->id)}}" class="btn btn-success" style="color: white; margin-top: 5px">Edit</a>
                                <form action="{{ route('deleteInfo') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="university_name" value="{{ Auth::user()->university_name}}">
                                    <input type="hidden" name="id" value="{{$prodd->id}}">
                                    <button type="submit" class="btn btn-danger" style=" color: white; border: white; margin-top: 2px; ">Delete</button>
                                </form>
                                {{--                                <a href="{{url('/delete/'.$prodd->id)}}" class="btn btn-danger" style="color: white; margin-top: 5px">Remove Account</a>--}}

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
{{--<footer id="footer" class="fixed-bottom">--}}
{{--    <div class="container">--}}

{{--        <div class="copyright-wrap d-md-flex py-4">--}}
{{--            <div class="mr-md-auto text-center text-md-left">--}}
{{--                <div class="copyright">--}}
{{--                    &copy; Copyright <strong><span>2021</span></strong>. All Rights Reserved--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="social-links text-center text-md-right pt-3 pt-md-0">--}}
{{--                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>--}}
{{--                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>--}}
{{--                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>--}}
{{--                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>--}}
{{--                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</footer><!-- End Footer -->--}}

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


