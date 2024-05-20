<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        // $students = Student::all();
        // return view('students.index', compact('students'));

        $students = Student::when($request->has('name'), function ($query) {
            $query->where('name', 'like', '%' . request('name') . '%');
        })->when($request->has('email'), function ($query) {
            $query->where('email', 'like', '%' . request('email') . '%');
        })->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'birthdate' => 'required|date',

        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Aluno criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'birthdate' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Aluno Editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Aluno Excluido com sucesso.');
    }

    
    
}
