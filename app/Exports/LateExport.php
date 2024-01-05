<?php

namespace App\Exports;

use App\Models\Late;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LateExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $ps;

    public function __construct($ps)
    {
        $this->ps = $ps;
    }

    public function collection()
    {
        return Late::with('student')->whereHas('student.rayon', function ($query) {
            $query->where('rayon_id', $this->ps);
        })->get()->groupBy('student_id')->map(function ($group) {
            
            $lates = $group->first();

            return [
                $lates->student->nis,
                $lates->student->name,
                $lates->student->rayon->rayon,
                $lates->student->rombel->rombel,
                $group->count()
            ];
        });
    }

    public function headings(): array
    {
        return
        [
            "NIS", "Nama", "Rayon", "Rombel", "Jumlah Keterlambatan"
        ];
    }
}
