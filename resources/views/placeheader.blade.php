<header>
    <div class="title">{{ $placename }}</div>
    <nav>
        @include('menu', ['place' => $placeid, 'cr' => Route::currentRouteName()])
    </nav>
    <br clear="all"/>
</header>
