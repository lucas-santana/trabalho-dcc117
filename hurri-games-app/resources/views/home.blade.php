@extends('layouts.main')

@section('title', 'Home')
@push('css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endpush

@section('body')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img id="img-Home" src="{{asset('img/teste.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>HurriGames - Uma tempestade de ofertas</h5>
                    <p>Aqui você encontrará as melhores ofertas disponíves no mercado.</p>
                    <img class="seta" src="{{asset('img/seta.png')}}" alt="">
                </div>
            </div>
        </div>

        <!--Parte relacionada ao rank-->
        <div class="container">
            <header>
                <h1>🏆Top Usuários do Mês🏆</h1>
            </header>
            <div class="wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Nome do Usuário</th>
                        <th>Total de Pontos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="rank">1</td>
                        <td class="userName">User</td>
                        <td class="points">1020 <img src="{{asset('img/moedinhas.png')}}" alt=""></td>
                    </tr>
                    <tr>
                        <td class="rank">2</td>
                        <td class="userName">Geralt-Rivia</td>
                        <td class="points">830 <img src="{{asset('img/moedinhas.png')}}" alt=""></td>
                    </tr>
                    <tr>
                        <td class="rank">3</td>
                        <td class="userName">Nathan_Drake</td>
                        <td class="points">440 <img src="{{asset('img/moedinhas.png')}}" alt=""></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <section class="about section-padding" id="anchor">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-1">
                        <div class="about-img"><img alt="" class="image2 img-fluid" src="{{asset('img/coin.png')}}"></div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                        <div class="about-text">
                            <h2>Como adquirir novos pontos ?</h2>
                            <p><br> Novos pontos podem ser adquiridos ao comprar jogos e avaliá-los. Outro ponto que ajudará
                                na obtenção dos pontos é o tempo de uso, mas esse não influencia tanto quanto os informados
                                anteriormente.</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{asset("js/rolada.js")}}"></script>

@endsection
