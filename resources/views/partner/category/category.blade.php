{{-- @extends('layouts.painel-partner')

@section('conteudo')

<div class="container my-5 table-responsive">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Categorias</h3>
        <a class="btn btn-Dark fw-bold" href="{{ route('category.register.index') }}">Cadastrar</a>
    </div>
    <table class="rounded-3">
        <thead class="">
        <tr>
            <th class="vw-100">Categoria</th>
            <th style="width: 500px;">Status</th>
            <th class="">Actions</th>

        </tr>
        </thead>
        <tbody>
            @foreach ( $categories as $category )
            <tr class="border-top">
            <td >{{$category->name}}</td>
            <td >{{$category->status}}</td>

            <td class="text-center">
                <div class="btn-group dropstart">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('category.update.show', $category->name) }}">Editar</a></li>
                <li><a class="dropdown-item" href="#">Excluir</a></li>
                </ul>
            </div>
            </td>
        </tr>


            @endforeach
        </tbody>
    </table>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
            <div class="table-responsive">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Categorias</h3>

                </div>
                <table class="rounded-3 border">
                    <thead class="">
                    <tr>
                        <th class="vw-100">Categoria</th>
                        <th style="width: 500px;">Status</th>
                        <th class="">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ( $categories as $category )
                        <tr onclick="identifyId(this)" id="{{$category->name}}" class="border-top">
                        <td >{{$category->name}} e {{$category->id}}</td>
                        <td >{{$category->status}}</td>

                        <td class="text-center">
                            <div class="btn-group dropstart">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('category.update.show', $category->name) }}">Editar</a></li>
                            <li><a class="dropdown-item" href="#">Excluir</a></li>
                            </ul>
                        </div>
                        </td>
                    </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection







 --}}


 @extends('layouts.painel-partner')

@section('conteudo')

@livewire('partner.category.category-component')

@endsection
