@extends('layouts.auth')

@section('conteudo')
    <section class="container vh-100 d-flex flex-column justify-content-center align-items-center">

        <div class="mb-3 col-lg-6 col-10 mb-5">
            <img class="img-vw-col-100" src="{{ asset('img/aplication/logo.svg') }}" alt="Imagem logo Aqtem delivery">
        </div>

        <div class="mx-5 col-lg-6 col-10 mb-3">
            <div class="form-floating mb-3 text-center">
                <h3 class="mb-5">Seja bem-vindo ao portal do parceiro...</h3>
                <p>Estamos felizes pela sua escolha... <br>
                Já recebemos seu cadastro e agora é com agente... <br>
                Fique tranquilo logo entraremos em contato para liberar seu acesso. <br>
                Bora pra cima porque foguete não tem ré... <br>
                Até breve...</p>

                <p>Enquanto isso de uma volta pela <a class="text-CinzaMedio fw-bold text-decoration-none" href="{{ asset('/') }}"> loja.</a></p>
            </div>
        </div>


    </section>
</form>
@endsection
