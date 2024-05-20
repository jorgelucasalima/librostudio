<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('courses')->get();
        $report = [];

        $faixaEtarias = [
            'menor_15' => ['name' => 'Menor que 15 anos', 'range' => [0, 14]],
            'entre_15_18' => ['name' => 'Entre 15 e 18 anos', 'range' => [15, 18]],
            'entre_19_24' => ['name' => 'Entre 19 e 24 anos', 'range' => [19, 24]],
            'entre_25_30' => ['name' => 'Entre 25 e 30 anos', 'range' => [25, 30]],
            'maior_30' => ['name' => 'Maior que 30 anos', 'range' => [31, 100]]
        ];

        // Inicializar o relatório para cada faixa etária, curso e gênero
        foreach ($faixaEtarias as $faixaKey => $faixa) {
            foreach (Course::all() as $course) {
                $report[$course->id]['course'] = $course;
                $report[$course->id]['data'][$faixa['name']]['male'] = 0;
                $report[$course->id]['data'][$faixa['name']]['female'] = 0;
                $report[$course->id]['data'][$faixa['name']]['other'] = 0;
            }
        }

        // Processar os alunos para preenchimento do relatório
        foreach ($students as $student) {
            $age = \Carbon\Carbon::parse($student->birthdate)->age;

            foreach ($student->courses as $course) {
                foreach ($faixaEtarias as $faixa) {
                    if ($age >= $faixa['range'][0] && $age <= $faixa['range'][1]) {
                        $report[$course->id]['data'][$faixa['name']][$student->gender] += 1;
                    }
                }
            }
        }

        return view('relatorios.index', compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
