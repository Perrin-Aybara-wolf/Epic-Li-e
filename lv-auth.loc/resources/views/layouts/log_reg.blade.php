<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/log_reg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Underdog:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div
        style="z-index: 0; position: absolute; background-image: url('img/log_reg/Group 267.png'); width: 100%; height: calc(var(--k)*4.2);">
    </div>
    @include('layouts.errors')
    <div>
        <div class="login-container">
            <div class="login-box">
                <div class="login-logo">
                    <a href="{{route('welcome')}}"><img src="img/log_reg/logo_reg.png" alt="Logo"></a>
                </div>
                <div class="login-buttons">
                    <button class="serv-login">
                        <img class="login-icon" src="img/log_reg/Group 256.png" alt="apple" />
                        @yield('come') за допомогою Apple
                    </button>
                    <button class="serv-login">
                        <img class="login-icon" src="img/log_reg/Group 255.png" alt="google" />
                            @yield('come') за допомогою Google
                    </button>
                </div>
                <div class="separator">
                    <span>Або</span>
                </div>
                @yield('form')
            </div>
        </div>
        @include('layouts.footer')
    </div>
    <div
        style="position: absolute; background-image: url('img/log_reg/fon.png'); width: 100%; height: calc(var(--k)*4.3);">
    </div>
</body>

</html>