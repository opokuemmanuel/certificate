<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
{{--    <link href="assets/css/main.css" rel="stylesheet">--}}
    <link href="assets/css/util.css" rel="stylesheet">



    <!-- =======================================================
    * Template Name: Techie - v2.1.0
    * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-9 d-flex align-items-center">
                <h1 class="logo mr-auto" style="color: white">Cert Verify</h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="login.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
        </div>

    </div>
</header><!-- End Header -->

{{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <form action="{{route('lo')}}" method="post" class="">--}}
{{--        @csrf--}}
{{--        <div id="app">--}}
{{--            @include('flash-message')--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--        <div id="app">--}}
{{--            @if(!empty($successMsg))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{$successMsg}}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" name="name" placeholder="name" class="form-control" required>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <input type="password"  name="Password" placeholder="password" class="form-control" required>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="submit" class="btn btn-primary">Login</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

{{--</div>--}}

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter details to verfiy certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('CheckValidity') }}" method="get" class="">

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Program:</label>
                            <input class="form-control" name="program" id="message-text">
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">School:</label>
                            <input class="form-control" name="school" id="message-text">
                        </div>

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



    <div class="container-fluid" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2 style="color: white">We provide you with an efficient and way of storing and validating college certificates</h2>
                <div id="app">
                    @include('flash-message')
                    @yield('content')
                </div>
                  <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Verify Certificate</button>
            </div>
            <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">

              <form action="{{route('logs')}}" method="post" class="">
                  @csrf
                  <div id="app">
                      @if(!empty($successMsg))
                          <div class="alert alert-success">
                              {{$successMsg}}
                          </div>
                      @endif
                  </div>

                          <div class="limiter">
                              <div class="container-login100">
                                  <div class="wrap-login100">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel" style="color: white">Login</h5>
                                      </div>
                                      <div class="modal-body">
                                          <div class="form-group">
                                              <input type="text" id="nf-email" name="username" placeholder="Username.." class="form-control" required>
                                          </div>

                                          <div class="form-group">
                                              <input type="password" id="nf-email" name="password" placeholder="Password" class="form-control" required>
                                          </div>

                                      </div>
                                      <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Login</button>
                                          <a href="{{route('SignUps')}}" class="btn btn-primary">SignUp</a>
                                      </div>

                                  </div>
                              </div>
                          </div>

              </form>


            </div>
        </div>
    </div>

</section><!-- End Hero -->




<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<script>
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
