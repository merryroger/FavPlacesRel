@extends('favlist')

@section('listhdr')
    @include('placeheader', ['placename' => 'Мои любимые места'])
    <div class="listpad">
        @foreach($listset as $place)
            <div class="fpholder">
                <div class="pldata"
                     onclick="document.location.href='{{ route('place.show', [urlencode($place->name)]) }}'; return false;">
                    <div class="placename">{{ $place->name }}</div>
                    <div class="placetype">{{ $types[$place->placetype_id] }}</div>
                </div>
                <div class="pladdphoto" title="Добавить фотографию"
                     onclick="document.location.href='{{ route('photo.get_linked_form', [urlencode($place->name)]) }}'; return false;"></div>
                <br clear="all"/>
            </div>
        @endforeach
    </div>
@endsection

@section('emptyhdr')
    <div class="listpad">Мест нет</div>
    @include('placeheader', ['placename' => 'Мои любимые места'])
@endsection