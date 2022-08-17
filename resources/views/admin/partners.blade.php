@extends('layouts.admin')

@section('conteudo')

<div class="">
    <div class="d-flex align-items-center justify-content-between mb-2 mx-3">
        <div>
            <h3 class="">Clientes</h3>
        </div>
        <div>
            <button class="btn btn-Dark fw-bold" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar Novo
              </button>
        </div>
    </div>

    <table class="rounded-3 p-3 m-3">
        <thead class="">
          <tr>
            <th class="">#</th>
            <th class="vw-100">Nome</th>
            <th class="vw-100">Email</th>
            <th class="vw-100">Permissão</th>
            <th class="">Actions</th>

          </tr>
        </thead>
        <tbody>
          <tr class="border-top">
            <th>1</th>
            <td>Franciele</td>
            <td>franciele_freita@hotmail.com</td>
            <td>administrador</td>
            <td class="text-center">...</td>
          </tr>
          <tr class="border-top">
            <th></th>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center pb-0"><nav aria-label="...">
                <ul class="pagination pagination-sm">
                  <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
              </nav></td>
          </tr>
        </tbody>
      </table>
</div>
</div>

@endsection
<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title text-Dark" id="exampleModalLabel">Cadastrar um novo usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name" value="{{old('name')}}" placeholder="name@example.com">
                <label for="name">Nome</label>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$errors->first('name')}}
                  </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" id="email" name="email" value="{{old('email')}}" placeholder="name@example.com">
                <label for="email">E-mail</label>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$errors->first('email')}}
                  </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @if ($errors->has('password')) is-invalid @endif" id="password" name="password" value="{{old('password')}}" placeholder="name@example.com">
                <label for="password">Senha</label>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{$errors->first('password')}}
                  </div>
            </div>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>Selecione um tipo de acesso</option>
                  <option value="1">Master</option>
                  <option value="2">Básico</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
              </div>
        </div>


        <div class="modal-footer border-0">
          <button type="button" class="btn btn-outline-DarkGray fw-bold" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-Dark fw-bold">Save changes</button>
        </div>
      </div>
    </div>
  </div>



<style>
    /* table */
.body{
    display: grid;
    justify-content: center;
    align-items: center;
}

table{
    box-shadow: 0 5px 10px rgba(128, 128, 128, 0.30);
    background-color: white;
    text-align: left;
    overflow: hidden;

}
thead{
    box-shadow: 0 5px 10px rgba(128, 128, 128, 0.10);
    color:gray;
}
th{
    padding: 1rem 2rem;
    text-transform:uppercase;
    letter-spacing:0.1rem;

}
td{
    padding: 1rem 2rem;
    color:gray;

}

/* end table */
</style>
