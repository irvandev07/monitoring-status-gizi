<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Wilayah;

class WilayahImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row){
            //format tanggal -- $tanggal = ($row[3] - 25569) * 86400;
            if($key >=1 ){
                Wilayah::create([
                    'posyandu' => $row[0],
                    'alamat' => $row[1],
                    //'tanggal' => gmdate('Y-m-d')
                ]);
            }
                
        }
        //dd($collection);
    }
}
