<header>
    @if(isset($place))
        <div class="title">{{ $text }}<p>{{ $place }}</p></div>
    @elseif(!isset($place))
        <div class="title">{{ $text }}</div>
    @endif
    <nav>#menu#</nav>
    <br clear="all"/>
</header>

