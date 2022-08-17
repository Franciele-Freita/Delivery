@extends('layouts.painel-partner')

@section('conteudo')

{{-- Title --}}


<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container mb-5  d-flex justify-content-center my-3">
        <div class="col-8">
            {{-- Banner loja --}}

            <div class=" rounded-3 mb-3 ">
                <img style="width: 100%; height: 275px; object-fit: cover;" id="visualizar_imagem" class="rounded-3 p-1 border" src="{{ asset('img/partner/image-store-partner/img-default.png') }}" alt=""
                >
                 <input class="d-none" type="file" name="image" id="image" onchange="previewImage()"
                    accept=".JPEG, .JPG, .PNG, .HEIC">


            </div>


            {{-- logo da loja --}}
            <div class="d-flex flex-row justify-content-start align-items-center">
                <div class="d-flex justify-content-center mb-3">
                    <img style="width: 150px; height: 150px; object-fit: cover;" class="p-1 border rounded-circle" id="visualizar_imagem_logo"
                        src="{{ asset("img/partner/image-store-partner/img-default.png") }}" alt="">

                    <input class="d-none" type="file" name="image_logo" id="image_logo" onchange="previewImageLogo()"
                        accept=".JPEG, .JPG, .PNG, .HEIC">

                </div>
                {{-- Nome da loja --}}
                <h3 class="mx-3">{{$data->fantasy_name}}</h3>
            </div>

            {{-- Telefone da loja --}}
            <div class="mb-3">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        placeholder="Esta é a chave da loja" value="{{$data->telephone}}">
                    <label for="telephone">Telefone da loja</label>
                </div>
            </div>
            {{-- chave da loja --}}
            <div class="form-floating input-group mb-3">
                <input type="text" class="form-control" readonly id="text_chave_loja"
                    placeholder="Code 1" value="">
                <label for="text_chave_loja">Chave da loja</label>
                <span onclick="copiarTexto()" class="input-group-text cursor-pointer"><img style="height:30px;"
                        src="{{ asset('img/icones/icon-slide-loja/icon-copiar.svg') }}" alt="">
                </span>
            </div>

            {{-- Pedido mínimo --}}
            <div class="mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="text_pedido_min" value="" name="text_pedido_min"
                        placeholder="Esta é a chave da loja">
                    <label for="text_pedido_min">Pedido mínimo</label>
                </div>
                <p>Valor mínimo para um pedido, sem a taxa de entrega.</p>
            </div>
            {{-- Descrição para clientesa --}}
            <div class="form-floating mb-3">
                <textarea class="form-control" id="text_desc_loja" name="text_desc_loja"
                    placeholder="Leave a comment here" style="height: 100px"></textarea>
                <label for="text_desc_loja">Descrição para clientes</label>
            </div>
            <input class="btn btn-Dark fw-bold text-white form-control mb-5" type="submit" value="Salvar Alterações">
        </div>
    </div>
</form>

<style>


    #visualizar_imagem:hover,
    #visualizar_imagem_logo:hover {
        cursor: pointer;
        background-color: #59becb5e;
        transition: .3s;
    }
</style>


<script type="text/javascript">
    /* $("#flexSwitchCheckChecked1").change(function() {
if ($(this).prop("checked") == true) {
    console.log('marcado');
}else{
    console.log('desmarcado');
}
});

$("#flexSwitchCheckChecked1").trigger("change");
*/

function copiarTexto() {
        let textoCopiado = document.getElementById("text_chave_loja");
        textoCopiado.select();
        textoCopiado.setSelectionRange(0, 99999)
        document.execCommand("copy");
    }
function previewImage(){
    var imagem = document.querySelector('#image').files[0];
    var preview = document.querySelector('#visualizar_imagem')
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

let photo = document.getElementById('visualizar_imagem');
let file = document.getElementById('image');
var reader = new FileReader();

photo.addEventListener('click',() =>{
    file.click();
});

function previewImageLogo(){
    var imagem_logo = document.querySelector('#image_logo').files[0];
    var preview_logo = document.querySelector('#visualizar_imagem_logo')
    var reader_logo = new FileReader();
    var size = image_logo.files[0].size;
    var tamanho = 20000000
    reader_logo.onloadend = function(){
        preview_logo.src =reader_logo.result;
    }

    if(imagem_logo){
        if(size <= tamanho) { //20MB
        reader_logo.readAsDataURL(imagem_logo);
    }else{
        alert('A imagem excede o limite de 20mb permitido'); //Acima do limite
        preview_logo.src = "{{ asset('img/icones/icon-slide-loja/logo-default.svg') }}";
    }
}}

let photo_logo = document.getElementById('visualizar_imagem_logo');
let file_logo = document.getElementById('image_logo');
var reader_logo = new FileReader();

photo_logo.addEventListener('click',() =>{
    file_logo.click();
});




</script>







@endsection
