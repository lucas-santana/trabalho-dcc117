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
                <form action="{{route('store.index')}}" method="GET" id="searchForm">
                    <div class="navibar-b">

                    <div class="dropdown">

                        <select name="search_categories">
                            <option selected="selected" disabled>Categorias</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="dropdown">

                        <select name="search_price">
                            <option selected="selected" disabled>Preços</option>
                            <option value="10_20">10$ - 20$</option>
                            <option value="20_50">20$ - 50$</option>
                            <option value="50_100">50$ - 100$</option>
                            <option value="m100">    > 100$</option>
                        </select>
                    </div>

                    <div class="busca">
                        <label for="">Busque por nome</label>
                        <div class="search">
                            <input type="search" placeholder="Buscar..." name="search_name_game"/>
                            <i class="fa-solid fa-magnifying-glass" onclick="$('#searchForm').submit()"></i>
                        </div>
                    </div>
                    <a href="{{route('store.showCart')}}">
                        <div class="cart"><i class="fa-solid fa-cart-shopping"></i><p>{{$totalItensCarrinho}}</p></div>
                    </a>
                </div>
                </form>
            </div>

            <section class="sec">
                <h1>Loja</h1>
                {{--Total: {{$games->count()}}--}}
                <div class="products">
                    @foreach($games as $game)
                        <div class="card">
                            <div class="title">{{$game->name}}</div>
                            <div class="img"><img src="{{asset("games_image/$game->image")}}" class="d-block w-100" alt="..."></div>


                            @foreach($game->categories()->get() as $ca)
                                <strong>{{$ca->name}}&nbsp;&nbsp;</strong>
                            @endforeach
                            <div class="price">@money($game->normal_price)</div>
                            @if($game->promotional_price)
                                <div class="promotional_price">Promoção: @money($game->promotional_price)</div>
                            @endif
                            <div class="desc">{{$game->description}}</div>
                            <div class="rating">
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star"></i>
                                <i class="bx bxs-star-half"></i>
                            </div>
                            <div class="box">

                                @if(!$game->isOnWishList)
                                    <button id="{{$game->id}}" data-url="{{route('store.addWishList', $game->id)}}" type="button" class="btn addWishList"><i class="bx bx-plus"></i> Lista De Desejos</button>
                                @endif
                                <a href="{{route('store.showCartProduct', $game->id)}}" type="button" class="btn">Comprar</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            {{$games->links()}}
            {{--<div class="pag-cont">
                <div class="pagination">
                    <ul class="pag-ul">
                        <li class="link active" value="1" onclick="activeLink()">1</li>
                        <li class="link" value="2" onclick="activeLink()">2</li>
                        <li class="link" value="3" onclick="activeLink()">3</li>
                        <li class="link" value="4" onclick="activeLink()">4</li>
                        <li class="link" value="5" onclick="activeLink()">5</li>
                    </ul>

                </div>
            </div>--}}
        </div>
    </div>

    <script>
        let link = document.getElementsByClassName("link")

        let current_value = 1

        function activeLink(){
            for(l of link){
                l.classList.remove("active")
            }
            event.target.classList.add("active")
            current_value = event.target.value
        }
    </script>

    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
@endsection
@section('scripts')
    @include('scripts.addWishList')
@endsection

