<h1>Home Page</h1>

@auth
    Hello, {{ Auth::user()->name }}
@endauth

@guest
    <a href="{{ route('admin.index') }}"><i class="fa fa-user"></i>
        Login
    </a>

@endguest
<a href="{{ route('logout') }}">logout</a>
<br>
<a href="{{ route('admin.index') }}">Quản trị</a>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

{{-- {{ !! $name !! }} --}}

@foreach ($articles as $article)
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->content }}</p>
@endforeach

