@extends('layouts.auth')

@section('conteudo')
<form method="POST" action="{{ route('partner.address.store') }}">
    @csrf
    <section class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="mb-3 col-lg-6 col-10">
            <img class="img-vw-col-100" src="{{ asset('img/aplication/logo.svg') }}" alt="Imagem logo Aqtem delivery">
        </div>
        <div class="my-3 text-CinzaMedio text-center">
            <h3>Endereço da loja</h3>
            <p>Agora precisamos de alguns dados do endereço da loja...</p>
        </div>
        <div class="mx-5 col-lg-6 col-10 mb-3">
            <div class="d-none">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="id" name="id" value="{{$user}}" placeholder="Primeiro nome ex:João" autocomplete="off">
                    <label for="id">ID</label>
                </div>
                <hr>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('cep')) is-invalid @endif" id="cep" name="cep" value="{{old('cep')}}"  placeholder="Ex: name@example.com" autocomplete="off" autofocus>
                <label for="cep">CEP</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('cep')}}
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('street')) is-invalid @endif" id="street" name="street" value="{{old('street')}}"  placeholder="Ex: name@example.com" autocomplete="off">
                <label for="street">Endereço</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('street')}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if ($errors->has('number')) is-invalid @endif" id="number" name="number" value="{{old('number')}}"  placeholder="Ex: name@example.com" autocomplete="off">
                        <label for="number">Número</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('number')}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @if ($errors->has('district')) is-invalid @endif" name="district" id="district"  autocomplete="new-district" placeholder="district" autocomplete="off">
                        <label for="district">Bairro</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('district')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if ($errors->has('city')) is-invalid @endif" id="city" name="city"  placeholder="Cidade" autocomplete="off">
                        <label for="city">Cidade</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('city')}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control @if ($errors->has('state')) is-invalid @endif" id="state" name="state"  placeholder="Estado">
                        <label for="state">Estado</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('state')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="complement" name="complement"  placeholder="Complemento do endereço">
                <label for="complement">Complemento (opcional)</label>
            </div>
        </div>
        <div class="col-lg-6 col-10 mb-3">
            <input class="btn btn-AmareloGema fw-bold text-CinzaMedio form-control" type="submit" value="Continuar">
        </div>
    </section>
</form>
@endsection
