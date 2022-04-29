<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="dripzone">
    <title>Dripzone</title>
    <!-- Favicon -->
    <link rel="icon" href="{{url('public/assets/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{url('public/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{url('public/assets/css/argon.css?v=1.1.0')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="bg-default">
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="header-body text-center ">
                <div class="row justify-content-center" id="createAccountDiv">
                    <div class="col-xl-5 col-lg-6 col-md-6 px-5 mt--8">
                        <h1 class="text-white">Create an Account</h1>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--9 pb-8">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary border-0">
                        <div class="card-header bg-transparent pb-5"><br>
                            <div class="text-center">
                                <img src="{{asset('public/assets/img/Dripoz.jpg')}}" alt="Logo" width="100px"
                                    height="100px" />
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5" id="form_div">
                            <div class="text-center text-muted mb-4">
                                <small>Sign up with credentials</small>
                            </div>
                            <form action="{{ url('register-user') }}" id="register-user" onsubmit="registerUser(event)">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" placeholder="Enter your name..." required
                                            autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Enter your email address..."
                                            required autocomplete="email">

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
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Enter password..." required autocomplete="new-password">
                                        @error('password')
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
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" placeholder="Re-enter password..." required
                                            autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Create account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3" id="alreadyHaveAccountDiv">
                        <div class="col-6 text-left">
                            <a href="login" class="text-light"><small>Already have an account</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        const getValue = (id) =>{
        return document.getElementById(id).value;
    }
    //  form submit handler
    const registerUser = (e) => {
        e.preventDefault();
        var name = getValue('name');
        var email = getValue('email');
        var password = getValue('password');
        var passwordConfirm = getValue('password-confirm');
        console.log(name,email,password)

        if (!name && !email && !password && !passwordConfirm){
            toastify('Please enter all inputs!' ,'error')
            return;
        }
        if(password != passwordConfirm){
            toastify('Password does not match.' ,'error' );
            return;
        }
            
            var data = $("#" + e.target.id).serialize();
            $.ajax({
                type: 'POST',
                url: e.target.action,
                data: data,
                success: function (response) {
                    if (response.success) {
                        toastify(response.success, 'success');
                        document.getElementById('alreadyHaveAccountDiv').style.display = 'none';
                        document.getElementById('createAccountDiv').style.display = 'none';
                        document.getElementById('form_div').innerHTML = `<div class="text-center"> <h2>CONGRATULATIONS!</h2>
                            <p class="text-center">We will contact soon via email.</p> 
                            </div>`;

                    } else {
                        toastify(response.error, 'error');
                    }
                },
                error: function (response) {
                    toastify('Email is already exists!', 'error');
                },
            });
        }
        function toastify(message, type) {
            if (type == 'error') {
                var bgColor = "linear-gradient(to right, #8e0e00, #1f1c18)";
            } else {
                var bgColor = "linear-gradient(to right, #000000, #0f9b0f)";
            }
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: bgColor,
                },
                onClick: function () {} // Callback after click
            }).showToast();
        }
    </script>
</body>

</html>