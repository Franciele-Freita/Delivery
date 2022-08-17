 @extends('layouts.auth')

 @section('conteudo')
 <form method="POST" action="{{ route('login') }}">
    @csrf
 <section class="container vh-100 d-flex flex-column justify-content-center align-items-center">

    <div class="mb-3 col-lg-6 col-10">
        <img class="img-vw-col-100" src="{{ asset('img/aplication/logo.svg') }}" alt="">
    </div>
    <div class="my-3 text-CinzaMedio">
        <h3>Login</h3>
    </div>
    <div class="mx-5 col-lg-6 col-10 mb-3">
        <div class="form-floating mb-3">
            <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" name="email" id="email" placeholder="name@example.com" autocomplete="off" required value="{{old('email')}}">
            <label for="email">Email</label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
                {{$errors->first('email')}}
              </div>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" name="password" id="password" placeholder="Password" autocomplete="off">
            <label for="password">Senha</label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
                {{$errors->first('password')}}
              </div>
          </div>
          <div>

          </div>
    </div>
    <div class="col-lg-6 col-10 mb-3">
        <input class="btn btn-AzulPiscina fw-bold text-CinzaMedio form-control" type="submit" value="Entrar">
    </div>

    <div class="mb-3">
        <a class="text-decoration-none text-CinzaMedio fw-bold" href="">Esqueci a senha</a>
    </div>
      <div class="mb-3 text-CinzaMedio mb-3">
        É novo por aqui? <a class="text-decoration-none text-CinzaMedio fw-bold" href="{{ route('register') }}">Cadastre-se</a>
      </div>
 </section>
</form>
 @endsection
