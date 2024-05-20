@extends('layout')

@section('content')
    <div>
        <h2>{{ $student->name }}</h2>
        <p>Email: {{ $student->email }}</p>
        <p>Genero: {{ $student->gender }}</p>
        <p>Data de Nascimento: {{ $student->birthdate }}</p>
        <a href="{{ route('students.index') }}">Voltar</a>
    </div>
@endsection
