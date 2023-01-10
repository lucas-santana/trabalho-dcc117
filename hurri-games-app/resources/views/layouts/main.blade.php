<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HurriGames</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- CSS only -->
        {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">--}}

    <link rel="shortcut icon" href="{{asset('img/favicon1.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('css')

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>
<body>
    <div class="main">
        @include('layouts/menu')

        <div class="right">
            <nav class="user">
                <form>
                    <div>
                        <label for="arquivo"><i class="ri-arrow-down-circle-fill"></i></label>
                        <input type="file" name="arquivo" id="arquivo">
                    </div>
                </form>

                <div class="img"><img src="{{asset('img/ghost.jpg')}}" alt=""></div>
{{--                <i class="user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</i>--}}
                <i class="user-name">{{\Illuminate\Support\Facades\Auth::user()->nick_name}}</i>
            </nav>
            <div>
                @yield('body')

                <script src="{{asset('js/sweetalert2_11.js')}}"></script>
                <script src="https://code.jquery.com/jquery-3.6.2.min.js"
                        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
                <script>
                    const navBar = document.querySelector("nav"),
                        menuBtns = document.querySelectorAll(".menu-icon"),
                        overlay = document.querySelectorAll(".overlay");


                    const image = document.querySelector("img");

                    function catchImage(){

                    }

                </script>

                @yield('scripts')
                @include('scripts.deleteConfirmation')
            </div>

        </div>
    </div>

</body>
</html>
