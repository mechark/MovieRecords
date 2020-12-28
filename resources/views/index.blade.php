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
</head>
<body>
 @section('content')

     <main class="main">

         <h1 class="main__filter">
             Фильтр
         </h1>
         @foreach($film as $film)
         <div class="main__card">
             <a href="{{'movie/'. $film->url }}">
                 <div class="main__card-title">
                     <h2>{{ $film->name }}</h2>
                 </div>
             </a>
             <div class="main__card-content">
                 <a href="{{ 'movie/' . $film->url }}">
                     <div class="main__card-preview">
                         <img src="{{ $film->cover }}" alt="" style="max-width: 100%;height: auto;">
                     </div>
                 </a>

                 <div class="main__card-info">
                     <ul>
                        <li><strong>Жанры:</strong> {{ $film->genre }}</li>
                        <li>Год: {{ $film->year }}</li>
                        <li>Режиссер: {{ $film->director }}</li>
                        <li style="color:red;">IMDB: {{ $film->IMDB }}</li>
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
                {{ $film->description }}
             </p>

         </div>
         @endforeach


     </main>
 @endsection
</body>
</html>

