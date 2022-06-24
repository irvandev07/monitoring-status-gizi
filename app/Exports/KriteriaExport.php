<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use App\Kriteria;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KriteriaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kriteria::all();
    }
    public function map($kriteria): array
    {
        return [
            $kriteria->id_kriteria,
            $kriteria->nama,
            $kriteria->bobot,
            $kriteria->point
        ];
    }
    public function headings(): array
    {
        return [
            'ID KRITERIA',
            'NAMA KRITERIA',
            'BOBOT',
            'POINT',
        ];
    }
}
