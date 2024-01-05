<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;
use App\Models\User;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::with('user')->orderBy('rayon', 'ASC')->simplePaginate(5);
        return view('rayon.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('rayon.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required|min:3',
            'pembina' => 'required'
        ]);

        Rayon::create([
            'rayon' => $request->rayon,
            'user_id' => $request->pembina
        ]);

        return redirect()->back()->with('success', 'Rayon Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::where('role', 'Pembimbing Siswa')->get();
        $rayon = Rayon::where('id', $id)->first();
        // return $users;
        return view('rayon.edit', compact('rayon', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required|min:3',
            'pembina' => "required"
        ]);

        Rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->pembina
        ]);

        return redirect()->route('rayon.index')->with('success', 'Berhasil Mengubah Rayon!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rayon::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil Menghapus Rayon!');
    }
}
