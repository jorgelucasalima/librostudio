<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Libro Studio</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CDN link para os estilos do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <h1>Libro Studio</h1>
    </header>
    <main>
      <div>
        <a href="{{ route('courses.index') }}">Cursos</a>
        <a href="{{ route('students.index') }}">Alunos</a>
        <a href="{{ route('matriculas.index') }}">Matriculas</a>
      </div>
      @yield('content')
    </main>
</body>
</html>
