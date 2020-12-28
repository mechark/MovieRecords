@extends('header')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $url[0]->name }}</title>
    <link rel="stylesheet" href="{{ url('css/info.css') }}">
    <link rel="stylesheet" href="{{ url('css/plyr.css') }}">
</head>
<body>
@section('content')

    <div class="main__card">
            <div class="main__card-title">
                <h2>{{ $url[0]->name }}</h2>
            </div>
        <div class="main__card-content">

                <div class="main__card-preview">
                    <img src="{{ $url[0]->cover }}" alt="" style="max-width: 100%;height: auto;">
                </div>


            <div class="main__card-info">
                <ul>
                    <li>Жанры: {{ $url[0]->genre }}</li>
                    <li>Год: {{ $url[0]->year }}</li>
                    <li>Режиссер: {{ $url[0]->director }}</li>
                    <li>IMDB: {{ $url[0]->IMDB }}</li>
                    <li>Кинопоиск: {{ $url[0]->Kinopoisk }}</li>
                    @if ($url[0]->budget !== " ")
                    <li>Бюджет: {{ $url[0]->budget }}$</li>
                    <li>Сборы: {{ $url[0]->fees }}$</li>
                    @endif
                    <li>В ролях: {{ $url[0]->actors }}</li>
                </ul>
            </div>
        </div>
        <p class="main__card-description">
            {{ $url[0]->description }}
        </p>

        <div class="movie-player">

            <video id="player" controls>

                <source src="https://cdn1.kinogo.la/movies/66b4793b21360f53443c6ad6657b044acac5702a/2efabc42124cd091aa2e7e886c359ee1:2020113015/720.mp4" type="video/mp4">

            </video>

            </div>
        </div>

        <script src="{{ url('js/index.js') }}"></script>
        <script src="{{ url('js/plyr.js') }}"></script>
        <script>
            const player = new Plyr('#player');
        </script>

@endsection

</body>
</html>
