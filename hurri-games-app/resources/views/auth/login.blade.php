<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Iniciar sessão</title>

    <link rel="shortcut icon" href="{{asset('img/favicon1.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>

<div class="main">
    <div class="left">
        <h1>Faça login no HurriGames</h1>
        <img src="{{asset('img/online-games-addiction-animate.svg')}}" alt="">
    </div>
    <div class="right">

        <div class="card">
            <h1>{{ __('Login') }}</h1>
            <input type="hidden" id="ban_info" data-message="{{session('message') }}" data-banreason="{{session('ban_reason')}}">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="textfield">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                           value="{{ old('email') }}" required autocomplete="email"
                           autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="textfield">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="div_special">
                    <button class="btn-login">{{ __('Login') }}</button>
                    <button type="button" class="btn-login" onclick="window.location='{{ route('register') }}'">{{ __('Register') }}</button>
                </div>
                <div style="color: #f0ffff94;">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label id="lembrar" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
        </div>
    </div>
</div>

<footer class="bg-dark p-2 text-center">
    <div class="container">
        <p class="text-white">Todos os direitos reservados a HurriGames© - 2022</p>
    </div>
</footer>

<script src="{{asset('js/sweetalert2_11.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

<script>
    $(document).ready(function (e) {

        console.log($("#ban_info").data("banreason"))
        console.log($("#ban_info").data("message"))
        if($("#ban_info").data("message")){
            Swal.fire({
                icon: 'error',
                title: $("#ban_info").data("message"),
                text: $("#ban_info").data("banreason")
            })
        }
    })
</script>

</body>
</html>
