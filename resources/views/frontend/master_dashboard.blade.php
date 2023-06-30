<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin, dashboard">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dompet : Payment Admin Template">
    <meta property="og:title" content="Dompet : Payment Admin Template">
    <meta property="og:description" content="Dompet : Payment Admin Template">
    <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- PAGE TITLE HERE -->
    <title>Dompet : Payment Admin Template</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('frontend/assets/images/favicon.png')}}">
    <!-- Datatable -->
    <link href="{{asset('frontend/assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('frontend/assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

    @include('frontend.body.preloader')

    <div id="main-wrapper">

        @include('frontend.body.header')


        <div class="content-body">
            @yield('main')
        </div>


		@include('frontend.body.footer')

    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('frontend/assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('frontend/assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Apex Chart -->
    <script src="{{asset('frontend/assets/vendor/apexchart/apexchart.js')}}"></script>

    <!-- Datatable -->
    <script src="{{asset('frontend/assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins-init/datatables.init.js')}}"></script>

    <script src="{{asset('frontend/assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

    <script src="{{asset('frontend/assets/js/custom.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/dlabnav-init.js')}}"></script>
    <script src="{{asset('frontend/assets/js/demo.js')}}"></script>
    <!-- <script src="{{asset('frontend/assets/js/styleSwitcher.js')}}"></script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    
</body>

</html>