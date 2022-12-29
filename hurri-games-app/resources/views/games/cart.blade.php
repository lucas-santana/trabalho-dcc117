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
                    <div class="cart-item">
                        <div class="row">
                            <div class="col-md-7 center-item">
                                <img src="img/cod.jpg" alt="">
                                <h5>Call of Duty: Infinity Warfare( $200 )</h5>
                            </div>

                            <div class="col-md-5 center-item">
                                <h5>$ <span id="phone-total">200</span> </h5>
                                <i class='bx bx-x icon'></i>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="row">
                            <div class="col-md-7 center-item mx-auto">
                                <img src="img/castlevania.jpg" alt="">
                                <h5>Castlevania ( $100 )</h5>
                            </div>
                            <div class="col-md-5 center-item">
                                <h5>$ <span id="case-total">100</span> </h5>
                                <i class='bx bx-x icon'></i>
                            </div>
                        </div>
                    </div>

                    <div class="cart-item">
                        <div class="row g-2">

                            <div class="col-6">
                                <h5>Total:</h5>
                            </div>

                            <div class="col-6 status">
                                <h5>$<span id="sub-total">300</span></h5>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 pt-4 pb-4">
                        <button type="button" class="btn btn-success check-out">Finalizar Compra</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


