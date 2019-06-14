@extends("layout.main")
@section("content")
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                文章列表页
            </div>

            <div class="links">
                @foreach($articleList as $articleList)
                    <a href="https://laravel.com/docs">{{ $articleList['title'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
