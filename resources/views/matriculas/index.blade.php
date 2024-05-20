@extends('layout')

@section('content')
    <div>
        <h2>Matriculas</h2>
        <a href="{{ route('matriculas.create') }}">Adicionar</a>
        <a href="{{ route('relatorios.index') }}">Relatorio</a>
        
        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif
        <table>
            <tr>
                <th>Alunos</th>
                <th>Curso</th>
                <th>Ações</th>
            </tr>
            @foreach ($matriculas as $matricula)
                <tr>
                    <td>{{ $matricula->student->name }}</td>
                    <td>{{ $matricula->course->title }}</td>
                    <td>
                        <a href="{{ route('matriculas.show', $matricula->id) }}">Visualizar</a>
                        <a href="{{ route('matriculas.edit', $matricula->id) }}">Editar</a>
                        <form action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
