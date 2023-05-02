@extends('layout')

@section('content')
    <h1>Список задач и пользователей</h1>
    <h3>Юзеры</h3>
    <select name="user" id="user-select">
        @foreach($users as $user)
            <option>{{ $user->name }}</option>
        @endforeach
    </select>

    <div class="panel panel-primary col-3" id="task_panel">
        <div><h3>Таски</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group m-1">
                @foreach($tasks as $task)
                <li class="list-group-item auto">
                    <strong>{{$task->taskName}}</strong>
                    <p>{{$task->description}}</p>
                    <p>{{$task->created_at}}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>



    <script>


        window.onload = function() {
            const dropdown = $('#user-select');
            dropdown.html(dropdown.find('option').sort(function (option1, option2) {
                return $(option1).text() < $(option2).text() ? -1 : 1;
            }));
        }
    </script>
@endsection
