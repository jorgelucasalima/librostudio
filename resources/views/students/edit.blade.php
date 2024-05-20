@extends('layout')

@section('content')
    <div>
        <h2>Editar aluno</h2>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf <!-- Token CSRF para proteção -->
            @method('PUT')
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" value="{{ $student->name }}" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $student->email }}" required>
            </div>
            <div>
                <label for="gender">Genero:</label>
                <select name="gender" id="gender">
                    <option value="">Selecione</option>
                    <option value="male" @if($student->gender == 'male') selected @endif>Masculino</option>
                    <option value="female" @if($student->gender == 'female') selected @endif>Feminino</option>
                    <option value="other" @if($student->gender == 'other') selected @endif>Outros</option>
                </select>
            </div>
            <div>
                <label for="birthdate">Data de Nascimento:</label>
                <input type="date" name="birthdate" id="birthdate" value="{{ $student->birthdate }}" required>
            </div>
            <button type="submit">Editar</button>
        </form>
    </div>
@endsection
