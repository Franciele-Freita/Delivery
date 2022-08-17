
/* preview da imagem no cadastro da categoria */
function previewCategory(){
    var image = document.querySelector('#img_category').files[0];
    var preview = document.querySelector('#view_category')
    var reader = new FileReader();
        console.log(reader);
    var size = img_category.files[0].size;
    var tamanho = 20000000
    reader.onloadend = function(){
        preview.src =reader.result;
    }

    if(image){
        if(size <= tamanho) { //20MB
        reader.readAsDataURL(image);
    }else{
        alert('A imagem excede o limite de 20mb permitido'); //Acima do limite
        preview.src = "{{ asset('img/icones/icon-slide-loja/icon-photo.svg') }}";
    }
}}

/* fim preview da imagem no cadastro da categoria */


let photo = document.getElementById('view_category');
let file = document.getElementById('img_category');
var reader = new FileReader();

photo.addEventListener('click',() =>{
    file.click();
});

function previewEditCategory(id){
    const el = id;
    const dataId = el.getAttribute('data-id');
    var image = document.querySelector('#img_edit_category' + dataId).files[0];
    var preview = document.querySelector('#view_edit_category' + dataId)
    var reader = new FileReader();
    var size = image.size;
    var tamanho = 20000000
    reader.onloadend = function(){
        preview.src =reader.result;
    }
    if(image){
        if(size <= tamanho) { //20MB
        reader.readAsDataURL(image);
    }else{
        alert('A imagem excede o limite de 20mb permitido'); //Acima do limite
        preview.src = "{{ asset('img/icones/icon-slide-loja/icon-photo.svg') }}";
    }

}}

function clicar(id){
const el = id;
const dataId = el.getAttribute('data-id');
document.getElementById('img_edit_category' + dataId).click();
}


/* preview image logo banner loja */






/*  */
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

let photob = document.getElementById('visualizar_imagem');
let fileb = document.getElementById('image');
var readerb = new FileReader();

photob.addEventListener('click',() =>{
    fileb.click();
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
/*  */

