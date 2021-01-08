{{--@extends('header')--}}

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ url('css/profile.css') }}">
</head>
<body>

{{--    @section('content')--}}
@if (\Illuminate\Support\Facades\Auth::check())
    <h1 style="color: #383838">Hello, {{ $name }}</h1>
@endif

{{--    @endsection--}}
</body>
</html>
