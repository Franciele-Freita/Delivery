@extends('layouts.app')

@section('conteudo')

<div class="container">
    <h3 class="mb-3">Informações pessoais</h1>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" name="name" placeholder="Primeiro nome" value="{{Auth::user()->name}}">
        <label for="name">Nome completo</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="{{Auth::user()->cpf}}">
        <label for="cpf">CPF</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="email" disabled name="email" placeholder="email" value="{{Auth::user()->email}}">
        <label for="email">E-mail</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone" value="{{Auth::user()->telephone}}">
        <label for="telephone">Celular</label>
    </div>

    <hr>

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="mb-3">Endereços</h3>
        </div>
        <div>
            <button type="button" class="btn btn-AzulPiscina text-Dark fw-bold mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar endereço
              </button>
        </div>
    </div>

    <div>
        @foreach (Auth::user()->addresses as $address)
            <div class="bg-white rounded border p-3 mb-3 fw-bold text-Dark d-flex justify-content-between align-items-center">
                <div>
                    {{$address->street}}, {{$address->number}} - {{$address->district}}
                </div>
                <div class="dropdown">
                    <a class="btn btn-secondary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="" style="width: 20px">
                      </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><button class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$address->id}}">Editar</button></li>
                      <li><a class="dropdown-item" href="#">Excluir</a></li>
                    </ul>
                </div>
            </div>

              <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$address->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar endereço</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('cep')) is-invalid @endif" id="cep" name="cep" value="{{old('cep')}} {{$address->cep}}"  placeholder="Ex: name@example.com" autocomplete="off" autofocus>
                <label for="cep">CEP</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('cep')}}
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('street')) is-invalid @endif" id="street" name="street" value="{{old('street')}}{{$address->street}}"  placeholder="Ex: name@example.com" autocomplete="off">
                <label for="street">Endereço</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('street')}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @if ($errors->has('number')) is-invalid @endif" id="number" name="number" value="{{old('number')}}{{$address->number}}"  placeholder="Ex: name@example.com" autocomplete="off">
                        <label for="number">Número</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('number')}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control  @if ($errors->has('district')) is-invalid @endif" name="district" id="district"  autocomplete="new-district" placeholder="district" autocomplete="off" value="{{old('district')}}{{$address->district}}">
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
                        <input type="text" class="form-control @if ($errors->has('city')) is-invalid @endif" id="city" name="city"  placeholder="Cidade" autocomplete="off" value="{{old('city')}}{{$address->city}}">
                        <label for="city">Cidade</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('city')}}
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control @if ($errors->has('state')) is-invalid @endif" id="state" name="state"  placeholder="Estado" value="{{old('state')}}{{$address->state}}">
                        <label for="state">Estado</label>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            {{$errors->first('state')}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="complement" name="complement"  placeholder="Complemento do endereço" value="{{old('complement')}}{{$address->complement}}">
                <label for="complement">Complemento (opcional)</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-Dark" data-bs-dismiss="modal">Sair</button>
          <button type="button" class="btn btn-AzulPiscina">Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- endModal -->
        @endforeach
    </div>

</div>

@endsection

<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo endereço</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- endModal -->
