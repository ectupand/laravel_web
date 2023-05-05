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
        <form method="post" action="{!! route('update', $task->id) !!}" >
            @csrf
            @method('PUT')
            <input value="{{ $task->taskName }}" type="text" name="taskName" id="taskName" placeholder="Коротко" class="form-control m-1">
            <textarea name="description" id="description" placeholder="Подробнее" class="form-control m-1">{{ $task->description }}</textarea>
            @if($task->status === 1)
                <input type="checkbox" id="status" name="status" checked>
            @else
                <input type="checkbox" id="status" name="status" >
            @endif
            <label for="status"> Актуально</label><br>
            <select value="{{ $task->user }}" name="user" id="user-select">
                @foreach($users as $user)
                    <option>{{ $user->name }}</option>
                @endforeach
            </select><br>
            <button type="submit" class="btn btn-secondary m-1">Сохранить</button>
        </form>
    </div>
@endsection
