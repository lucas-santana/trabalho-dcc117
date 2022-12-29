@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/wishList.css')}}">
@endpush

@section('body')

    <section class="sec">

        <h1>Lista de Desejos</h1>

        <div class="products">

            <div class="card">
                <div class="title">Minecraft <img id="sale" class="{{asset('img/promo.png')}}" src="img/vendas.png" alt=""></div>
                <div class="img"><img src="{{asset('img/teste.jpg')}}" class="d-block w-100" alt="..."></div>
                <div class="desc">Jogo de Destruir Bloco</div>
                <div class="rating">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star-half"></i>
                </div>

                <div class="desc">Data de Lançamento: 31/02/2050</div>
                <button class="btn">Remover</button>
            </div>

        </div>
    </section>



    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
@endsection
