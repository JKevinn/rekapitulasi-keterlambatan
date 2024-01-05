<?php

namespace App\Exports;

use App\Models\Late;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LatesExport implements FromCollection, Withheadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Late::with('student')->get()->groupBy('student_id')->map(function ($group) {
            
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
