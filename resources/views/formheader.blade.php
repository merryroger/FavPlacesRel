<header>
    @if(isset($place))
        <div class="title">{{ $text }}<p>{{ $place }}</p></div>
        <nav>
            @include('menu', ['cr' => $cr, 'place' => $place])
        </nav>
    @else
        <div class="title">{{ $text }}</div>
        <nav>
            @include('menu', ['cr' => $cr])
        </nav>
    @endif
    <br clear="all"/>
</header>

