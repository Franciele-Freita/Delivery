@extends('layouts.auth')

@section('conteudo')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <section class="container vh-100 d-flex flex-column justify-content-center align-items-center">

    <div class="mb-3 col-lg-6 col-10">
        <img class="img-vw-col-100" src="{{ asset('img/aplication/logo.svg') }}" alt="Imagem logo Aqtem delivery">
    </div>
    <div class="my-3 text-CinzaMedio">
        <h3>Registro</h3>
    </div>
    <div class="mx-5 col-lg-6 col-10 mb-3">
        <div class="form-floating mb-3">
            <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" name="name" id="name" name="name" value="{{old('name')}} " placeholder="Primeiro nome ex:João" autocomplete="off"  autofocus>
            <label for="name">Nome</label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
                {{$errors->first('name')}}
              </div>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" name="email" id="email" name="email" value="{{old('email')}}"  placeholder="Ex: name@example.com" autocomplete="off">
            <label for="email">E-mail</label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
                {{$errors->first('email')}}
              </div>
            </div>
            <div class="form-floating mb-3">
            <input type="password" class="form-control  @if ($errors->has('password')) is-invalid @endif" name="password" id="password"  autocomplete="new-password" placeholder="Password">
            <label for="password">Senha</label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
                {{$errors->first('password')}}
            </div>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" id="password_confirmation" name="password_confirmation"  placeholder="Password">
                <label for="password">Confirme a senha</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('password_confirmation')}}
                </div>
            </div>
            <div>
            </div>
    </div>
    <div class="col-lg-6 col-10 mb-3">
        <input class="btn btn-AzulPiscina fw-bold text-CinzaMedio form-control" type="submit" value="Registrar">
    </div>
        <div class="mb-3 text-CinzaMedio mb-3">
        Já é cadastrado? <a class="text-decoration-none text-AzulPiscina fw-bold" href="{{ route('login') }}">Entre</a>
        </div>
    </section>
</form>
@endsection
