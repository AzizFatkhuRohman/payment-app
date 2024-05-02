<!doctype html>
<html lang="en">

<head>
    <title>AKTI | {{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Qubes Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate-css/vivify.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/site.min.css')}}">

</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><i class="fa fa-cube font-25"></i></div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->

    <div class="auth-main">
        <div class="auth_div">
            <div class="card">
                <div class="auth_brand">
                    <a class="navbar-brand" href="#"></i> AKTI PAYMENT</a>
                </div>
                <div class="body">
                    <p class="lead">Login to your account</p>
                    @if(session('failed'))
                    <div class="alert alert-danger">
                        {{ session('failed') }}
                    </div>
                    @endif

                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input type="email" name="email" class="form-control round" id="signin-email"
                                placeholder="Email">
                            @error('email')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input type="password" name="password" class="form-control round" id="signin-password"
                                placeholder="Password">
                            @error('password')
                            <span class="alert-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- END WRAPPER -->

    <!-- Latest jQuery -->
    <script src="{{asset('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

    <!-- Bootstrap 4x JS  -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/common.js')}}"></script>
</body>

</html>