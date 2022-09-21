<div>

    <h5>Cadastro</h5>
    <form wire:ignore.self wire:submit.prevent="updateData">
        <b class="text-CinzaClaro">Dados da conta</b> <br>

        <div class="p-3 border rounded mb-3">
            <div class="form-floating mb-3">
                <input type="email" wire:model="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">E-mail</label>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" readonly wire:model="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <b class="text-CinzaClaro">Dados pessoais</b>
        <div class="p-3 border rounded mb-3">
            <div class="form-floating mb-3">
                <input type="text" wire:model="name" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Nome Completo</label>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="birth_date" class="birth_date form-control" id="birth_date" placeholder="Password">
                        <label for="birth_date">Data de nascimento</label>
                        @error('birth_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="cpf" class="cpf form-control" id="cpf" placeholder="Password">
                        <label for="cpf">CPF</label>
                        @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="celphone" class="form-control celphone" id="celphone" placeholder="Password">
                        <label for="celphone">Celular</label>
                        @error('celphone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="telphone" class="form-control telphone" id="telphone" placeholder="Password">
                        <label for="telphone">Telefone</label>
                        @error('telphone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-check mr-3">
                    <input class="form-check-input" wire:model="genre" value="F" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Feminino
                    </label>
                </div>
                <div class="form-check mr-3">
                    <input class="form-check-input" wire:model="genre" value="M" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Masculino
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" wire:model="genre" value="N" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Não informar
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-AzulPiscina fw-bold text-CinzaMedio">Atualizar cadastro</button>
    </form>

        <a  wire:click="showDetails" data-bs-toggle="modal"
            data-bs-target="#deleteAddress">Editar dados</a> <br>


        <div wire:ignore.self class="modal fade" id="deleteAddress" tabindex="-1" aria-labelledby="deleteAddressLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteAddressLabel">Excluir endereço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:ignore.self wire:submit.prevent="updateData">
                            <b class="text-CinzaClaro">Dados da conta</b> <br>

                            <div class="p-3 border rounded mb-3">
                                <div class="form-floating mb-3">
                                    <input type="email" readonly wire:model="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">E-mail</label>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" readonly wire:model="password" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Senha</label>
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <b class="text-CinzaClaro">Dados pessoais</b>
                            <div class="p-3 border rounded mb-3">
                                <div class="form-floating mb-3">
                                    <input type="text" wire:model="name" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Nome Completo</label>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" wire:model="birth_date" class="birth_date form-control" id="birth_date" placeholder="Password">
                                            <label for="birth_date">Data de nascimento</label>
                                            @error('birth_date') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" wire:model="cpf" class="cpf form-control" id="cpf" placeholder="Password">
                                            <label for="cpf">CPF</label>
                                            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" wire:model="celphone" class="form-control celphone" id="celphone" placeholder="Password">
                                            <label for="celphone">Celular</label>
                                            @error('celphone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" wire:model="telphone" class="form-control telphone" id="telphone" placeholder="Password">
                                            <label for="telphone">Telefone</label>
                                            @error('telphone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" wire:model="genre" value="F" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Feminino
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" wire:model="genre" value="M" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Masculino
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" wire:model="genre" value="N" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Não informar
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-AzulPiscina fw-bold text-CinzaMedio">Atualizar cadastro</button>
                        </form>

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
