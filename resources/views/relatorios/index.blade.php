@extends('layout')

@section('content')
    <div class="container">
        <h2>Relatório de Alunos por Faixa Etária</h2>
        @foreach ($report as $courseData)
            <h3 class="mt-4 mb-3">{{ $courseData['course']->title }}</h3>
            <table border="1" cellpadding="5" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
                        <th>Faixa Etária</th>
                        <th>Masculino</th>
                        <th>Feminino</th>
                        <th>Outro</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseData['data'] as $faixaEtaria => $data)
                        <tr>
                            <td>{{ $faixaEtaria }}</td>
                            <td>{{ $data['male'] }}</td>
                            <td>{{ $data['female'] }}</td>
                            <td>{{ $data['other'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
