
<div>
    <div class="row text-CinzaMedio">
        <div class="mb-3">
            <h5>Meus endereços</h5>
        </div>

        @forelse ($addresses as $address)
        <div class="col-6">
            <div class="mb-3  border p-3 rounded ">
                <div class="d-flex align items-center justify-content-between">
                    <b>{{$address->recipient}}</b>
                    @if($address->main ==true)
                    <div>
                        <b>Principal</b> <img class="mr-1"
                            src="{{ asset('img/icon/icon-marketplace/icon-pine-checked.svg') }}"
                            wire:click="updateMainButton('{{$address->id}}')" alt="" style="width: 25px">
                    </div>
                    @else
                    <img class="mr-1" src="{{ asset('img/icon/icon-marketplace/icon-pine-outline.svg') }}"
                        wire:click="updateMainButton('{{$address->id}}')" alt="" style="width: 25px">
                    @endif
                </div>
                <hr>
                <div class="mb-3 text-center">
                    <img class="mb-1" src="{{ asset('img/icon/icon-marketplace/icon-location.svg') }}" alt=""
                        style="width: 25px"> - <b>{{$address->type}}</b> <br>
                    <div class="mt-3">
                        {{$address->street}}, {{$address->number}} @if($address->complement == null) - @else
                        {{$address->complement}} - @endif {{$address->district}}<br> {{$address->city}} -
                        {{$address->estate}}
                        CEP: {{$address->cep}} <br>
                    </div>
                </div>
                <div class="d-flex justify-content-around">
                    <a class="text-decoration-none text-AzulPiscina fw-bold anchor-pointer"
                        wire:click="showAddress('{{$address->id}}')" data-bs-toggle="modal"
                        data-bs-target="#showAddress">Editar</a>
                    <a class="text-decoration-none text-AzulPiscina fw-bold anchor-pointer"
                        wire:click="deleteAddress('{{$address->id}}')" data-bs-toggle="modal"
                        data-bs-target="#deleteAddressModal">Excluir</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col p-3 mb-3 d-flex flex-column align-items-center text-CinzaMedio">

            <img class="mb-3" src="{{ asset('img/icon/icon-marketplace/icon-location.svg') }}" alt=""
                style="width: 70px">

            <h3 class="">Nenhum endereço cadastrado.</h3>
            <div>
                <a class="text-CinzaMedio" data-bs-toggle="modal" data-bs-target="#newAddress">Cadastrar endereço</a>
            </div>
        </div>
        @endforelse
        @if(count($addresses) > 0)
        <a class="anchor-pointer text-decoration-none fw-bold text-AzulPiscina text-center" data-bs-toggle="modal"
            data-bs-target="#newAddress">+ Cadastrar novo</a>

        @endif
        <!-- Modal new address -->
        <div wire:ignore.self class="modal fade" id="newAddress" tabindex="-1" aria-labelledby="newAddressLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newAddressLabel">Editar endereço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="resetModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="newAddress">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="recipient" class="form-control" id="recipient"
                                    placeholder="Destinatário">
                                <label for="recipient">Nome do destinatário</label>
                                @error('recipient') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" wire:model="type" list="datalistOptions"
                                    id="exampleDataList" placeholder="Tipo de endereço...">
                                <datalist id="datalistOptions">
                                    <option value="Residencial">
                                    <option value="Comercial">
                                    <option value="Casa">
                                    <option value="Trabalho">
                                </datalist>
                                <label for="exampleDataList" class="form-label">Tipo de endereço</label>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="flex-grow-1 bd-highlight mb-3">
                                    <div class="form-floating mr-1 position-relative">
                                        <input type="text cep" wire:keydown="searchCep" wire:model="cep"
                                            class="form-control" id="cep" placeholder="cep">
                                        <label for="cep">cep</label>

                                        <div wire:click="searchCep"
                                            class="anchor-pointer position-absolute top-50 end-0 translate-middle-y p-3">
                                            <img src="{{ asset('img/icon/icon-marketplace/icon-search.svg') }}" alt=""
                                                style="width: 30px">
                                        </div>
                                    </div>
                                    @error('cep') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex-shrink-1 bd-highlight mt-3">
                                    <a class="text-decoration-none text-CinzaMedio fw-bold" target="blank"
                                        href="https://buscacepinter.correios.com.br/app/endereco/index.php?t">Não sei
                                        meu cep</a>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" wire:model="street" class="form-control" id="street"
                                    placeholder="Rua, Av...">
                                <label for="street">Endereço</label>
                                @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-shrink-1 bd-highlight">
                                    <div class="mr-1 form-floating mb-3">
                                        <input type="text" wire:model="number" class="form-control" id="number"
                                            placeholder="Número">
                                        <label for="number">Número</label>
                                        @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="w-100 bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="complement" class="form-control" id="complement"
                                            placeholder="Complemento">
                                        <label for="complement">Complemento</label>
                                        @error('complement') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="reference" class="form-control" id="reference"
                                    placeholder="Referencia do endereço">
                                <label for="reference">Informação de referência</label>
                                @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="mr-1 bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="district" class="form-control" id="district"
                                            placeholder="Bairro">
                                        <label for="district">Bairro</label>
                                        @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mr-1 bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="city" class="form-control" id="city"
                                            placeholder="Cidade">
                                        <label for="city">Cidade</label>
                                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="estate" class="form-control" id="estate"
                                            placeholder="Estado">
                                        <label for="estate">Estado</label>
                                        @error('estate') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" wire:model="main" type="checkbox"
                                    id="flexSwitchCheckDefault">
                                <label
                                    class="form-check-label fw-bold @if($main == true) text-CinzaMedio @else text-CinzaClaro @endif"
                                    for="flexSwitchCheckDefault">Endereço principal</label>
                            </div>
                            <button type="submit"
                                class="btn btn-AmareloGema form-control text-CinzaMedio fw-bold">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit Address-->
        <div wire:ignore.self class="modal fade" id="showAddress" tabindex="-1" aria-labelledby="showAddressLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAddressLabel">Editar endereço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="resetModal"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="editAddress">
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="recipient" class="form-control" id="recipient"
                                    placeholder="Destinatário">
                                <label for="recipient">Nome do destinatário</label>
                                @error('recipient') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" wire:model="type" list="datalistOptions"
                                    id="exampleDataList" placeholder="Tipo de endereço...">
                                <datalist id="datalistOptions">
                                    <option value="Residencial">
                                    <option value="Comercial">
                                    <option value="Casa">
                                    <option value="Trabalho">
                                </datalist>
                                <label for="exampleDataList" class="form-label">Tipo de endereço</label>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="flex-grow-1 bd-highlight mb-3">
                                    <div class="form-floating mr-1 position-relative">
                                        <input type="text" wire:model="cep" class="form-control" id="edit-cep"
                                            placeholder="cep">
                                        <label for="cep">cep</label>

                                        <div wire:click="searchCep"
                                            class="anchor-pointer position-absolute top-50 end-0 translate-middle-y p-3">
                                            <img src="{{ asset('img/icon/icon-marketplace/icon-search.svg') }}" alt=""
                                                style="width: 30px">
                                        </div>
                                    </div>
                                    @error('cep') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="flex-shrink-1 bd-highlight mt-3">
                                    <a class="text-decoration-none text-CinzaMedio fw-bold" target="blank"
                                        href="https://buscacepinter.correios.com.br/app/endereco/index.php?t">Não sei
                                        meu cep</a>
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" wire:model="street" class="form-control" id="street"
                                    placeholder="Rua, Av...">
                                <label for="street">Endereço</label>
                                @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class=" flex-shrink-1 bd-highlight">
                                    <div class="mr-1 form-floating mb-3">
                                        <input type="text" wire:model="number" class="form-control" id="number"
                                            placeholder="Número">
                                        <label for="number">Número</label>
                                        @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="w-100 bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="complement" class="form-control" id="complement"
                                            placeholder="Complemento">
                                        <label for="complement">Complemento</label>
                                        @error('complement') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" wire:model="reference" class="form-control" id="reference"
                                    placeholder="Referencia do endereço">
                                <label for="reference">Informação de referência</label>
                                @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-flex bd-highlight">
                                <div class="mr-1 bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="district" class="form-control" id="district"
                                            placeholder="Bairro">
                                        <label for="district">Bairro</label>
                                        @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="mr-1 bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="city" class="form-control" id="city"
                                            placeholder="Cidade">
                                        <label for="city">Cidade</label>
                                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="bd-highlight">
                                    <div class="form-floating mb-3">
                                        <input type="text" wire:model="estate" class="form-control" id="estate"
                                            placeholder="Estado">
                                        <label for="estate">Estado</label>
                                        @error('estate') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-switch mb-3">
                                <input class="form-check-input" wire:model="main" type="checkbox"
                                    id="flexSwitchCheckDefault">
                                <label
                                    class="form-check-label fw-bold @if($main == true) text-CinzaMedio @else text-CinzaClaro @endif"
                                    for="flexSwitchCheckDefault">Endereço principal</label>
                            </div>
                            <button type="submit"
                                class="btn btn-AmareloGema form-control text-CinzaMedio fw-bold">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Modal delete address-->
  <div wire:ignore.self class="modal fade" id="deleteAddressModal" tabindex="-1" aria-labelledby="deleteAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAddressLabel">Excluir endereço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir este endereço?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-CinzaClaro fw-bold"
                    data-bs-dismiss="modal">Não</button>
                <button type="button" wire:click="destroyAddress"
                    class="btn btn-AmareloGema fw-bold text-CinzaMedio">Sim, Pode excluir!</button>
            </div>
        </div>
    </div>
  </div>

</div>


@section('scripts')
{{-- <script>
    $(document).ready(function(){
    $('#cep').mask('00000000');
    $('#edit-cep').mask('00000000');
    });
    window.addEventListener('close-modal', event => {
        $( '#newAddress' ).modal( 'hide' );
        $( '#showAddress' ).modal( 'hide' );
        $( '#deleteAddress' ).modal( 'hide' );
    });
</script> --}}
@endsection
