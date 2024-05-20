@extends('layout')

@section('content')
    <div class="container">
        <h2>Matriculas</h2>
        
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            
            <a href="{{ route('relatorios.index') }}">Relatorio</a>
            <a href="{{ route('matriculas.create') }}">Adicionar</a>
            
            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
        </div>
       

        <table class="table table-striped">
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
