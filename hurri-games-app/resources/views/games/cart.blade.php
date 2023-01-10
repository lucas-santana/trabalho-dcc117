@extends('layouts.main')

@section('title', 'Store')

@push('css')
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endpush

@section('body')

    <section>
        <div class="container">
            <h2 class="px-5 p-2">Meu Carrinho</h2>
            <div class="cart">
                <div class="col-md-12 col-lg-10 mx-auto">


                        @foreach($orderItems as $orderItem)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-7 center-item">
                                        <img src="{{asset("games_image/{$orderItem->game->image}")}}" alt="">
                                        <h5>{{$orderItem->game->name}}( {{$orderItem->game->normal_price}} )</h5>
                                    </div>

                                    <div class="col-md-5 center-item">
                                        <h5>R$ <span id="phone-total">@money($orderItem->game->normal_price)</span> </h5>
                                        <form action="{{route('store.deleteOrderItem', $orderItem->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-btnDelete tipo="x" classe="show_confirm"/>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="cart-item">
                            <div class="row g-2">

                                <div class="col-6">
                                    <h5>Total:</h5>
                                </div>

                                <div class="col-6 status">
                                    <h5>R$<span id="sub-total">@money($orderItems->sum('price'))</span></h5>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 pt-4 pb-4">
                            <button type="button" class="btn btn-warning" onclick="window.location='{{ route('store.index') }}'">Continuar comprando</button>
                            @if($orderItems->count())
                                <form action="{{route('store.checkout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success check-out">Finalizar Compra</button>
                                </form>
                            @endif
                        </div>

                </div>
            </div>
        </div>
    </section>

@endsection


