<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::All();
        $rombels = Rombel::All();
        $rayons = Rayon::All();

        return view('student.index', compact('students', 'rombels', 'rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombel::All();
        $rayons = Rayon::All();

        return view('student.create', compact('rombels', 'rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
        ]);

        Student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel,
            'rayon_id' => $request->rayon,
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Siswa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        $rombels = Rombel::All();
        $rayons = Rayon::All();

        return view('student.edit', compact('student', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
        ]);

        Student::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel,
            'rayon_id' => $request->rayon,
        ]);

        return redirect()->route('student.index')->with('success', 'Berhasil Mengupdate Siswa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Data!');
    }
}
