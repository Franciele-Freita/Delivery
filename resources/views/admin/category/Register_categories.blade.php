

<div class="">
    <h3 class="text-center">Cadastro de categorias</h3>
    <div class="d-flex justify-content-center">
        <div class="col-6 my-5 ">
            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="mb-2 fw-bold text-CinzaMedio" for="">Imagem</label>
                <div class=" mb-3 d-flex flex-column align-items-center border rounded-3 p-3 bg-white">

                    <img class="p-1  rounded-circle view_category @if ($errors->has('img_category')) is-invalid border border-danger @else border @endif" id="view_category"
                        src="{{ asset('img/admin/img-category-default.jpg') }}" alt="">
                    <input class="d-none" type="file" name="img_category" id="img_category" value="{{old('img_category')}}" onchange="previewCategory()"
                        accept=".JPEG, .JPG, .PNG, .HEIC">
                        <div id="invalidCheck3Feedback" class="invalid-feedback text-center">
                            {{$errors->first('img_category')}}
                        </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @if ($errors->has('name_category')) is-invalid @endif" id="name_category" name="name_category" placeholder="name@example.com" value="{{old('name_category')}}">
                    <label for="name_category">Nome da categoria</label>
                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                        {{$errors->first('name_category')}}
                    </div>
                </div>
                <input class="btn btn-dark form-control text-white mt-3" type="submit" value="Salvar">
            </form>
        </div>
    </div>
</div>


