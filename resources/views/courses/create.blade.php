@extends('layout')

@section('content')
    <div class="container form">
        <h2>Criar Curso</h2>
        <form action="{{ route('courses.store') }}" method="POST" class="form">
            @csrf
            <div>
                <label for="title">Titulo:</label>
                <input type="text" name="title" id="title" required>
            </div>
            <div>
                <label for="description">Descrição:</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <button type="submit">Criar</button>
        </form>
    </div>
@endsection
