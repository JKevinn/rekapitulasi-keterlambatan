<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use App\Models\User;
use App\Models\Late;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $rayon = Rayon::count();
        $rombel = Rombel::count();
        $student = Student::count();
        $admin = User::where('role', '=', 'Admin')->count();
        $pembimbing = User::where('role', '=', 'Pembimbing Siswa')->count();

        return view('dashboard', compact('rayon', 'rombel', 'student', 'admin', 'pembimbing'));
    }

    public function data()
    {
        $ps = Rayon::select('id')->where('user_id', Auth::user()->id)->get();
        $rayon = Rayon::where('user_id', Auth::user()->id)->value('rayon');
        $students = Student::wherein('rayon_id', $ps)->get();

        foreach($students as $item)
        {
            $studentlate = Late::where('student_id', $item['id'])->whereDate('date_time_late', now()->toDateString())->get('date_time_late')->count();
        }

        return view('dashboard-pembimbing', compact('students', 'studentlate', 'rayon'));
    }
}
