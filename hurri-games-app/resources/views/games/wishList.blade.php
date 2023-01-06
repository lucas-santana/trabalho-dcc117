@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/wishList.css')}}">
@endpush

@section('body')

    <div class="container-special">
        <section class="sec">

            <h1>Lista de Desejos</h1>
            <x-message/>
            <div class="products">

                @foreach($games as $game)
                    <div class="card">
                        <div class="title">{{$game->name}} <img id="sale" class="{{asset('img/promotions.png')}}" src="img/vendas.png" alt=""></div>
                        <div class="img"><img src="{{asset('img/teste.jpg')}}" class="d-block w-100" alt="..."></div>
                        <div class="desc">{{$game->description}}</div>
                        <div class="rating">
                            @for($i = round($game->avgReview);$i>0;$i--)
                                <i class="bx bxs-star"></i>
                            @endfor
                        </div>

                        <div class="desc">Data de Lançamento: {{$game->released_at->format('d/m/Y')}}</div>
                        <form action="{{ route('wishlist.destroy', $game->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn">Remover</button>
                        </form>
                    </div>
                @endforeach

            </div>
        </section>
    </div>


    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
@endsection
