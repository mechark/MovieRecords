@extends('header')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieRecords</title>
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
@section('content')
    @if ($retrievaled == ' ')
        <h1 style="color: #fff"> Увы! Такого не нашлось</h1>
    @else
    <main class="main">

        <h1 class="main__filter">
            Фильтр
        </h1>
        @foreach($retrievaled as $retrievaled)
        <div class="main__card">
            <a href="{{'movie/'. $retrievaled->url }}">
                <div class="main__card-title">
                    <h2>{{ $retrievaled->name }}</h2>
                </div>
            </a>
            <div class="main__card-content">
                <a href="{{ 'movie/' . $retrievaled->url }}">
                    <div class="main__card-preview">
                        <img src="{{ $retrievaled->cover }}" alt="" style="max-width: 100%;height: auto;">
                    </div>
                </a>

                <div class="main__card-info">
                    <ul>
                        <li><strong>Жанры:</strong> {{ $retrievaled->genre }}</li>
                        <li>Год: {{ $retrievaled->year }}</li>
                        <li>Режиссер: {{ $retrievaled->director }}</li>
                        <li style="color:red;">IMDB: {{ $retrievaled->IMDB }}</li>
                        {{--                         <li>Кинопоиск: {{ $film->Kinopoisk }}</li>--}}
                        {{--                        <li>Бюджет: {{ $film->budget }}$</li>--}}
                        {{--                        <li>Сборы: {{ $film->fees }}$</li>--}}
                        {{--                         <li>В ролях: {{ $film->actors }}</li>--}}
                    </ul>
                </div>
            </div>
            <h2 class="main__card-plot">
                Сюжет
            </h2>
            <p class="main__card-description">
                {{ $retrievaled->description }}
            </p>
        </div>

    </main>
        @endforeach
    @endif

@endsection

</body>
</html>
