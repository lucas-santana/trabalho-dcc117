@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/library.css')}}">
@endpush

@section('body')

    <div class="container-special">
        <div class="header">
            <form action="{{route('library.index')}}" method="GET" id="searchForm">
                <div class="navibar-b">

                    <div class="dropdown">

                        <select name="search_categories">
                            <option selected="selected" disabled>Categorias</option>
                            @foreach($categories as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="busca">
                        <label for="">Busque por nome</label>
                        <div class="search">
                            <input type="search" placeholder="Buscar..." name="search_name_game"/>
                            <i class="fa-solid fa-magnifying-glass" onclick="$('#searchForm').submit()"></i>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <section class="sec">

            <h1>Biblioteca</h1>

            <div class="products">

                @foreach($games as $game)
                    <div class="card">
                        <div class="title"> {{$game->name}}</div>
                        <div class="img"><img src="{{asset('img/teste.jpg')}}" class="d-block w-100" alt="..."></div>

                        @foreach($game->categories()->get() as $ca)
                            <strong>{{$ca->name}}&nbsp;&nbsp;</strong>
                        @endforeach

                        <div class="desc">{{$game->description}}</div>
                        <div class="desc"><strong>Número de avaliações: </strong>{{$game->reviews()->count()}}</div>
                        {{--<div class="desc">Tempo de Jogo: 12 Horas</div>
                        <div class="desc">Total de Conquistas: 12/56</div>--}}

                        <div class="rating">
                            @for($i = round($game->avgReview);$i>0;$i--)
                                <i class="bx bxs-star"></i>
                            @endfor
                        </div>
                        <div class="box">
                            <div class="price"></div>
                            <a  class="btn" href="{{ route('library.reviewForm',$game->id) }}" type="button" >
                                Avaliar Jogo
                            </a>
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

    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
@endsection
