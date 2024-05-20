@extends('layout')

@section('content')
    <div>
        <h2>Editar Curso</h2>
        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Titulo:</label>
                <input type="text" name="title" id="title" value="{{ $course->title }}" required>
            </div>
            <div>
                <label for="description">Descrição:</label>
                <textarea name="description" id="description">{{ $course->description }}</textarea>
            </div>
            <button type="submit">Editar</button>
        </form>
    </div>
@endsection
