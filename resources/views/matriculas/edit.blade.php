@extends('layout')

@section('content')
    <div class="container form edit">
        <h2>Editar Matrícula</h2>
        <form action="{{ route('matriculas.update', $matricula->id) }}" method="POST" class="form edit">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="student_id">Aluno:</label>
                <select name="student_id" id="student_id">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" @if($matricula->student_id == $student->id) selected @endif>{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="course_id">Curso:</label>
                <select name="course_id" id="course_id">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" @if($matricula->course_id == $course->id) selected @endif>{{ $course->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Atualizar Matrícula</button>
        </form>
    </div>
@endsection
