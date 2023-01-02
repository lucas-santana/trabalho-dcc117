@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endpush

@section('body')

    <section>
        <div class="container">
            <h2 class="px-5 p-2">Adicionar no Carrinho</h2>
            <div class="cart">
                <div class="col-md-12 col-lg-10 mx-auto">
                    <form action="{{route('store.addCart', $game->id)}}" method="POST">
                        @csrf
                        <div class="cart-item">
                            <div class="row">
                                <div class="col-md-7 center-item">
                                    <img src="{{asset('img/cod.jpg')}}" alt="">
                                    <h5>{{$game->name}}( {{$game->normal_price}} )</h5>
                                </div>

                                <div class="col-md-5 center-item">
                                    <h5>R$ <span id="phone-total">{{$game->normal_price}}</span> </h5>
                                    <i class='bx bx-x icon'></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 pt-4 pb-4">
                            <button type="button" class="btn btn-danger" onclick="window.location='{{ route('store.index') }}'">Cancelar</button>
                            <button type="submit" class="btn btn-success check-out">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection


