@extends('layouts.painel-partner')

@section('conteudo')
<div class="container my-5 table-responsive border rounded-3 p-3">
    @if(isset($category))
        <h3 class="mb-5">Editar Categoria</h3>
        <form action="{{ route('category.update') }}" method="POST">
    @else
        <h3 class="mb-5">Cadastro de Categoria</h3>
        <form action="{{ route('category.register.store') }}" method="POST">
    @endif

        @csrf
        <div class="d-flex bd-highlight">
            <div class="flex-grow-1 bd-highlight mr-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" id="name" name="name"  value="@if(isset($category)) {{$category->name}} @else  @endif" placeholder="Nome da categoria">
                    <label for="name">Nome da categoria</label>
                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                </div>
            </div>
            <div class="form-floating">
                <select class="form-select" id="status" name="status"   aria-label="Floating label select example">
                  @if(isset($category))
                   @if($category->status == "Ativo")
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    @else
                        <option value="Inativo">Inativo</option>
                        <option value="Ativo">Ativo</option>
                     @endif
                     @else
                  <option value="Ativo">Ativo</option>
                  <option value="Inativo">Inativo</option>
                  @endif
                </select>
                <label for="status">Status</label>
              </div>
        </div>
        <div class="d-flex bd-highlight">

            <div class="flex-grow-1 bd-highlight">

                <div>
                    <input class="btn btn-Dark fw-bold text-white form-control" type="submit" value="Salvar">
                </div>
            </div>
        </div>
    </form>

</div>


<script>
    function previewImage(){
    var imagem = document.querySelector('#image').files[0];
    var preview = document.querySelector('#visualizar_imagem_product')
    var reader = new FileReader();
    var size = image.files[0].size;
    var tamanho = 20000000
    reader.onloadend = function(){
        preview.src =reader.result;
    }

    if(imagem){
        if(size <= tamanho) { //20MB
        reader.readAsDataURL(imagem);
    }else{
        alert('A imagem excede o limite de 20mb permitido'); //Acima do limite
        preview.src = "{{ asset('img/icones/icon-slide-loja/banner-default.svg') }}";
    }
}}

let photo = document.getElementById('visualizar_imagem_product');
let file = document.getElementById('image');
var reader = new FileReader();

photo.addEventListener('click',() =>{
    file.click();
});
</script>
@endsection
