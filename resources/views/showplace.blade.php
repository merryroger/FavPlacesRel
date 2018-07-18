@extends('favlist')

@section('listhdr')
    @include('placeheader')
    <div class="listpad">
        @foreach($listset->all() as $item)
            <div class="photoframe"
                 style="background: #ffffff url('{{ $item->location }}') no-repeat top left; background-size: 100% auto; height: {{ round(800*$item->height/$item->width) }}px;">
                <div class="photodata">{{ $item->created_at->format('d.m.Y H:i:s') }}</div>
            </div>
        @endforeach
    </div>
@endsection

@section('emptyhdr')
    <div class="listpad">Нет фотографий</div>
    @include('placeheader')
@endsection