<header>
    <div class="title">{{ $placename }}</div>
    <nav>
        @include('menu', ['place' => $placename, 'cr' => \Illuminate\Support\Facades\Route::currentRouteName()])
    </nav>
    <br clear="all"/>
</header>
