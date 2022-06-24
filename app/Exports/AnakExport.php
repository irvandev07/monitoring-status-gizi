<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use \App\Anak;

class AnakExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Anak::all();
    }
    public function map($kriteria): array
    {
        return [
            $posyandu->posyandu,
            $nama->nama,
            $kelamin->kelamin,
            $gizi->gizi
        ];
    }
    public function headings(): array
    {
        return [
            'POSYANDU',
            'NAMA ANAK',
            'JENIS ANAK',
            'STATUS GIZI',
        ];
    }
}
