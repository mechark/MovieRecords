@extends('header')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/auth.css">
    <title>Регистрация</title>
</head>
<body>
@section('content')

    <div class="content">
        <form method="POST" action="{{ route('register') }}">
            <main class="main">
                <h1 class="main__title">Создание вашего аккаунта</h1>
                <div class="form">
                    @csrf
                    <label for="email">Email <span>*</span></label> <br>
                    <input type="email" id="email" name="email"> <br>
                    @error('email')
                    <p style="color:red;"> {{ $message }} </p>
                    @enderror
                    <label for="name">Имя пользователя <span>*</span></label><br>
                    <input type="text" id="name" name="name"><br>
                    @error('name')
                    <p style="color:red;"> {{ $message }} </p>
                    @enderror
                    <label for="password">Пароль <span>*</span></label><br>
                    <input type="password" id="password" name="password">
                    @error('password')
                    <p style="color:red;"> {{ $message }} </p>
                    @enderror
                    <label for="password_confirmation">Подтвердите пароль <span>*</span></label><br>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                    <p style="color:red;"> {{ $message }} </p>
                    @enderror
                    <p class="main__feature">Пароль должен содержать не менее 8 символов</p>
                    <button class="main__btn" type="submit">
                        <span>Зарегистрироваться</span>
                    </button>
                </div>
            </main>
        </form>
    </div>

@endsection
</body>
</html>
