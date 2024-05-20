@extends('layout')

@section('content')
    <div>
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <h2>Cursos</h2>
            <a href="{{ route('courses.create') }}">Adicionar</a>
            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
        </div>
        
        <table class="table table-striped">
            <tr >
                <th>TITULO</th>
                <th>DESCRIÇÃO</th>
                <th>AÇÕES</th>
            </tr>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td class="d-flex flex-wrap align-items-center">
                        <a class="mr-2" href="{{ route('courses.show', $course->id) }}">Visualizar</a>
                        <a class="mr-2" href="{{ route('courses.edit', $course->id) }}">Editar</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
