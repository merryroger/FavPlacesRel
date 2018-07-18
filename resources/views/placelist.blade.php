@extends('favlist')

@section('listhdr')
    @include('listheader')
    <div class="listpad">
        @foreach($listset as $place)
            <div class="fpholder">
                <div class="pldata"
                     onclick="document.location.href='{{ route('show.place', [urlencode($place->name)]) }}'; return false;">
                    <div class="placename">{{ $place->name }}</div>
                    <div class="placetype">{{ $types[$place->placetype_id] }}</div>
                </div>
                <div class="pladdphoto" title="Добавить фотографию"
                     onclick="document.location.href='{{ route('request.add_photo', [urlencode($place->name)]) }}'; return false;"></div>
                <br clear="all"/>
            </div>
        @endforeach
    </div>
@endsection

@section('emptyhdr')
    <div class="listpad">Мест нет</div>
    @include('listheader')
@endsection