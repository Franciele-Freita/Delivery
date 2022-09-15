<div>
    <div class="row text-CinzaMedio">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Meus endereços</h5>
            <a class="text-decoration-none fw-bold text-AzulPiscina" data-bs-toggle="modal"
            data-bs-target="#newAddress">+ Cadastrar novo endereço</a>
        </div>
        @foreach ($addresses as $address)
        <div class="col-6">
            <div class="mb-3  border p-3 rounded ">
                <b>{{$address->recipient}}</b> <br>
                <hr>
                <div class="mb-3 text-center">
                    <img class="mb-1" src="{{ asset('img/icon/icon-marketplace/icon-location.svg') }}" alt=""
                        style="width: 25px"> <br>
                    <div>
                        {{$address->street}}, {{$address->number}} @if($address->complement == null) - @else
                        {{$address->complement}} - @endif {{$address->district}}<br> {{$address->city}} -
                        {{$address->estate}}
                        CEP: {{$address->cep}} <br>
                    </div>
                </div>
                <div class="form-check mb-3 d-flex justify-content-center">
                    <input class="form-check-input mr-1" @if ($address->main == true)
                    checked
                    @endif type="radio" name="flexRadioDefault" id="address{{$address->id}}">
                    <label class="form-check-label" for="address{{$address->id}}">
                        Endereço principal
                    </label>
                </div>
                <hr>
                <div class="d-flex justify-content-around ">
                    <a class="text-decoration-none text-AzulPiscina fw-bold anchor-pointer"
                        wire:click="showAddress('{{$address->id}}')" data-bs-toggle="modal"
                        data-bs-target="#showAddress">Editar</a>
                    <a class="text-decoration-none text-AzulPiscina fw-bold anchor-pointer"
                        wire:click="deleteAddress('{{$address->id}}')" data-bs-toggle="modal"
                        data-bs-target="#deleteAddress">Excluir</a>
                </div>
            </div>

        </div>
        @endforeach

    </div>

    <!-- Modal new address -->
    <div wire:ignore.self class="modal fade" id="newAddress" tabindex="-1" aria-labelledby="newAddressLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newAddressLabel">Editar endereço</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="resetModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="newAddress">
                        <div class="form-floating mb-3">
                            <input type="text" wire:model.defer="recipient" class="form-control" id="recipient"
                                placeholder="Destinatário">
                            <label for="recipient">Nome do destinatário</label>
                            @error('recipient') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" wire:model.lazy="cep" class="form-control" id="cep" placeholder="cep">
                            <label for="cep">cep</label>
                            @error('cep') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" wire:model.defer="street" class="form-control" id="street"
                                placeholder="Rua, Av...">
                            <label for="street">Endereço</label>
                            @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-shrink-1 bd-highlight">
                                <div class="mr-1 form-floating mb-3">
                                    <input type="text" wire:model.defer="number" class="form-control" id="number"
                                        placeholder="Número">
                                    <label for="number">Número</label>
                                    @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="w-100 bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model.defer="complement" class="form-control" id="complement"
                                        placeholder="Complemento">
                                    <label for="complement">Complemento</label>
                                    @error('complement') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" wire:model.defer="reference" class="form-control" id="reference"
                                placeholder="Referencia do endereço">
                            <label for="reference">Informação de referência</label>
                            @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex bd-highlight">
                            <div class="mr-1 bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model.defer="district" class="form-control" id="district"
                                        placeholder="Bairro">
                                    <label for="district">Bairro</label>
                                    @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mr-1 bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model.defer="city" class="form-control" id="city"
                                        placeholder="Cidade">
                                    <label for="city">Cidade</label>
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model.defer="estate" class="form-control" id="estate"
                                        placeholder="Estado">
                                    <label for="estate">Estado</label>
                                    @error('estate') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-AmareloGema form-control text-CinzaMedio fw-bold">Salvar</button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  wire:click="resetModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editAddress">
                        <div class="form-floating mb-3">
                            <input type="text" wire:model="recipient" class="form-control" id="edit-recipient"
                                placeholder="Destinatário">
                            <label for="recipient">Nome do destinatário</label>
                            @error('recipient') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" wire:model="cep" class="form-control" id="edit-cep" placeholder="cep">
                            <label for="cep">cep</label>
                            @error('cep') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" wire:model="street" class="form-control" id="edit-street"
                                placeholder="Rua, Av...">
                            <label for="street">Endereço</label>
                            @error('street') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex bd-highlight">
                            <div class=" flex-shrink-1 bd-highlight">
                                <div class="mr-1 form-floating mb-3">
                                    <input type="text" wire:model="number" class="form-control" id="edit-number"
                                        placeholder="Número">
                                    <label for="number">Número</label>
                                    @error('number') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="w-100 bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model="complement" class="form-control" id="edit-complement"
                                        placeholder="Complemento">
                                    <label for="complement">Complemento</label>
                                    @error('complement') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" wire:model="reference" class="form-control" id="edit-reference"
                                placeholder="Referencia do endereço">
                            <label for="reference">Informação de referência</label>
                            @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex bd-highlight">
                            <div class="mr-1 bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model="district" class="form-control" id="edit-district"
                                        placeholder="Bairro">
                                    <label for="district">Bairro</label>
                                    @error('district') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mr-1 bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model="city" class="form-control" id="edit-city"
                                        placeholder="Cidade">
                                    <label for="city">Cidade</label>
                                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="bd-highlight">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model="estate" class="form-control" id="edit-estate"
                                        placeholder="Estado">
                                    <label for="estate">Estado</label>
                                    @error('estate') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-AmareloGema form-control text-CinzaMedio fw-bold">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteAddress" tabindex="-1" aria-labelledby="deleteAddressLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-outline-CinzaClaro fw-bold" data-bs-dismiss="modal">Não</button>
                <button type="button" wire:click="destroyAddress" class="btn btn-AmareloGema fw-bold text-CinzaMedio">Sim, Pode excluir!</button>
            </div>
        </div>
    </div>
</div>


</div>

@section('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $( '#showAddress' ).modal( 'hide' );
            $( '#deleteAddress' ).modal( 'hide' );
        });


    </script>
@endsection
