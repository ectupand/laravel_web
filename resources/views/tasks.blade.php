@extends('layout')

@section('content')
    <div class="col-4">
        <div class="">
            <h1>Список всего</h1>
            <h3>Юзеры</h3>
            <select name="user" id="user-select">
                @foreach($users as $user)
                    <option>{{ $user->name }}</option>
                @endforeach
            </select><br><br>
            <button id="editUser" class="btn btn-secondary">Редактировать юзера</button>
        </div>

        <div class="panel panel-primary" id="task_panel container">
            <div><h3>Таски</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group m-1">
                    @foreach($tasks as $task)
                        <div class="my-1">
                            <li class="list-group-item auto">

                                <strong>{{$task->created_at}}>>>{{$task->taskName}}</strong>
                                <a href="tasks/{{$task->id}}/edit" data-id="{{$task->id}}" style="font-size: .75em; color:grey;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
                                    </svg>
                                </a>
                                <p>{{$task->description}}</p>
                                @if($task->user_id)
                                    <i>{{ $task->user->name}}</i>
                                @endif
                                <p></p>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

        <button id="addTask" class="btn btn-secondary" >Добавить таск</button>

        <script type="text/javascript">
            document.getElementById("addTask").onclick = function () {
                location.href = "/tasks/add";
            };
            document.getElementById("editUser").onclick = function () {
                location.href = "/users/edit";
            };
        </script>

        <script>
            window.onload = function() {
                const dropdown = $('#user-select');
                dropdown.html(dropdown.find('option').sort(function (option1, option2) {
                    return $(option1).text() < $(option2).text() ? -1 : 1;
                }));
            }
        </script>
    </div>
@endsection
