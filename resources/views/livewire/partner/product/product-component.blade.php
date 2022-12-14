<div>
    <div class="p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="mr-3">
                    <h3 class="text-Dark">Produtos</h3>
                </div>
                <div>
                    <img class="mr-3 anchor-pointer" wire:click="tab('categories')" width="25px" src="{{ asset('img/partner/icon/icon-categories.svg') }}" alt="" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar produtos por categoria">

                    <img class="anchor-pointer" width="25px" src="{{ asset('img/partner/icon/icon-all.svg') }}" alt="" wire:click="tab('allProducts')" data-bs-toggle="tooltip" data-bs-placement="top" title="Mostrar todos produtos">

                </div>
            </div>

            <div>
                <button class="btn btn-Dark text-White fw-bold" data-bs-toggle="modal" data-bs-target="#modalNewProduct">Novo produto</button>
            </div>
        </div>

        <div class="my-3">

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


              <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade @if($tab == 1) show active @endif" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="mt-3 p-3 fw-bold text-CinzaMedio border border-AmareloGema rounded mb-3">
                        Aqui est??o seus produtos organizados por categoria... altere a visualiza????o atravez dos icones logo acima!
                     </div>
                    @foreach ($categories as  $category)
                    <div class="mb-5  bg-white  shadow  px-3 pt-3 pb-1 rounded" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="text-Dark mb-1 fw-bold">{{$category->name}}</h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <button wire:click="updateStatusCategory('{{$category->id}}')" class="btn fw-bold @if($category->status == "Inativo") btn-outline-Dark @else btn-Dark @endif">{{$category->status}}</button>
                                </div>

                                <div class="btn-group dropstart">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><h5 class="dropdown-header text-AmareloGema">Categoria {{$category->name}}</h5></li>
                                        <li><a class="dropdown-item fw-bold text-Dark" href="#" wire:click="editCategory('{{$category->id}}')" data-bs-toggle="modal" data-bs-target="#modalEditCategory">Editar </a></li>
                                        <li><a class="dropdown-item fw-bold text-Dark" href="#" wire:click="deleteCategory('{{$category->id}}')" data-bs-toggle="modal" data-bs-target="#modalDeleteCategory">Excluir</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>


                        <hr>
                        <div class="row  py-1 fw-bold text-Dark rounded">
                            <div class="col">Item</div>

                            <div class="col">Descri????o</div>
                            <div class="col">Valor </div>
                            <div style="width: 150px">Status</div>
                            <div class=" d-flex justify-content-center " style="width: 90px">A????es</div>
                        </div>
                        @foreach ($category->products as $products )

                            <div  class="anchor-pointer h-product row border py-3 my-1 d-flex align-items-center text-Dark rounded "  @if ($products->status == "Inativo")
                            style="opacity:0.7; background-color:rgba(175, 175, 175, 0.3);"
                            @else

                            @endif>
                                <div class="col" wire:click="editProduct('{{$products->id}}')"  href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" ><img class="mr-3" style="height: 70px; width: 70px; object-fit: cover; border-radius:50%; border:1px solid rgb(221, 221, 221);" {{-- src="{{ asset('img/admin/img-category-default.jpg') }}" --}}@if($products->image == '' || $products->image == null) src="{{ asset('img/admin/img-category-default.jpg') }}" @else  src="{{ asset('storage/'.$products->image) }}" @endif alt=""> {{$products->name}}</div>

                                <div  class="col py-3" wire:click="editProduct('{{$products->id}}')"  href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct"    >@if($products->description == '') N/A @else {{$products->description}} @endif </div>

                                <div class="col py-3" wire:click="editProduct('{{$products->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct">R$ @if($products->discount == '' || $products->discount == 0 || $products->discount == null) {{strtr($products->price, '.', ',')}} @else  {{strtr($products->discount, '.', ',')}} <img style="width: 20px" src="{{ asset('img/partner/icon/icon-discount.svg') }}" alt=""> @endif</div>

                                <div style="width: 150px">
                                    <button wire:click="updateStatusProduct('{{$products->id}}')" class="btn fw-bold @if($products->status == "Inativo") btn-outline-Dark @else btn-Dark @endif">{{$products->status}}</button>
                                </div>
                                <div class=" d-flex justify-content-center " style="width: 90px">
                                    <div class="btn-group dropstart">
                                        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><h5 class="dropdown-header text-AmareloGema">{{$products->name}}</h5></li>
                                            <li><a class="dropdown-item fw-bold text-Dark"  href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" wire:click="editProduct('{{$products->id}}')">Editar</a></li>
                                            <li><a class="dropdown-item fw-bold text-Dark" wire:click="deleteProduct('{{$products->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct">Excluir</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                    @endforeach
                </div>

                <div class="tab-pane fade  @if($tab == 2) show active @endif" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" >
                    <div class="mt-3 p-3 fw-bold text-dark border border-AmareloGema rounded mb-3">
                        Aqui est??o todos os seus produtos... altere a visualiza????o atravez dos icones logo acima!
                     </div>

                    <div class="mb-5  bg-white  shadow  px-3 pt-3 pb-1 srounded" >
                        <div class="row  py-1 fw-bold text-Dark rounded">
                            <div class="col">Item</div>

                            <div class="col">Descri????o</div>
                            <div style="width: 150px">Valor</div>
                            <div style="width: 250px">Categoria</div>
                            <div style="width: 150px">Status</div>
                            <div class=" d-flex justify-content-center " style="width: 90px">A????es</div>
                        </div>

                        @foreach ($allProducts as $allProduct)
                            <div class="anchor-pointer h-product row border py-3 my-1 d-flex align-items-center text-Dark rounded "  @if ($allProduct->status == "Inativo")
                                style="opacity:0.7; background-color:rgba(175, 175, 175, 0.3);"
                                @else

                                @endif>
                                <div wire:click="editProduct('{{$allProduct->id}}')" class="col" href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" ><img class="mr-3" style="height: 70px; width: 70px; object-fit: cover; border-radius:50%; border:1px solid rgb(221, 221, 221);" @if ($allProduct->image == null || $allProduct->image == '' )
                                    src="{{ asset('img/admin/img-category-default.jpg') }}"
                                @else
                                    src="{{ asset('storage/'.$allProduct->image) }}"
                                @endif    alt=""> {{$allProduct->name}}</div>
                                <div wire:click="editProduct('{{$allProduct->id}}')" class="col" href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" class="col">
                                    @if ($allProduct->description == null || $allProduct->description == '')
                                        N/A
                                    @else
                                        {{$allProduct->description}}
                                    @endif
                                </div>
                                <div wire:click="editProduct('{{$allProduct->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" style="width: 150px">
                                    {{$allProduct->price}}
                                </div>
                                <div wire:click="editProduct('{{$allProduct->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" class="py-3" style="width: 250px">
                                    @foreach ($modalCategories as $modalCategory)
                                        @if ($modalCategory->id == $allProduct->category_partner_id)
                                        {{$modalCategory->name}}
                                        @endif

                                    @endforeach
                                    @if($allProduct->category_partner_id == 0)
                                        Sem categoria
                                    @endif
                                </div>
                                <div style="width: 150px">
                                    <button wire:click="updateStatusProduct('{{$allProduct->id}}')" class="btn fw-bold @if($allProduct->status == "Inativo") btn-outline-Dark @else btn-Dark @endif">{{$allProduct->status}}</button>
                                </div>
                                <div class=" d-flex justify-content-center " style="width: 90px">
                                    <div class="btn-group dropstart">
                                        <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><h5 class="dropdown-header text-AmareloGema">{{$allProduct->name}}</h5></li>
                                            <li><a class="dropdown-item fw-bold text-Dark"  href="#" data-bs-toggle="modal" data-bs-target="#modalEditProduct" wire:click="editProduct('{{$allProduct->id}}')">Editar</a></li>
                                            <li><a class="dropdown-item fw-bold text-Dark" wire:click="deleteProduct('{{$allProduct->id}}')" href="#" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct">Excluir</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    {{ $allProducts->links() }}

                </div>

              </div>





        </div>
    </div>


  <div wire:ignore.self class="modal fade " id="modalNewProduct" tabindex="-1" aria-labelledby="modalNewProductLabel" aria-hidden="true">
    <div class="modal-dialog  {{-- modal-dialog-centered --}} modal-lg " >
      <div class="modal-content ">
        <div class="modal-header ">
          <h5 class="modal-title " id="modalNewProductLabel">@if($product_name == null )Novo Produto @else {{$product_name}} @endif</h5>
          <button wire:click="resetModal('product')" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveProduct">
            <div class="modal-body ">

                {{--  --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button wire:ignore.self class="nav-link @if($tab == 1) active @endif" id="home-tab" data-bs-toggle="tab" data-bs-target="#dataBase" type="button" role="tab" aria-controls="dataBase" aria-selected="true">Dados b??sicos</button>
                    </li>
                    <li  class="nav-item" role="presentation">
                      <button wire:ignore.self class="nav-link @if($tab == 2) active @endif" id="profile-tab" data-bs-toggle="tab" data-bs-target="#productComponent" type="button" role="tab" aria-controls="productComponent" aria-selected="false">Componentes</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div wire:ignore.self class="tab-pane fade show active  border p-3 border-top-0" id="dataBase" role="tabpanel" aria-labelledby="dataBase-tab">
                        <div>
                            <a class="text-decoration-none fw-bold text-AmareloGema">Imagem do item</a>

                            <div class=" rounded-3 mb-1 border d-flex justify-content-center align-items-center bg-white p-3" style="width: 100%; height: 100%;">
                                <div class="position-relative">

                                    <img style="width: 300px; height: 250px; object-fit: cover;" wire:click="selectImage" class="rounded-3 p-1 border" src="@if ($photo) {{ $photo->temporaryUrl() }} @else {{ asset('img/partner/image-store-partner/img-default.png') }} @endif " alt="">

                                    <div wire:loading wire:target="photo" class="position-absolute top-50 start-50 translate-middle">

                                        <div class="spinner-border text-warning" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>

                                    </div>
                                </div>

                                <input class="d-none" id="imageProduct" type="file" wire:model="photo" accept=".JPEG, .JPG, .PNG, .HEIC">

                            </div>

                            <a class="text-decoration-none fw-bold text-AmareloGema">Detalhes</a>

                            <div class=" rounded-3 mb-1 border bg-white p-3">

                                <div class="d-flex justify-content-end">
                                    <a class="text-decoration-none fw-bold text-Dark" href="#" data-bs-toggle="modal" data-bs-target="#modalNewCategory">Nova categoria</a>
                                </div>

                                <div class="form-floating mb-3">

                                    <select wire:model="selCategory" class="form-select" id="floatingSelect" aria-label="Floating label select example">


                                        <option @if(!isset($newCategory)) selected @endif>Selecione a categoria</option>

                                        @foreach ($modalCategories as $modalCategory)
                                        <option wire:key="selCategory{{$category_id}}" value="{{$modalCategory->id}}">{{$modalCategory->name}}</option>
                                        @endforeach

                                    </select>

                                    <label for="floatingSelect">Categoria</label>
                                    @error('selCategory') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>

                                <div class="form-floating mb-3">
                                    <input wire:model="product_name" type="text" class="form-control" placeholder="name@example.com">
                                    <label for="floatingInput">Item</label>
                                    @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-floating mb-1">
                                    <textarea wire:model="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Descri????o</label>
                                </div>
                            </div>
                            <a class="text-decoration-none fw-bold text-AmareloGema">Pre??o</a>
                            <div  class=" rounded-3 mb-1 border bg-white p-3">
                                    @if($discount == true)
                                    <a class="text-decoration-none fw-bold text-Pitanga" wire:click="removeDiscount" href="#">Remover desconto</a>
                                @else
                                    <a class="text-decoration-none fw-bold text-Dark" wire:click="addDiscount" href="#">Aplicar desconto</a>
                                @endif
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-floating mb-3">
                                                <input wire:model="price" @if($discount == true) readonly @endif type="text" class="form-control maskPrice" placeholder="name@example.com">
                                                <label for="floatingInput">Pre??o @if($discount == true)atual @endif</label>
                                                @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                        @if($discount == true)
                                        <div class="col-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" wire:model="newPrice"  wire:keyUp="sumDescount" class="form-control maskPrice" placeholder="name@example.com">
                                                <label for="floatingInput">Pre??o novo</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" wire:keyUp="calPercent" wire:model="percent" placeholder="name@example.com">
                                                <label for="floatingInput">Desconto (%)</label>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div wire:ignore.self class="tab-pane fade border p-3 border-top-0" id="productComponent" role="tabpanel" aria-labelledby="productComponent-tab">


                        <a class="text-decoration-none text-AmareloGema fw-bold mt-3" href="">Componentes</a>
                        <div class="border rounded fw-bold text-CinzaMedio p-3">
                            <p>
                                Aqui voc?? seleciona os items que comp??em seu produto, combo ou kit...
                            </p>
                            <div>
                                <div class="">
                                    <button class="btn btn-AmareloGema fw-bold" {{-- wire:click="addP" --}} type="button" data-bs-toggle="modal" data-bs-target="#testeModal">Adicionar</button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <a class="text-decoration-none text-AmareloGema fw-bold mt-3" href="">Itens adicionados</a>

                        <div class=" rounded p-3 border">
                            <div class="">
                                <div class="@if($items == []) d-none @else d-flex @endif bd-highlight">
                                    <div class="fw-bold flex-grow-1 bd-highlight  mr-1">
                                        Item
                                    </div>
                                    <div class="fw-bold bd-highlight mr-1 " style="width: 100px">
                                        Qtd.
                                    </div>
                                    <div class="fw-bold bd-highlight" style="width: 50px">
                                        Excluir
                                    </div>
                                </div>
                            </div>
                            @forelse($items as $item)
                                {{-- <div wire:key="Item{{$loop->index}}"> --}}
                                    {{-- <input wire:model="items.{{$loop->index}}.p" type="text"> --}}

                                        <div class="d-flex bd-highlight">
                                            <div class="mb-3 flex-grow-1 bd-highlight  mr-1" {{-- wire:key="Item{{$loop->index}}" --}}>
                                                <input type="text" wire:model="items.{{$loop->index}}.name" disabled class="form-control" id="floatingInput" placeholder="name@example.com">
                                            </div>
                                            <div class="mb-3 bd-highlight mr-1 " style="width: 100px">
                                                <input type="number" wire:model="items.{{$loop->index}}.qtdProduct" class="form-control">
                                            </div>
                                            <div class="mb-3 bd-highlight" style="width: 50px">
                                                <input type="button" class="form-control btn btn-Pitanga text-light" value="X" wire:click="removeText({{$loop->index}})">
                                            </div>
                                        </div>

                                        {{-- <div class="col p-3 " wire:key="Item{{$loop->index}}">

                                            <input disabled class="form-control" wire:model="items.{{$loop->index}}.name" type="text"/>

                                        </div> --}}
{{--                                         <div class="col-2 p-3 ">
                                            <input class="form-control" value="1" type="text"/>
                                        </div> --}}
                                        {{-- <div >
                                            {{$item['name']}}
                                        </div >--}}
{{--                                         <div class="col-1 p-3 ">
                                            <button class="btn btn-Pitanga" wire:click="removeText({{$loop->index}})" type="button">X</button>
                                        </div> --}}


                                {{--  --}}
                            @empty
                                <div class="fw-bold text-CinzaMedio">Aqui apareceram os componentes selecionados para este item.</div>

                            @endforelse
                        </div>









                    </div>
                  </div>
                {{--  --}}
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="resetModal('product')" class="btn btn-outline-Dark" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-Dark text-White fw-bold">Salvar</button>
            </div>
        </form>
      </div>
    </div>
  </div>





  <!-- Modal edit Product-->
  <div wire:ignore.self class="modal fade "  data-bs-backdrop="static" id="modalEditProduct" tabindex="-1" aria-labelledby="modalEditProductLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg " >
      <div class="modal-content ">
        <div class="modal-header ">
          <h5 class="modal-title " id="modalEditProductLabel">Editar produto</h5>
          <button wire:click="resetModal('product')" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="updateProduct">
             <div class="modal-body">
                <a class="text-decoration-none fw-bold text-AmareloGema">Imagem do item</a>
                <div class=" rounded-3 mb-1 border d-flex justify-content-center align-items-center bg-white p-3" style="width: 100%; height: 100%;">
                    <div class="position-relative">


                        <img wire:click="selectImage" style="width: 300px; height: 250px; object-fit: cover;"    class="rounded-3 p-1 border" src="@if ($photo) {{ $photo->temporaryUrl() }} @elseif ($imageBd) {{ asset('storage/'.$imageBd) }} @else {{ asset('img/partner/image-store-partner/img-default.png') }} @endif " alt="">

                        <div wire:loading wire:target="photo" class="position-absolute top-50 start-50 translate-middle">
                            <div class="spinner-border text-warning" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <input type="file" class="d-none" wire:model="photo" wire:click="resetBdImage" accept=".JPEG, .JPG, .PNG, .HEIC" id="inputGroupFile02">

                </div>
                <a class="text-decoration-none fw-bold text-AmareloGema">Detalhes</a>
                <div class=" rounded-3 mb-1 border bg-white p-3">
                    <div class="d-flex justify-content-end">
                        <a class="text-decoration-none fw-bold text-Dark" href="#" data-bs-toggle="modal" data-bs-target="#modalNewCategory">Nova categoria</a>
                    </div>
                    <div class="form-floating mb-3">
                        <select wire:model="selCategory" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option @if($newCategory == null) selected @endif>Selecione a categoria</option>
                            @foreach ($modalCategories as $modalCategory)
                            <option value="{{$modalCategory->id}}" wire:key="selCategory{{$category_id}}">{{$modalCategory->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Categoria</label>
                        @error('selCategory') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input wire:model="product_name" type="text" class="form-control" placeholder="name@example.com">
                        <label for="floatingInput">Item</label>
                        @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <textarea wire:model="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Descri????o</label>
                    </div>
                </div>
                    <a class="text-decoration-none fw-bold text-AmareloGema">Pre??o</a>
                <div  class=" rounded-3 mb-1 border bg-white p-3">
                        @if($discount == true)
                        <a class="text-decoration-none fw-bold text-Pitanga" wire:click="removeDiscount" href="#">Remover desconto</a>
                      @else
                        <a class="text-decoration-none fw-bold text-Dark" wire:click="addDiscount" href="#">Aplicar desconto</a>
                      @endif
                        <div class="row">
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input wire:model="price" @if($discount == true) readonly @endif type="text" class="form-control maskPrice" placeholder="name@example.com">
                                    <label for="floatingInput">Pre??o @if($discount == true)atual @endif</label>
                                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                            @if($discount == true)
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model="newPrice" wire:keyUp="sumDescount" class="form-control maskPrice" placeholder="name@example.com">
                                    <label for="floatingInput">Pre??o novo</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" wire:keyUp="calPercent" wire:model="percent" placeholder="name@example.com">
                                    <label for="floatingInput">Desconto (%)</label>
                                </div>
                            </div>
                            @endif
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="resetModal('product')" class="btn btn-outline-Dark" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-Dark text-White fw-bold">Salvar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal exclude -->
  <div wire:ignore.self class="modal fade" id="modalDeleteProduct" tabindex="-1" aria-labelledby="modalDeleteProductLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteProductLabel">Excluir Produto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroyProduct">
            <div class="modal-body">
                Tem certeza que deseja excluir este produto?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-Dark" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-Dark text-White fw-bold">Sim! Exclua.</button>
              </div>
        </form>
      </div>
    </div>
  </div>



  {{-- category --}}

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
                Todos os produtos vinculados a esta categoria deixar??o de ser exibidos na loja! tem certeza que deseja prosseguir? <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-Dark" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-Dark text-White fw-bold">Sim! Exclua.</button>
              </div>
        </form>
      </div>
    </div>
  </div>

  {{-- modal new category --}}
  <div wire:ignore.self class="modal fade" id="modalNewCategory" tabindex="-1" aria-labelledby="modalNewCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNewCategoryLabel">Nova Categoria</h5>
          <button type="button" wire:click="resetModal('category')" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#modalNewProduct"></button>
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
                <button type="button" wire:click="resetModal('category')" class="btn btn-outline-Dark" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalNewProduct">Fechar</button>
                <button type="submit" class="btn btn-Dark text-White fw-bold">Salvar</button>
              </div>
      </div>
    </form>
    </div>
  </div>
{{-- end modal new category --}}
  {{-- modal edit category --}}
  <div wire:ignore.self class="modal fade" id="modalEditCategory" tabindex="-1" aria-labelledby="modalEditCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditCategoryLabel">Editar Categoria</h5>
          <button type="button" wire:click="resetModal('category')" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form>
            <div class="modal-body">
              <div class="form-floating">
                <input wire:model="category_name" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Categoria</label>
                @error('category_name') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" wire:click="resetModal('category')" class="btn btn-outline-Dark" data-bs-dismiss="modal" >Fechar</button>
                <button type="submit" class="btn btn-Dark text-White fw-bold">Salvar</button>
              </div>
      </div>
    </form>
    </div>
  </div>
    {{-- end modal edit category --}}
    <!-- Modal -->
    <div class="modal fade" id="testeModal" tabindex="-1" aria-labelledby="testeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="testeModalLabel">Ingredientes</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                @foreach ( $allProducts as $allProduct )
                <div type="" class="anchor-pointer h-product border p-3 rounded mb-1" wire:click="selProduct('{{$allProduct->id}}')" data-bs-toggle="modal" data-bs-target="#modalNewProduct">
                    {{$allProduct->name}}
                </div>

                @endforeach
                </div>
            </div>
            {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
        </div>
    </div>
</div>


@section('scripts')

<script>
    $(document).ready(function(){
        $(".maskPrice").mask("999.999.990,00", {reverse: true})
    });

    window.addEventListener('maskDiscount', event=> {
        $(".maskPrice").mask("999.999.990,00", {reverse: true})
    });

    window.addEventListener('openPathImage', event => {
        $( '#inputGroupFile02' ).click();
    });

    window.addEventListener('close-modal', event => {
    $( '#modalDeleteProduct' ).modal( 'hide' );
    $( '#modalNewProduct' ).modal( 'hide' );
    $( '#modalEditProduct' ).modal( 'hide' );
    $( '#modalDeleteCategory' ).modal( 'hide' );
    $( '#testeModal' ).modal( 'hide' );

    });

    window.addEventListener('open-modal', event => {
        $( '#modalNewCategory' ).modal( 'hide' );
        $( '#modalNewProduct' ).modal( 'show' );
    });

    window.addEventListener('close-alert', event => {
        $(document).ready(function(){
        setTimeout(function() {
        $(".alert").fadeOut("slow", function(){
            $(this).alert('close');
        });
        }, 3000);
        });
    });

</script>

@endsection
