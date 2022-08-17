@extends('layouts.admin')

@section('nav')

    @include('includes.admin.nav-category-admin')
@endsection

@section('conteudo')
<div class="">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade @if($tab == 1) show active @endif " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <h3 class="text-center">Categorias</h3>
            <div class="d-flex justify-content-center">
                <div class="col-10 my-3 border p-3">
                    @if(session('success'))
                    <div class="d-flex justify-content-start">
                        <p class="text-success">{{session('success')}}</p>
                    </div>
                    @endif
                    <div class="row px-3 py-1 border-bottom fw-bold">
                        <div class="col ">
                            Imagem
                        </div>
                        <div class="col">
                            Categoria
                        </div>
                        <div class="col">
                            Ações
                        </div>
                    </div>
                    @foreach ($categories as $category)
                        <div class="row d-flex align-items-center p-1 border-bottom">
                            <div class="col" >
                                <img class="rounded-circle border border-3 border-BegeMate" src="{{ asset("img/admin/icon/$category->img_category") }}" alt="" style="width: 60px; height: 60px; object-fit:cover;">
                            </div>
                            <div class="col">
                                {{$category->name_category}}
                            </div>
                            <div class="col">
                                <div class="btn-group dropend">
                                    <a class="" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="" style="width: 20px">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditCategory{{$category->id}}" href="">Editar</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalExcludeCategory{{$category->id}}" href="">Excluir</a></li>
                                        {{-- <form action="{{ route('admin.category.destroy', $category->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Excluir</button>
                                        </form> --}}
                                    </ul>
                                </div>
                            </div>

                        </div>
                        {{-- Modal de edição da categoria --}}
                        <div class="modal fade" id="modalEditCategory{{$category->id}}" tabindex="-1" aria-labelledby="modalEditeCategory" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.category.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">Editar categoria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-floating">
                                                <input type="hidden" class="form-control" id="id" name="id" placeholder="name@example.com" value="{{$category->id}}">
                                            </div>
                                            <label class="mb-2 fw-bold text-CinzaMedio" for="">Imagem</label>
                                            <div class=" mb-3 d-flex flex-column align-items-center border rounded-3 p-3 bg-white">

                                                <img class="p-1 rounded-circle view_category border" id="view_edit_category{{$category->id}}" onclick="clicar(this)" data-id="{{$category->id}}" name="view_edit_category"
                                                    src="{{ asset("img/admin/icon/$category->img_category") }}" alt="">
                                                <input class="d-none" type="file" name="img_edit_category" id="img_edit_category{{$category->id}}" data-id="{{$category->id}}" value="{{ $category->img_category }}" onchange="previewEditCategory(this)"
                                                    accept=".JPEG, .JPG, .PNG, .HEIC" >
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="name_edit_category" name="name_edit_category" placeholder="name@example.com" value="{{$category->name_category}}">
                                                <label for="name_edit_category">Nome da categoria</label>
                                            </div>
                                    </div>
                                    <div class="form-floating">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="name@example.com" value="{{$category->id}}">
                                    </div>
                                    <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-dark text-white">Editar</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        {{-- fim do modal de edição da categoria --}}

                        {{-- Modal de exclusão da categoria --}}
                        <div class="modal fade" id="modalExcludeCategory{{$category->id}}" tabindex="-1" aria-labelledby="modalExcludeCategory" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.category.destroy') }}" method="POST">
                                    @csrf
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">Excluir categoria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Deseja realmente excluir a categoria <strong>"{{$category->name_category}}"</strong>?
                                    </div>
                                    <div class="form-floating">
                                        <input type="hidden" class="form-control" id="id" name="id" placeholder="name@example.com" value="{{$category->id}}">
                                    </div>
                                    <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-dark text-white">Excluir</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        {{-- fim do modal de exclusão da categoria --}}
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab-pane fade @if($tab == 2) show active @endif" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            @include('admin.category.Register_categories')
        </div>
      </div>

</div>

  @endsection
