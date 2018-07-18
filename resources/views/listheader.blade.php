<header>
    <div class="title">Мои любимые места</div>
    <div class="addplacectl" onclick="document.location.href='{{ route('request.add_place') }}'; return false;">
        <div class="plus"><a href="{{ route('request.add_place') }}" class="latent">+</a></div>
        <div class="plabel"><span><a href="{{ route('request.add_place') }}" class="latent">Добавить новое место</a></span></div>
    </div>
    <br clear="all"/>
</header>

