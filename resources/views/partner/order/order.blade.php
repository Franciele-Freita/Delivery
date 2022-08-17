@extends('layouts.painel-partner')

@section('conteudo')
<div class="container my-5 table-responsive">
    <table class="rounded-3">
        <thead class="">
        <tr>
            <th class="">Cod</th>
            <th style="width: 80px;" >Imagem</th>
            <th class="vw-100">Item</th>
            <th style="width: 600px;">Preço</th>
            <th style="width: 600px;">Custo</th>
            <th style="width: 500px;">Estoque</th>
            <th style="width: 500px;">Est. minimo</th>
            <th class="">Actions</th>

        </tr>
        </thead>
        <tbody>
            {{-- @foreach ( $clients as $client ) --}}
            <tr class="border-top">
            <th>1</th>
            <td style="width: 80px;"><img style="height: 70px; width: 70px; object-fit: cover; border-radius:50%;" src="{{ asset('img/admin/img-category-default.jpg') }}" alt=""></td>
            <td style="max-width: 300px;">Cera de polir</td>
            <td >R$ 45,00</td>
            <td >R$ 30,00</td>
            <td>5</td>
            <td>2</td>
            <td class="text-center">
                <div class="btn-group dropstart">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            </td>
        </tr>

        <tr class="border-top">
            <th>2</th>
            <td style="width: 80px;"><img style="height: 70px; width: 70px; object-fit: cover; border-radius:50%;" src="{{ asset('img/admin/img-category-default.jpg') }}" alt=""></td>
            <td style="max-width: 300px;">Paleta Bosch</td>
            <td >R$ 176,00</td>
            <td >R$ 150,00</td>
            <td>2</td>
            <td>2</td>
            <td class="text-center">
                <div class="btn-group dropstart">
                <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('img/icon/icon-admin/icon-menu-points.svg') }}" alt="">
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            </td>
        </tr>

            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
