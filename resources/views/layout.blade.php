<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="{{ asset('src/js/app.js' )}}"></script>
</head>
<body class="bg-dark bg-opacity-10">

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom border-dark">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            <span class="fs-4">Таскики</span>
        </a>

        <ul class="nav nav-tabs">
            <li class="nav-item"><a href="/tasks" class="nav-link text-secondary {{ Request::path() ==  'tasks' ? 'active' : ''}}">Все таски</a></li>
            <li class="nav-item"><a href="/signup" class="nav-link text-secondary {{ Request::path() ==  'signup' ? 'active' : ''}}">Добавить юзера</a></li>
            <li class="nav-item"><a href="/tasks/add" class="nav-link text-secondary {{ Request::path() ==  'tasks/add' ? 'active' : ''}}" aria-current="page">Добавить таск</a></li>
        </ul>
    </header>
</div>

<div class="container row justify-content-center">
    @yield('content')
</div>


</body>
</html>
