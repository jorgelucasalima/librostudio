@extends('layout')

@section('content')
    <div>
        <h2>Alunos</h2>
        <a href="{{ route('students.create') }}">Adicionar</a>

         {{-- Formulário de pesquisa por nome --}}
        <form action="{{ route('students.index') }}" method="GET">
            <input type="text" name="name" placeholder="Pesquisar" value="{{ request()->input('name') }}">
            <button type="submit">Pesquisar</button>
        </form>
        

        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif
        <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Genero</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>

            @if (!$students->isEmpty())

            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->birthdate }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}">Visualizar</a>
                        <a href="{{ route('students.edit', $student->id) }}">Editar</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @else
                <tr>
                    <td colspan="5">Nenhum aluno encontrado.</td>
                </tr>
            @endif
        </table>
    </div>
@endsection
