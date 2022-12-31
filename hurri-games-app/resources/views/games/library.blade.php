@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/library.css')}}">
@endpush

@section('body')

    <div class="header">
        <div class="navibar-b">

            <div class="dropdown">
                <select name="">
                    <option value="1">Categorias</option>
                    <option value="2">Ação</option>
                    <option value="3">FPS</option>
                    <option value="4">Aventura</option>
                </select>
            </div>
            <div class="busca">
                <label for="">Busque por nome</label>
                <div class="search">
                    <input type="search" placeholder="Buscar...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

            </div>

        </div>
    </div>

    <section class="sec">

        <h1>Biblioteca</h1>

        <div class="products">

            <div class="card">
                <div class="title">Minecraft</div>
                <div class="img"><img src="{{asset('img/teste.jpg')}}" class="d-block w-100" alt="..."></div>
                <div class="desc">Jogo de Destruir Bloco</div>
                <div class="desc">Tempo de Jogo: 12 Horas</div>
                <div class="desc">Total de Conquistas: 12/56</div>
                <div class="rating">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star-half"></i>
                </div>
                <div class="box">
                    <div class="price"></div>
                    <a  class="btn" href="{{ route('rate') }}" type="button" >
                        Avaliar Jogo
                    </a>
                </div>
            </div>

        </div>
    </section>

    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
@endsection
