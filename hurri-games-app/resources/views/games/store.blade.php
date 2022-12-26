@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/store.css')}}">
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
                <dic class="cart"><i class="fa-solid fa-cart-shopping"></i><p>0</p></dic>
            </div>
        </div>

        <section class="sec">
            <div class="products">

                <div class="card">
                    <div class="img"><img src="{{asset('img/teste.jpg')}}" class="d-block w-100" alt="..."></div>
                    <div class="desc">Women</div>
                    <div class="title">Lady Sandal</div>
                    <div class="box">
                        <div class="price">50$</div>
                        <button class="btn">Buy now</button>
                    </div>
                </div>

                <div class="card">
                    <div class="img"></div>
                    <div class="desc">Women</div>
                    <div class="title">Lady Sandal</div>
                    <div class="box">
                        <div class="price">50$</div>
                        <button class="btn">Buy now</button>
                    </div>
                </div>

                <div class="card">
                    <div class="img"></div>
                    <div class="desc">Women</div>
                    <div class="title">Lady Sandal</div>
                    <div class="box">
                        <div class="price">50$</div>
                        <button class="btn">Buy now</button>
                    </div>
                </div>

                <div class="card">
                    <div class="img"></div>
                    <div class="desc">Women</div>
                    <div class="title">Lady Sandal</div>
                    <div class="box">
                        <div class="price">50$</div>
                        <button class="btn">Buy now</button>
                    </div>
                </div>

            </div>
        </section>



    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
@endsection


