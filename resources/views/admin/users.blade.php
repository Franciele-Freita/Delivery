@extends('layouts.admin')

@section('conteudo')

<div class="">
        <h1>Clientes</h1>
    <div class="d-flex justify-content-center">

        <!-- Button trigger modal -->
<button type="button" class="btn btn-dark text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Cadastrar novo
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
            <h5 class="modal-title">Novo usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name" placeholder="name@example.com" value="{{old('name')}}">
                <label for="name">Nome</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('name')}}
                  </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @if ($errors->has('name')) is-invalid @endif" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}" autocomplete="off">
                <label for="email">E-mail</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('email')}}
                  </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @if ($errors->has('name')) is-invalid @endif" id="password" name="password" placeholder="name@example.com" value="{{old('password')}}" autocomplete="off">
                <label for="password">E-mail</label>
                <div id="invalidCheck3Feedback" class="invalid-feedback">
                    {{$errors->first('password')}}
                  </div>
            </div>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-dark text-white">Salvar</button>
        </div>
      </div>
    </div>
  </div>
    </div>


</div>


@endsection
