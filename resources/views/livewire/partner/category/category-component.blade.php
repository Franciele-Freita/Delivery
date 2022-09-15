<div>
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center">
                <div class="mr-3">
                    <h3 class="text-Dark">Categorias</h3>
                </div>
            <div>
                <button class="btn btn-Dark text-White fw-bold" data-bs-toggle="modal" data-bs-target="#modalNewCategory">Nova categoria</button>
            </div>
        </div>

        <div class="my-3">
            <div class="mt-3 p-3 fw-bold text-dark border border-AmareloGema rounded mb-3">
                Aqui estão todos suas categorias cadastradas...
             </div>
            @if(session()->has('message'))
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>

            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    {{session('message')}}
                </div>
            </div>

            @endif

            <div class="mb-5  bg-white  shadow  px-3 pt-3 pb-1 rounded" >
                <div class="row  py-1 fw-bold text-Dark rounded">
                    <div class="col">Nome da Categoria</div>
                    <div style="width: 150px">Status</div>
                    <div class=" d-flex justify-content-center " style="width: 90px">Ações</div>
                </div>
                @foreach ($categories as $category)
                <div  class="anchor-pointer h-product row border py-3 my-1 d-flex align-items-center text-Dark rounded"
                @if ($category->status == "Inativo")
                            style="opacity:0.7; background-color:rgba(175, 175, 175, 0.3);"
                            @else

                            @endif
                >
                    <div class="col">
                        {{$category->name}}
                    </div>
                    <div style="width: 150px">
                        <button wire:click="updateStatusCategory('{{$category->id}}')" class="btn @if($category->status == "Inativo") btn-outline-Dark @else btn-Dark @endif">{{$category->status}}</button>
                    </div>
                    <div class=" d-flex justify-content-center " style="width: 90px">
                        <div class="btn-group dropstart">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><h5 class="dropdown-header text-AmareloGema">{{$category->name}}</h5></li>
                                <li><a class="dropdown-item fw-bold text-Dark"  href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" wire:click="editProduct('{{$category->id}}')">Editar</a></li>
                                <li><a class="dropdown-item fw-bold text-Dark" wire:click="deleteCategory('{{$category->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteCategory">Excluir</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $categories->links() }}
        </div>
    </div>


  {{-- modal new category --}}
  <div wire:ignore.self class="modal fade" id="modalNewCategory" tabindex="-1" aria-labelledby="modalNewCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNewCategoryLabel">Nova Categoria</h5>
          <button type="button" wire:click="resetModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveCategory">
            <div class="modal-body">
              <div class="form-floating">
                <input wire:model="category_name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Categoria</label>
                @error('category_name') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" wire:click="resetModal" class="btn btn-outline-Dark" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-Dark text-White fw-bold">Salvar</button>
              </div>
      </div>
    </form>
    </div>
  </div>
{{-- end modal new category --}}






<!-- Modal exclude -->
<div wire:ignore.self class="modal fade" id="modalDeleteCategory" tabindex="-1" aria-labelledby="modalDeleteCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteCategoryLabel">Excluir Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyCategory">
            <div class="modal-body">
                Todos os produtos vinculados a esta categoria deixarão de ser exibidos na loja! tem certeza que deseja prosseguir?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-Dark" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-Dark text-White fw-bold">Sim! Exclua.</button>
              </div>
        </form>
      </div>
    </div>
  </div>



</div>
@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $( '#modalNewCategory' ).modal( 'hide' );
            $( '#modalDeleteCategory' ).modal( 'hide' );


        });
    </script>
@endsection
