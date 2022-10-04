<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" href="{{ asset('slick/slick-theme.css') }}"/>
    @livewireStyles
    <title>AQTEM Delivery</title>

</head>
<body class="bg-Background d-flex flex-column min-vh-100">

    @livewire('includes.header-component')

    <main>
        @yield('content')
    </main>
    <main class="container p-3">
        @if(isset($slot))
        {{$slot}}
        @endif
        @yield('conteudo')

    </main>
    <footer class="bg-BegeMate shadow-sm border-top pt-lg-4 mt-auto">

        @livewire('includes.footer-component')
    </footer>
    @livewire('includes.svg-component')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

    @livewireScripts

    @yield('scripts')
    <script>

        $(document).ready(function(){
            $('#cep').mask('00000000');
            $('#teste').mask('00000000');
            $('#edit-cep').mask('00000000');
            $('#cpf').mask('000.000.###-##');
            /* $('#birth_date').mask('00/00/0000'); */
            $('#telphone').mask('(00) 0000-0009');
            $('#celphone').mask('(00) 0000-00009');
            $('#celphone').blur(function(event){
                if($(this).val().length > 14){
                    $('#celphone').mask('(00) 00000-0009');
                }else{
                    $('#celphone').mask('(00) 0000-00009');
                }
            });
        });
        window.addEventListener('close-modal', event => {
            $( '#newAddress' ).modal( 'hide' );
            $( '#showAddress' ).modal( 'hide' );
            $( '#deleteAddress' ).modal( 'hide' );
        });

    function tocar(){
        $("#som").html("<embed loop='false' src="{{asset('126198157.mp3')}}" hidden='true'  autoplay='true'>");
            console.log("aqui");
    }

    </script>
</body>
</html>
