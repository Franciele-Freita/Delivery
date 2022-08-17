@extends('layouts.auth')

@section('conteudo')
<form method="POST" action="{{ route('partner.details.store') }}">
    @csrf
    <section class="container vh-100 d-flex flex-column justify-content-center align-items-center">

        <div class="mb-3 col-lg-6 col-10">
            <img class="img-vw-col-100" src="{{ asset('img/aplication/logo.svg') }}" alt="Imagem logo Aqtem delivery">
        </div>
        <div class="my-3 text-CinzaMedio text-center">
            <h3>Dados da loja</h3>
            <p>Agora precisamos dos dados da loja...</p>
        </div>
        <div class="mx-5 col-lg-6 col-10 mb-3">
            <div class="d-none">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="id" name="user_id" value="{{$user}}" placeholder="Primeiro nome ex:João" autocomplete="off">
                    <label for="id">ID do usuario</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="id" name="address_id" value="{{$address}}" placeholder="Primeiro nome ex:João" autocomplete="off">
                    <label for="id">ID do endereço</label>
                </div>
                <hr>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('partner')) is-invalid @endif" id="partner" name="partner" value="{{old('partner')}}"  placeholder="Ex: name@example.com" autocomplete="off" autofocus>
                <label for="partner">Sócio</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('partner')}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if ($errors->has('cpf')) is-invalid @endif" id="cpf" name="cpf" value="{{old('cpf')}}"  placeholder="Ex: name@example.com" autocomplete="off" autofocus>
                        <label for="cpf">CPF do sócio</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('cpf')}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if ($errors->has('cnpj')) is-invalid @endif" id="cnpj" name="cnpj" value="{{old('cnpj')}}"  placeholder="Ex: name@example.com" autocomplete="off">
                        <label for="cnpj">CNPJ</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('cnpj')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('corporate_name')) is-invalid @endif" id="corporate_name" name="corporate_name" value="{{old('corporate_name')}}"  placeholder="Ex: name@example.com" autocomplete="off">
                <label for="corporate_name">Razão Social</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('corporate_name')}}
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('fantasy_name')) is-invalid @endif" id="fantasy_name" name="fantasy_name" value="{{old('fantasy_name')}}"  placeholder="Ex: name@example.com" autocomplete="off">
                <label for="fantasy_name">Nome fantasia da loja</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('fantasy_name')}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if ($errors->has('telephone')) is-invalid @endif" id="telephone" name="telephone" value="{{old('telephone')}}"  placeholder="Ex: name@example.com" autocomplete="off">
                        <label for="telephone">Telefone</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('telephone')}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select @if ($errors->has('branch_of_activity')) is-invalid @endif" id="branch_of_activity" name="branch_of_activity" aria-label="Floating label select example">
                          <option selected></option>
                          @foreach ($activities as $activity )
                          <option value="{{$activity->name_category}}">{{$activity->name_category}}</option>
                          @endforeach
                        </select>
                        <label for="branch_of_activity">Ramo de Atividade</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('branch_of_activity')}}
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-10 mb-3">
            <input class="btn btn-AmareloGema fw-bold text-CinzaMedio form-control" type="submit" value="Continuar">
        </div>
    </section>
</form>
@endsection
