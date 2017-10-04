<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>My BRI | @yield('title')</title>

    <!-- This is main stylesheet -->
    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/owl.carousel.css') !!}
    {!! Html::style('assets/css/owl.transitions.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    {!! Html::favicon('assets/images/favicon.png') !!}

    <!-- This is place for dynamis stylesheet per page -->
    @stack('styles')
</head>

<body>
    
    <!-- This is present on homepage only -->
    @if ( request()->is('/') )
        @include('home.banner')
    @endif
    <!-- This is present on homepage only -->

    <!-- Header -->
    <header class="white_header">
        @include('layouts.navigation')
    </header>
    <!-- Header end -->

    <!-- Page Banner Start-->
    @if ( ! request()->is('/') )
        <section class="page-banner padding bg_white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-uppercase">Form Registrasi</h1>
                        <p>Isilah data valid Anda untuk melanjutkan proses pendaftaran.</p>
                        <ol class="breadcrumb text-center">
                            <li><a href="#">Pengajuan Kredit</a></li>
                            <li class="active">Registrasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Page Banner End -->

    @yield('content')

    <!-- Footer -->
    <footer class="footer_third">
        <div class="container">
            @include('layouts.footer')
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Modal -->
    @include('layouts.modal')

    <!-- This is main script -->
    {!! Html::script('assets/js/jquery-2.1.4.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/jquery.appear.js') !!}
    {!! Html::script('assets/js/jquery-countTo.js') !!}
    {!! Html::script('assets/js/bootsnav.js') !!}
    {!! Html::script('assets/js/masonry.pkgd.min.js') !!}
    {!! Html::script('assets/js/jquery.parallax-1.1.3.js') !!}
    {!! Html::script('assets/js/jquery.cubeportfolio.min.js') !!}
    {!! Html::script('assets/js/range-Slider.min.js') !!}
    {!! Html::script('assets/js/owl.carousel.min.js') !!}
    {!! Html::script('assets/js/selectbox-0.2.min.js') !!}
    {!! Html::script('assets/js/zelect.js') !!}
    {!! Html::script('assets/js/jquery.fancybox.js') !!}
    {!! Html::script('assets/js/jquery.themepunch.tools.min.js') !!}
    {!! Html::script('assets/js/jquery.themepunch.revolution.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.actions.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.layeranimation.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.navigation.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.parallax.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.slideanims.min.js') !!}
    {!! Html::script('assets/js/revolution.extension.video.min.js') !!}
    {!! Html::script('assets/js/custom.js') !!}
    {!! Html::script('assets/js/functions.js') !!}

    {!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {!! JsValidator::formRequest(App\Http\Requests\Auth\LoginRequest::class, '#form-login') !!}

    @if (session('error-login'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#login-register').modal('show');
                $('#daftar').removeClass('active in');
                $('.daftar').removeClass('active');
                $('#masuk').addClass('active in');
                $('.masuk').addClass('active');
            });
        </script>
    @endif

    @if (session('error-register'))
        <script type="text/javascript">
            $(document).ready(function () {
                $('#login-register').modal('show');
                $('#masuk').removeClass('active in');
                $('.masuk').removeClass('active');
                $('#daftar').addClass('active in');
                $('.daftar').addClass('active');
            });
        </script>
    @endif

    <script type="text/javascript">
        $('#login-register').on('hide.bs.modal', function () {
            $('#daftar').removeClass('active in');
            $('.daftar').removeClass('active');
            $('#masuk').addClass('active in');
            $('.masuk').addClass('active');
            $('.keyword-input').val('');
            $('.alert, .help-block').remove();
        });
    </script>

    <!-- This is place for dynamis scripts per page -->
    @stack('scripts')
</body>
</html>
