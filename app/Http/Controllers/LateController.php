<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Late;
use App\Models\User;
use Carbon\Carbon;
use PDF;
use Excel;
use App\Exports\LatesExport;
use App\Exports\LateExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $lates = Late::with('student')->orderBy('date_time_late', 'ASC')->simplePaginate(5);
        $latesgroup = Late::select('student_id')->with('student')->groupBy('student_id')->simplePaginate(5);

        return view('late.admin.index', compact('lates', 'latesgroup'));
    }

    public function data()
    {
        $ps = Rayon::select('id')->where('user_id', Auth::user()->id);
        $studentslate = Late::with('student')->whereHas('student.rayon', function ($query) use($ps) {
            $query->where('rayon_id', $ps);
        })->simplePaginate(5);
        // $studentslategroup = Late::with('student')->whereHas('student.rayon', function ($query) {
            //     $ps = Rayon::select('id')->where('user_id', Auth::user()->id);
            //     $query->where('rayon_id', $ps);
            // })->distinct()->simplePaginate(5);
            $studentslategroup = Student::where('rayon_id', $ps)->with('late')->simplepaginate(5);
        
        return view('late.pembimbing.index', compact('studentslate', 'studentslategroup'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::All();

        return view('late.admin.create', compact('students'));
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
        $file = $request->file('bukti');
        $fileName = $file->getClientOriginalName();
        $input = $request->file('bukti')->storeAs('public/buktis', $fileName);
        
        Late::create([
            'student_id' => $request->name,
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => 'buktis/' . $fileName
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $late = Late::where('student_id', $id)->simplepaginate(5);
        $student = Student::with('rayon', 'rombel')->where('id', $id)->first();
        foreach($late as $item) {
            $rayon = Rayon::where('id', $item->student->rayon_id)->first();
            $rombel = Rombel::where('id', $item->student->rombel_id)->first();
        }

        if(Auth::user()->role == "Admin") {
            return view('late.admin.show', compact('late', 'rayon', 'rombel', 'student'));
        } else {
            return view('late.pembimbing.show', compact('late', 'rayon', 'rombel', 'student'));
        }
    }

    public function downloadPDF($id)
    {
        $late = Student::with('rayon', 'rombel')->where('id', $id)->first();
        $pembimbing = User::where('id', $late->rayon->user_id)->first();
        $totallate = Late::select('student_id')->where('student_id', $id)->count();

        $date = Carbon::now()->isoFormat('D');
        $month = Carbon::now()->isoFormat('MMMM');
        $year = Carbon::now()->isoFormat('Y');

        if ($month == "January") {
            $month = "Januari";
        } elseif ($month == "February") {
            $month = "Febuari";
        } elseif ($month == "March") {
            $month = "Maret";
        } elseif ($month == "April") {
            $month = "April";
        } elseif ($month == "May") {
            $month = "Mei";
        } elseif ($month == "June") {
            $month = "Juni";
        } elseif ($month == "July") {
            $month = "Juli";
        } elseif ($month == "August") {
            $month = "Agustus";
        } elseif ($month == "September") {
            $month = "September";
        } elseif ($month == "October") {
            $month = "Oktober";
        } elseif ($month == "November") {
            $month = "November";
        } elseif ($month == "December") {
            $month = "Desember";
        }

        $dates = $date . ' ' . $month . ' ' . $year;
        if(Auth::user()->role == "Admin") {
            $pdf = PDF::loadView('late.admin.download-pdf', compact('late', 'pembimbing', 'dates', 'totallate'))->setpaper('a4');
        } else {
            $pdf = PDF::loadView('late.pembimbing.download-pdf', compact('late', 'pembimbing', 'dates', 'totallate'))->setpaper('a4');
        }
        return $pdf->download('Surat Pernyataan.pdf');

        // return view('late.download-pdf', compact('late', 'pembimbing', 'date'));
    }

    public function export() 
    {
        $file_name = 'Data_Siswa' . '.xls';
        
        if(Auth::user()->role == "Admin") {
            return Excel::download(new LatesExport, $file_name);
        } else {
            $ps = Rayon::select('id')->where('user_id', Auth::user()->id);
            return Excel::download(new LateExport($ps), $file_name);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::All();
        $late = Late::where('id', $id)->first();

        return view('late.admin.edit', compact('students', 'late'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if($request->bukti) {
            $file = $request->file('bukti');
            $fileName = $file->getClientOriginalName();
            $input = $request->file('bukti')->storeAs('public/buktis', $fileName);
            Late::where('id', $id)->update([
                'date_time_late' => $request->date_time_late,
                'information' => $request->information,
                'bukti' => 'buktis/' . $fileName
            ]);
        }
        
        Late::where('id', $id)->update([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
        ]);

        return redirect()->route('late.admin.index')->with('success', 'Berhasil Mengubah Keterlambatan!');
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
