@extends('header')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/auth.css">
    <title>Вход</title>
</head>
<body>
@section('content')

    <div class="content">
        <form method="POST" action="{{ route('login') }}">
            <main class="main">
                <h1 class="main__title">Вход</h1>
                <div class="form">
                    @csrf
                    <label for="email">Email <span>*</span></label> <br>
                    <input type="email" id="email" name="email"> <br>
                    @error('email')
                    <p style="color:red;"> {{ $message }} </p>
                    @enderror
                    <label for="password">Пароль <span>*</span></label><br>
                    <input type="password" id="password" name="password">
                    @error('password')
                    <p style="color:red;"> {{ $message }} </p>
                    @enderror
                    <button class="main__btn" type="submit">
                        <span>Войти</span>
                    </button>
                </div>
            </main>
        </form>
    </div>

@endsection
</body>

</html>
