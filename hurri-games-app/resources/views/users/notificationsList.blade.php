@extends('layouts.main')

@section('title', 'Receber mensagens')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset('css/notificationsList.css')}}">
@endpush

@section('body')



    <div class="container">
        <div class="row">
            <div class="col-lg-10 right">
                <div class="box shadow-sm rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Notificações</h6>
                    </div>
                    <div class="box-body p-0">

                        @foreach($notificaoes as $n)
                            <div class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                                <div class="font-weight-bold mr-3">
                                    <div class="text-truncate">{{$n->userFrom->name}}</div>
                                    <div class="small">{{$n->message}}</div>
                                </div>
                                <span class="ml-auto mb-auto">
                                <div class="text-right text-muted pt-1">{{Carbon\Carbon::parse($n->created_at)->diffForHumans()}}</div>
                            </span>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

