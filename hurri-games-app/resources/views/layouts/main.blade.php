<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HurriGames</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{asset('img/favicon1.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('css')

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>
<body>
    <div class="main">
        @include('layouts/menu')

        <div class="right">

            @yield('body')

            <script>
                const navBar = document.querySelector("nav"),
                    menuBtns = document.querySelectorAll(".menu-icon"),
                    overlay = document.querySelectorAll(".overlay");

                // menuBtns.forEach((menuBtn) => {
                //     menuBtn.addEventListener("click", () => {
                //         navBar.classList.toggle("open");
                //     });
                // });

                // overlay.addEventListener("click", () => {
                //     navBar.classList.remove("open");
                // })

            </script>
            <script src="../js/rolada.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
                    crossorigin="anonymous"></script>
        </div>
    </div>

</body>
</html>
