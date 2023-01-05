<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>{{ __('Register') }}</title>

    <link rel="shortcut icon" href="{{asset('img/favicon1.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('css/userRegister.css')}}">
</head>
<body>

<div class="main">
    <div class="left">
        <h1>Registre-se no HurriGames</h1>
        <img src="{{asset('img/online-games-addiction-animate.svg')}}" alt="">
    </div>
    <div class="right">

        <div class="card">
            <h1>{{ __('Register') }}</h1>
            @if (session('message'))
                <div class="alert alert-danger">{{ session('message') }}</div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="textfield">
                    <label for="name">Nome Completo</label>
                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                           value="{{ old('name') }}" required autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="textfield">
                    <label for="nick_name">Apelido</label>
                    <input id="nick_name" class="form-control @error('nick_name') is-invalid @enderror" type="text" name="nick_name"
                           value="{{ old('nick_name') }}" required autofocus>

                    @error('nick_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="textfield">
                    <label for="birth_date">Data de Nascimento</label>
                    <input id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" type="date" name="birth_date"
                           value="{{ old('birth_date') }}" required autofocus>

                    @error('birth_date')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

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

                <div class="textfield">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="div_special">
                    <button class="btn-login" onclick="window.location='{{ route('register') }}'">{{ __('Register') }}</button>
                </div>

            </form>
        </div>
    </div>
</div>

<footer class="bg-dark p-2 text-center">
    <div class="container">
        <p class="text-white">Todos os direitos reservados a HurriGames© - 2022</p>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

</body>
</html>
