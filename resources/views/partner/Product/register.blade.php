@extends('layouts.painel-partner')

@section('conteudo')
<div class="container my-5 table-responsive border rounded-3 p-3">
    <h3 class="mb-5">Cadastro de produto</h3>

    <form action="{{ route('product.register.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex bd-highlight">
            <div class="bd-highlight mr-3">
                <div class=" rounded-3 mb-3 border d-flex justify-content-center align-items-center bg-white p-3" style="width: 100%; height: 100%;">
                    <img style="width: 300px; height: 250px; object-fit: cover;" id="visualizar_imagem_product" class="rounded-3 p-1 border" src="{{ asset('img/partner/image-store-partner/img-default.png') }}" alt="">
                     <input class="d-none" type="file" name="image" id="image" onchange="previewImage()"
                        accept=".JPEG, .JPG, .PNG, .HEIC">
                </div>
            </div>
            <div class="flex-grow-1 bd-highlight ">
                <div class="d-flex bd-highlight mb-3">

                    <div class="flex-grow-1 bd-highlight">
                        <div class="form-floating">
                            <select class="form-select" id="category" name="category" aria-label="Floating label select example">
                              <option selected>Selecione uma categoria</option>
                              @foreach ($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                              @endforeach
                            </select>
                            <label for="category">Categoria</label>
                          </div>
                    </div>
                </div>


                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
                    <label for="id">Produto</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Uma breve descrição" id="description" name="description" style="height: 80px"></textarea>
                    <label for="description">Descrição</label>
                  </div>
                <div class="d-flex bd-highlight align-items-center mb-3">
                    <div class="flex-fill bd-highlight mr-3">
                        <div class="form-floating ">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Preço do produto">
                            <label for="price">Preço</label>
                        </div>
                    </div>
                    <div class="flex-fill bd-highlight mr-3">
                        <div class="form-floating ">
                            <input type="text" class="form-control" id="discount" name="discount" placeholder="Desconto para ser aplicado no produto">
                            <label for="discount">Desconto</label>
                        </div>
                    </div>
                    <div class="flex-fill bd-highlight d-flex flex-column">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="ativo" value="Ativo" checked>
                            <label class="form-check-label" for="ativo">Ativo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inativo" value="Inativo">
                            <label class="form-check-label" for="inativo">Inativo</label>
                        </div>
                    </div>
                </div>
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
