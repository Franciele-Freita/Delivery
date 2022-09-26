<x-app-layout>

{{--@foreach ($cities as $city)
 {!! $city->name!!} - {!! $city->Estate->name!!} - {!! $city->Estate->uf!!} <br>
@endforeach--}}
<button onclick="tocar()">Tocar</button>
<audio id="notificacao" preload="auto">
    <source src="http://soundbible.com/grab.php?id=1967&type=mp3" type="audio/mpeg">
  </audio>
<script>
    function tocar(){
        $('#notificacao').trigger('play');
        document.getElementById('notificacao').play();
    }
</script>
</x-app-layout>
