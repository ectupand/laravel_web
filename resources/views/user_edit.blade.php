@extends('layout')

@section('content')
    <div class="col-3 m-a">

        <h1>Едит юзер</h1>

        <form method="post" action="/users/edit/check">
            @csrf
            <select name="user" id="user-select" onChange="copyTextValue(this);">
                @foreach($users as $user)
                    <option data-id="{{$user->id}}">{{ $user->name }}</option>
                @endforeach
            </select>
            <input type="text" name="name" id="name" placeholder="Имя" class="form-control m-1">
            <input type="number" name="age" id="age" placeholder="Возраст" class="form-control m-1">
            <input type="email" name="email" id="email" placeholder="Email" class="form-control m-1">
            <input type="hidden" name="id" id="id">
            <br>
            <button type="submit" class="btn btn-secondary m-1">Сохранить</button>
        </form>
    </div>
    <script>
        function copyTextValue(event) {
            let userSelect = document.getElementById("user-select")

            $(function() {
                let userId = userSelect.options[ userSelect.selectedIndex ].dataset.id
                $.ajax({
                    type: 'GET',
                    url: '/api/users/'+userId,
                    dataType: 'json',
                    complete: function(data){
                        document.getElementById("name").value = data.responseJSON.data.name
                        document.getElementById("age").value = data.responseJSON.data.age
                        document.getElementById("email").value = data.responseJSON.data.email
                        document.getElementById("id").value = data.responseJSON.data.id
                    }
                })
            })
        }

    </script>
@endsection
