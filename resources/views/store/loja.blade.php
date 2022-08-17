@extends('layouts.loja')

@section('conteudo')

<div class="container d-flex justify-content-between flex-row align-items-center">
    <h1>Aqui é a Loja</h1>
    <p>Olá {{ Auth::user()->name }}</p>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
        <input class="btn btn-AzulPiscina" type="submit" value="Sair">
    </form>

{{--     <div>
        Id usuario = {{ Auth::user()->id }}
    </div> --}}

</div>


@endsection
