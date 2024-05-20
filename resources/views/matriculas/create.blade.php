@extends('layout')

@section('content')
    <div>
        <h2>Nova Matrícula</h2>
        <form action="{{ route('matriculas.store') }}" method="POST">
            @csrf
            <div>
                <label for="student_id">Aluno:</label>
                <select name="student_id" id="student_id">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="course_id">Curso:</label>
                <select name="course_id" id="course_id">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Salvar Matrícula</button>
        </form>
    </div>
@endsection
