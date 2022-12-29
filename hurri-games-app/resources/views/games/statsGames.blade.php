@extends('layouts.main')

@section('title', 'Especificações Jogo')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="{{asset('css/registerGame.css')}}">
@endpush

@section('body')
    <div class="pseudo-right">
        <div class="container">
            <h3>Cadastrar Jogos</h3>
            <div class="title">Especificações de Requisitos Mínimos</div>
            <div class="content">
                <form action="" method="POST">
                    @csrf
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Sistema Operacional</span>
                            <select name="" multiple>
                                <option value="1">Windows 7 32 bits</option>
                                <option value="2">Windows Vista</option>
                                <option value="3">Windows 8 32 bits</option>
                                <option value="4">Windows 8 64 bits</option>
                                <option value="5">Windows 10 32 bits</option>
                                <option value="6">Windows 10 64 bits</option>
                                <option value="7">Windows 11 64 bits</option>
                                <option value="8">SO Linux</option>
                                <option value="9">Mac OS</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Processador</span>
                            <select name="" multiple>
                                <option value="1">Processador Intel® Core™ i5-750
                                    cache de 8 M, 2,66 GHz</option>
                                <option value="2">Processador Intel® Core™ i3-390M
                                    cache de 3 M, 2,66 GHz</option>
                                <option value="3">Processador Intel® Core™ i7-9700 (12 M de cache, até 4,70 GHz)</option>
                                <option value="4">Processador Intel® Core™ i5-7440HQ (cache de 6 M, até 3,80 GHz)</option>
                                <option value="5">AMD Ryzen™ 5 PRO 3600</option>
                                <option value="6">AMD Ryzen 3 1200/option>
                                <option value="7">AMD Ryzen 5 1500X</option>
                                <option value="8">AMD Athlon 64 X2 6000+</option>
                                <option value="9">Intel Core2 Duo E8400, 3.0GHz</option>
                                <option value="10">Intel Core 2 DUO 2.4 GHz</option>
                                <option value="11">Intel Core i3-2100</option>
                                <option value="12">AMD® FX-6300</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Placa de Vídeo</span>
                            <select name="" multiple>
                                <option value="1">Geforce 9600 GT</option>
                                <option value="2">AMD HD 3870 512MB</option>
                                <option value="3">NVIDIA GTX 960</option>
                                <option value="4">AMD R9 290X</option>
                                <option value="5">NVIDIA GTX 1060 (6 GB)</option>
                                <option value="6">AMD RX 570</option>
                                <option value="7">Radeon R7 370 2GB</option>
                                <option value="8">Nvidia 450 GTS</option>
                                <option value="9">Nvidia GTX 460 </option>
                                <option value="10">Radeon HD 7800</option>
                                <option value="11">NVidia 6600</option>
                                <option value="12">GTX 1070</option>
                                <option value="13">Radeon RX 480</option>
                                <option value="14">NVIDIA 9800 GT 1 GB</option>
                                <option value="15">AMD RADEON RX 580 4 GB</option>
                                <option value="16">AMD RADEON RX VEGA 56 8 GB</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">DirectX</span>
                            <select name="" multiple>
                                <option value="1">Versão 8.1</option>
                                <option value="2">Versão 9.0a</option>
                                <option value="3">Versão 9.0b</option>
                                <option value="4">Versão 9.0c</option>
                                <option value="5">Versão 10.0</option>
                                <option value="6">Versão 10.1</option>
                                <option value="7">Versão 11.0</option>
                                <option value="8">Versão 11.1</option>
                                <option value="9">Versão 11.2</option>
                                <option value="10">Versão 12.0</option>
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Armazenamento(GB)</span>
                            <input name="name" type="text" placeholder="Digite o espaço..." >
                        </div>

                        <div class="input-box">
                            <span class="details">Memória RAM</span>
                            <select name="" multiple>
                                <option value="1">2 GB</option>
                                <option value="2">4 GB</option>
                                <option value="3">8 GB</option>
                                <option value="4">12 GB</option>
                                <option value="5">16 GB</option>
                                <option value="6">32 GB</option>
                            </select>
                        </div>

                    </div>
                    <div class="botoes">
                        <div class="button1">
                            <button class="but1">
                                <span>Cadastrar</span>
                                <i class="uil uil-edit"></i>
                            </button>
                        </div>

                        <div class="button2">
                            <button class="but2">
                                <span>Cancelar</span>
                                <i class="uil uil-x"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
