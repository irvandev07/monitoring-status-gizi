<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Anak;

class AnakImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $key => $row){
            //$tanggal = ($row[3] - 25569) * 86400;
            if($key >=1 ){
                Anak::create([
                    'posyandu' => $row[0],
                    'nama' => $row[1],
                    'kelamin' => $row[2],
                    'gizi' => $row[3],
                    //'tanggal' => gmdate('Y-m-d')
                ]);
            }
                
        }
    }
}
