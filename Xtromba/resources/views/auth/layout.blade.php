<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XTROMBA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        body {
            background: #000413 !important;
        }

        .authBox {
            height: 100vh;
            width: 100vw;
        }

        .banner {
            background-image: url("{{asset('img/login-background.jpg')}}");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .social-login {
            font-size: 1.5rem;
        }

        .divider {
            height: 3px;
            background-color: #e30514;
        }
    </style>
</head>
<body>
<div id="preloader"></div>
<div class="container-fluid">
    <div class="row d-flex justify-content-md-center authBox">
        <div class="col-lg-2 d-none d-lg-block p-0">
        </div>
        <div class="col-12 col-md-6 col-lg-4 d-flex align-content-center flex-wrap p-0 justify-content-center">
            <div class="col-12 d-flex justify-content-center my-5">
                <img class="logo" src="{{asset('img/logo2.png')}}" alt="xtromba-logo">
            </div>
            <div class="row w-100">
                @yield('content')
            </div>
        </div>
        <div class="col-md-6 col-lg-4 d-none d-sm-block banner p-0">
        </div>
        <div class="col-lg-2 d-none d-lg-block p-0">
        </div>
    </div>
</div>

<!-- BS JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous">
</script>
</body>
</html>

