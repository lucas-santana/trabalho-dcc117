@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/store.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endpush

@section('body')

    <div class="pseudo-right">
        <div class="container-special">
            <div class="header">
                <div class="navibar-b">

                    <div class="dropdown">

                        <select name="categories">
                            <option value="1">Categorias</option>
                            <option value="2">Ação</option>
                            <option value="3">FPS</option>
                            <option value="4">Aventura</option>
                        </select>
                    </div>

                    <div class="dropdown">

                        <select name="">
                            <option value="1">10$ - 20$</option>
                            <option value="2">20$ - 50$</option>
                            <option value="3">50$ - 100$</option>
                            <option value="4">    > 100$</option>
                        </select>
                    </div>

                    <div class="busca">
                        <label for="">Busque por nome</label>
                        <div class="search">
                            <input type="search" placeholder="Buscar...">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    <a href="{{route('cart')}}">
                        <div class="cart"><i class="fa-solid fa-cart-shopping"></i><p>{{$totalItensCarrinho}}</p></div>
                    </a>
                </div>
            </div>

            <section class="sec">
                <h1>Loja</h1>
                <div class="products">
                    @foreach($games as $game)
                        <div class="card">
                            <div class="title">{{$game->name}}</div>
                            <div class="img"><img src="{{asset('img/teste.jpg')}}" class="d-block w-100" alt="..."></div>
                            <div class="desc">{{$game->description}}</div>
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star-half"></i>
                            </div>
                            <div class="box">
                                <div class="price">{{$game->price}}</div>
                                <a href="{{route('store.showCartProduct', $game->id)}}" type="button" class="btn">Comprar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>







    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
@endsection


