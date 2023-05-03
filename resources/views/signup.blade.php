@extends('layout')

@section('content')
    <div class="col-4 m-a">

    <h1>Форма регистрации</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="post" action="/signup/check">
            @csrf
            <input type="text" name="name" id="name" placeholder="Имя" class="form-control m-1">
            <input type="number" name="age" id="age" placeholder="Возраст" class="form-control m-1">
            <input type="email" name="email" id="email" placeholder="Email" class="form-control m-1">
            <input type="password" name="password" id="password" placeholder="Пароль" class="form-control m-1">
            <button type="submit" class="btn btn-secondary m-1">Зарегистрироваться</button>
        </form>
    </div>
@endsection
