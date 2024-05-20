<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::with('student', 'course')->get();
        return view('matriculas.index', compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('matriculas.create', compact('students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        Matricula::create($request->all());

        return redirect()->route('matriculas.index')
                         ->with('success', 'Matricula realizada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matricula = Matricula::with('student', 'course')->findOrFail( $id );
        return view('matriculas.show', compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matricula = Matricula::findOrFail( $id );
        $students = Student::all();
        $courses = Course::all();
        return view('matriculas.edit', compact('matricula', 'students', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $matricula = Matricula::findOrFail( $id );

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $matricula->update($request->all());

        return redirect()->route('matriculas.index')
                        ->with([
                            'success' => 'Matrícula atualizada com sucesso.',
                            'matricula' => $matricula
                        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $matricula = Matricula::findOrFail( $id );
        $matricula->delete();

        return redirect()->route('matriculas.index')
                         ->with('success', 'Matricula excluida.');
    }

    public function pesquisa(Request $request)
    {
        $query = Matricula::with('student', 'course');

        if ($request->has('name')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->has('email')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            });
        }

        $matriculas = $query->get();

        return view('matriculas.index', compact('matriculas'));
    }

}
