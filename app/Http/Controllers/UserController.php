<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);

        if(Auth::attempt($user)) {
            if(Auth::user()->role == "Admin") {
                return redirect('/dashboard');
            } elseif(Auth::user()->role == "Pembimbing Siswa") {
                return redirect('/dashboard-pembimbing');
            }
        } else {
            return redirect()->back()->with('failed', 'Email dan Password tidak sesuai, Silahkan coba lagi!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required'
            ]);
    
            $defaultPassword = Str::substr($request->email, 0, 3) . Str::substr($request->email, 0, 3);
    
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => bcrypt($defaultPassword)
            ]);
    
            return redirect()->back()->with('success', 'Berhasil Menambahkan Akun!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required',
            ]);

            $password = $request->password;

            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($password),
                'role' => $request->role
            ]);
    
            return redirect()->route('user.index')->with('success', 'Berhasil Mengubah Akun!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       User::where('id', $id)->delete();

       return redirect()->back()->with('success', 'Berhasil Menghapus Akun!');
    }
}
