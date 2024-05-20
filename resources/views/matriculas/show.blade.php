@extends('layout')

@section('content')
    <div>
        <h2>Detalhes da Matrícula</h2>
        <p><strong>Aluno:</strong> {{ $matricula->student->name }}</p>
        <p><strong>Curso:</strong> {{ $matricula->course->title }}</p>
        <p><strong>Data de Matrícula:</strong> {{ $matricula->created_at }}</p>
        <a href="{{ route('matriculas.index') }}">Voltar</a>
    </div>
@endsection
