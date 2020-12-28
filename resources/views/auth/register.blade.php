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
    <form action="{{ route('register') }}">
    <main class="main">
        <h1 class="main__title">Создание вашего аккаунта</h1>
    <div class="form">
        @csrf
        <label for="email">Email <span>*</span></label> <br>
        <input type="email" name="email"> <br>
        <label for="text">Имя пользователя <span>*</span></label><br>
        <input type="text" name="name"><br>
        <label for="password" >Пароль <span>*</span></label><br>
        <input type="password" name="password">
        <label for="password" >Подтвердите пароль <span>*</span></label><br>
        <input type="password" name="confirm">
        <p class="main__feature">Пароль должен содержать не менее 8 символов</p>
        <button class="main__btn" formaction=" {{ __('register') }}">
            <span>Зарегистрироваться</span>
        </button>
    </div>
</main>
</form>
    </div>

@endsection
</body>
</html>
