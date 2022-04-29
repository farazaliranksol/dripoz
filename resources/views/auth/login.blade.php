
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Dripoz</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/assets/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/argon.css?v=1.1.0')}}" type="text/css">
</head>

<body class="bg-default">
<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="header-body text-center ">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-6 px-5 mt--8">
                    <h1 class="text-white">Welcome</h1>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
  
    
    <!-- Page content -->
    <div class="container mt--9 pb-8">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-5"><br>
                        <div class=" text-center">
                         <img src="{{asset('public/assets/img/Dripoz.jpg')}}" alt="logo" width="100px" height="100px" />
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        @if(Session::has('error'))
                        <div class="text-center text-muted mb-4">
                            <small class="text-danger bg-light p-4">
                                <?php echo session::get('error') ?>
                            </small>
                        </div>
                        <?php session()->forget('error'); ?>
                        @endif
                        <div class="text-center text-muted mb-4">
                            <small>Sign in with credentials</small>
                        </div>
                  
                        <form method="POST" action="{{route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a class="text-light" href="{{ route('password.request') }}">
                                <small>
                                    {{ __('Forgot Your Password?') }}</small>
                            </a>
                        @endif
                    </div>
                    {{-- <div class="col-6 text-right">
                        <a href="register" class="text-light"><small>Create new account</small></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Argon Scripts -->
    <!-- Core -->
<script src="{{url('public/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('public/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{url('public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{url('public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{url('public/assets/js/argon.js?v=1.1.0')}}"></script>
<!-- Demo JS - remove this in your project -->
<script src="{{url('public/assets/js/demo.min.js')}}"></script>



</body>

</html>

