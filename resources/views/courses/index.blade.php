@extends('layout')

@section('content')
    <div>
        <h2>Cursos</h2>
        <a href="{{ route('courses.create') }}">Adicionar</a>
        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif
        <table>
            <tr>
                <th>TITULO</th>
                <th>DESCRIÇÃO</th>
                <th>AÇÕES</th>
            </tr>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course->id) }}">Visualizar</a>
                        <a href="{{ route('courses.edit', $course->id) }}">Editar</a>
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
