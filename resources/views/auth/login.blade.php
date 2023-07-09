<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="home-btn d-none d-sm-block">
        {{-- <a href="{{url('https://blackantindonesia.com')}}"><i class="fas fa-home h2 text-white"></i></a> --}}
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                            <div class="account-box">
                                <div class="account-logo-box">
                                    <div class="text-center">
                                        <a href="{{url('/')}}">
                                            <img src="data:image/png;base64,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" alt="" height="70">
                                        </a>
                                    </div>
                                    <h5 class="text-uppercase mb-1 mt-4">Sign In</h5>
                                    <p class="mb-0">Login to your Admin account</p>
                                </div>

                                <div class="account-content mt-4">
                                    {{-- @if (session('danger'))
                                        <div class="alert alert-danger">
                                            {{ session('danger') }}
                                        </div>
                                    @endif --}}
                                    <form class="form-horizontal" action="{{ route('login') }}", method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" name="email" id="emailaddress" placeholder="Masukkan Email" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                {{-- <a href="{{ route('forgot-password.index') }}" class="text-muted float-right"><small>Lupa kata sandi?</small></a> --}}
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Masukkan Password" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="checkbox checkbox-success">
                                                    <input id="remember" type="checkbox" checked="">
                                                    <label for="remember">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row text-center mt-2">
                                            <div class="col-12">
                                                <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                            </div>
                                        </div>

                                    </form>

                                    {{-- <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text-center">
                                                <button type="button" class="btn mr-1 btn-facebook waves-effect waves-light">
                                                    <i class="fab fa-facebook-f"></i>
                                                </button>
                                                <button type="button" class="btn mr-1 btn-googleplus waves-effect waves-light">
                                                    <i class="fab fa-google"></i>
                                                </button>
                                                <button type="button" class="btn mr-1 btn-twitter waves-effect waves-light">
                                                    <i class="fab fa-twitter"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="row mt-4 pt-2">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-muted mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js')}}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
</body>

</html>
