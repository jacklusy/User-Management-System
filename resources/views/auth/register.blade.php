<!DOCTYPE html>
<html lang="en" class="h-100">

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

    <!-- PAGE TITLE HERE -->
    <title>Dompet : Payment Admin Template</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{asset('adminbackend/assets/images/favicon.png')}}">
    <link href="{{asset('adminbackend/assets/css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-8">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="mb-1"><strong>First Name</strong></label>
                                                <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="mb-1"><strong>Last Name</strong></label>
                                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="mb-1"><strong>Email</strong></label>
                                                <input type="email" class="form-control" placeholder="hello@example.com" id="email" required="" name="email">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="mb-1"><strong>Password</strong></label>
                                                <input type="password" class="form-control" required="" name="password" id="password" placeholder="**********">
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="mb-1"><strong>Password Confirmation</strong></label>
                                                <input type="password" class="form-control" required="" id="password_confirmation" name="password_confirmation" placeholder="**********">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <fieldset class="mb-3">
                                                    <div class="row">
                                                        <label class="col-form-label col-sm-3 pt-0">Gender</label>
                                                        <div class="col-sm-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" id="gender_male" name="gender" value="male">
                                                                <label class="form-check-label">
                                                                    Male
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" id="gender_female" name="gender" value="female">
                                                                <label class="form-check-label">
                                                                    Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('adminbackend/assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/js/custom.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/js/dlabnav-init.js')}}"></script>
    <script src="{{asset('adminbackend/assets/js/styleSwitcher.js')}}"></script>
</body>

</html>