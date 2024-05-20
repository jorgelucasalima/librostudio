@extends('layout')

@section('content')
    <div>
        <h2>{{ $course->title }}</h2>
        <p>{{ $course->description }}</p>
        <a href="{{ route('courses.index') }}">Voltar</a>
    </div>
@endsection
