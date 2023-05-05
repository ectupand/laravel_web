@extends('layout')

@section('content')
    <div class="col-3 m-a">

    <h1>Новый таск</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form method="post" action="/tasks/add/check">
            @csrf
            <input type="text" name="taskName" id="taskName" placeholder="Коротко" class="form-control m-1">
            <textarea name="description" id="description" placeholder="Подробнее" class="form-control m-1"></textarea>
            <input type="checkbox" id="status" name="status" value="1">
            <label for="status"> Актуально</label><br>
            <select name="user" id="user-select">
                @foreach($users as $user)
                    <option>{{ $user->name }}</option>
                @endforeach
            </select><br>
            <button type="submit" class="btn btn-secondary m-1">Добавить</button>
        </form>
    </div>
@endsection
