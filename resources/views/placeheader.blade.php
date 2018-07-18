<header>
    <div class="title">{{ $place->name }}</div>
    <div class="addplacectl" onclick="document.location.href='{{ route('request.add_photo', [urlencode($place->name)]) }}'; return false;">
        <div class="plus"><a href="{{ route('request.add_photo', [urlencode($place->name)]) }}" class="latent">+</a></div>
        <div class="plabel"><span><a href="{{ route('request.add_photo', [urlencode($place->name)]) }}" class="latent">Добавить фотографию</a></span></div>
    </div>
    <div class="comeback" onclick="document.location.href='{{ route('show.place_list') }}'; return false;">
        <div class="plabel"><a href="{{ route('show.place_list') }}" class="latent">Назад</a></div>
    </div>
    <br clear="all"/>
</header>

