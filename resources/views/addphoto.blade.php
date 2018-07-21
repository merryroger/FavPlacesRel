@extends('appender')

@section('title', 'Загрузка новой фотографии')

@section('hdr')
    @if(isset($place))
        @include('formheader', ['text' => 'Новая фотка', 'place' => $place->name])
    @elseif(!isset($place))
        @include('formheader', ['text' => 'Новая фотка'])
    @endif
@endsection

@section('form')
    <form action="{{ route('add_photo') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if(!$errors->any())
            <input type="hidden" id="referer" name="referer" value="{{ $referer }}">
        @elseif($errors->any())
            <input type="hidden" id="referer" name="referer" value="{{ old('referer') }}">
        @endif
        <input type="file" name="image" class="ff" tabindex="1" required autofocus/><br/>
        @if(isset($place))
            <input type="hidden" name="place_id" value="{{ $place->id }}">
        @elseif(!isset($place))
            <select name="place_id" size="1" class="ff" tabindex="2">
                @foreach($places as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        @endif
        <div class="fmctrls">
            <button type="button" class="cancel" tabindex="3"
                    onclick="document.location.href=document.querySelector('#referer').value; return false;">Отменить
            </button>
            <button type="submit" class="do" tabindex="4">Загрузить</button>
        </div>
    </form>
@endsection
