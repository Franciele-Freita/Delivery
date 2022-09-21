<div>
    <form wire:submit.prevent="save">
        <div class="form-floating mb-3">
            <input type="text" wire:model="title" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Titulo</label>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="form-floating mb-3">
            <textarea wire:model="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px"></textarea>
            <label for="floatingTextarea">Conteúdo</label>
            <div  class="d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="d-flex justify-content-end">
                        {{strlen($content)}}/400
                </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" wire:model="user_type" id="floatingSelectGrid" aria-label="Floating label select example">
              <option selected>Selecione...</option>
              <option value="1">User</option>
              <option value="2">Partner</option>
            </select>
            <label for="floatingSelectGrid">Tipo de usuário</label>
            @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <button type="submit" class="btn btn-dark">Salvar</button>
    </form>

</div>
