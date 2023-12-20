<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $late = Late::count();
        $rayon = Rayon::count();
        $rombel = Rombel::count();
        $student = Student::count();
        $admin = User::where('role', '=', 'Admin')->count();
        $pembimbing = User::where('role', '=', 'Pembimbing Siswa')->count();

        return view('dashboard', compact('late', 'rayon', 'rombel', 'student', 'admin', 'pembimbing'));
    }
}
