<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Билды для игр') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>

    <!-- CSS и JavaScript -->
</head>

<body>
<div class="container">
    <nav class="navbar navbar-default">
        <!-- Содержимое Navbar -->
        <div class="flex-center position-ref full-height">
            <a href="{{ url('/listBuild') }}">Список билдов</a>
            <a href="{{ url('/') }}">На главную</a>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/createBuild') }}">Создать билд</a>
                        <a href="{{ url('/profile?id=') }}{{ Auth::user()->id }}">Профиль</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Выйти</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>
</div>

@yield('content')
</body>
</html>
