@extends('layout')

@section('content')
    <div>
        <h2>Criar Aluno</h2>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf <!-- Token CSRF para proteção -->
            <div>
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="gender">Genero:</label>
                <select name="gender" id="gender">
                    <option value="">Selecione</option>
                    <option value="male">Masculino</option>
                    <option value="female">Feminino</option>
                    <option value="other">Outros</option>
                </select>
            </div>
            <div>
                <label for="birthdate">Data de Nascimento:</label>
                <input type="date" name="birthdate" id="birthdate" required>
            </div>
            <button type="submit">Criar</button>
        </form>
    </div>
@endsection
