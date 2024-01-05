<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('rayon', 'rombel')->orderBy('name', 'ASC')->simplePaginate(5);

        return view('student.admin.index', compact('students'));
    }

    public function data()
    {
        $ps = Rayon::select('id')->where('user_id', Auth::user()->id)->get();
        $students = Student::wherein('rayon_id', $ps)->with('rayon', 'rombel')->orderBy('name', 'ASC')->simplePaginate(5);
        return view('student.pembimbing.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombel::All();
        $rayons = Rayon::All();

        return view('student.admin.create', compact('rombels', 'rayons'));
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

        return view('student.admin.edit', compact('student', 'rombels', 'rayons'));
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

        return redirect()->route('student.admin.index')->with('success', 'Berhasil Mengubah Siswa!');
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
