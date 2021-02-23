<h1>Home Page</h1>

@auth
    Hello, {{ $user->name }}
@endauth

@guest
    <a href="{{ route('admin.index') }}"><i class="fa fa-user"></i>
        Login
    </a>
@endguest
<br>
<a href="{{ route('admin.index') }}">Quản trị</a>