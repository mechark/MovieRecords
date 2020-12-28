
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/header.css') }}">
</head>
{{--<body class="header">--}}
<nav class="nav">


    @if (\Illuminate\Support\Facades\Auth::check())
        <a class="nav__profile" href={{ '/profile' }}></a>
    @else
        <a class="nav__profile" href="/login"></a>
    @endif
        <div class="nav__logo">
            <a href="/">MovieRecords</a>
        </div>

        <div class="nav__menu" onclick="menu()">
            <span class="nav__menu line1"></span>
            <span class="nav__menu line2"></span>
        </div>
        <div class="nav__list">
            <form action="">
                @csrf
                <input type="search" placeholder="Поиск..." class="search">
            </form>
            <span class="nav__list-span"></span>
            <ul>

                <li><a href="">Избранное</a></li>
                <li><a href="">Рекомендации</a></li>
                <li><a href="">Выход</a></li>
            </ul>
        </div>
    </nav>
    <script src="js/index.js"></script>
    @yield('content')

{{--</body>--}}

