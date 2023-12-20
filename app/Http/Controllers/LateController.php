<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Student;
use Illuminate\Http\Request;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Late::All();
        $students = Student::All();

        return view('late.index', compact('lates', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::All();

        return view('late.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required'
        ]);

        $extension = $request->name . '.' . $request->bukti->extension();

        Late::create([
            'student_id' => $request->name,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->file('bukti')->storeAs('public/buktis', $extension)
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Late $late)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::All();
        $late = Late::where('id', $id)->first();

        return view('late.edit', compact('students', 'late'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required'
        ]);

        $extension = $request->name . '.' . $request->bukti->extension();

        Late::where('id', $id)->update([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->file('bukti')->storeAs('/buktis', $extension)
        ]);

        return redirect()->route('late.index')->with('success', 'Berhasil Menambahkan Keterlambatan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Late::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Keterlambatan!');
    }
}
