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
                    <p>Some representative placeholder content for this Page Home.</p>
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
                        <td class="userName">_MadarinhaXD_</td>
                        <td class="points">1020 <img src="{{asset('img/moedinhas.png')}}" alt=""></td>
                    </tr>
                    <tr>
                        <td class="rank">2</td>
                        <td class="userName">Ackerman_666</td>
                        <td class="points">830 <img src="{{asset('img/moedinhas.png')}}" alt=""></td>
                    </tr>
                    <tr>
                        <td class="rank">3</td>
                        <td class="userName">Sujiru_Ki_Mimame</td>
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
                            <p><br> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam, labore reiciendis.
                                Assumenda eos quod animi! Soluta nesciunt inventore dolores excepturi provident, culpa
                                beatae tempora, explicabo corporis quibusdam corrupti. Autem, quaerat. Assumenda quo
                                aliquam vel, nostrum explicabo ipsum dolor, ipsa perferendis porro doloribus obcaecati
                                placeat natus iste odio est non earum?</p><a class="btn btn-warning" href="#">Learn
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{asset("js/rolada.js")}}"></script>

@endsection
