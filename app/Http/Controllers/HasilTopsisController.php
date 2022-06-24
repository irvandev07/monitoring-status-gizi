<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use Yajra\Datatables\Datatables;

use \App\Preferensi;


class HasilTopsisController extends Controller
{
    public function topsis()
    {
        return view('faktor.topsis');
    }

//*!!---------------Mengambil Data di DB------------------------------------------------------------------------!!//
    public function get_data()
    {
        # code...
        $data = Data::all();
        
    //--------------Asupan Makan------------------------------------------------//
        foreach ($data as $key) {
            # code...
            if (($key->makan < 1) and ($key->makan >= 1)) {
                # code...
                $key->l_makan = 1;
            }elseif (($key->makan <= 2)and ($key->makan >= 2)) {
                # code...
                $key->l_makan = 2;
            }elseif (($key->makan <= 3 ) and ($key->makan >= 3 )) {
                # code...
                $key->l_makan = 3;
            }elseif (($key->makan <=4) and ($key->makan >= 4)) {
                # code...
                $key->l_makan = 4;
            }elseif (($key->makan <= 5)and ($key->makan >= 5)) {
                # code...
                $key->l_makan = 5;
            }
        }

    //--------------infeksi------------------------------------------------//
        foreach ($data as $key) {
            # code...
            if (($key->infeksi < 1) and ($key->infeksi >= 1)) {
                # code...
                $key->l_infeksi = 1;
            }elseif (($key->infeksi <= 2)and ($key->infeksi >= 2)) {
                # code...
                $key->l_infeksi = 2;
            }elseif (($key->infeksi <= 3 ) and ($key->infeksi >= 3 )) {
                # code...
                $key->l_infeksi = 3;
            }elseif (($key->infeksi <=4) and ($key->infeksi >= 4)) {
                # code...
                $key->l_infeksi = 4;
            }elseif (($key->infeksi <= 5)and ($key->infeksi >= 5)) {
                # code...
                $key->l_infeksi = 5;
            }
        }
    //--------------sanitasi------------------------------------------------//
        foreach ($data as $key) {
            # code...
            if (($key->sanitasi < 1) and ($key->sanitasi >= 1)) {
                # code...
                $key->l_sanitasi = 1;
            }elseif (($key->sanitasi <= 2)and ($key->sanitasi >= 2)) {
                # code...
                $key->l_sanitasi = 2;
            }elseif (($key->sanitasi <= 3 ) and ($key->sanitasi >= 3 )) {
                # code...
                $key->l_sanitasi = 3;
            }elseif (($key->sanitasi <=4) and ($key->sanitasi >= 4)) {
                # code...
                $key->l_sanitasi = 4;
            }elseif (($key->sanitasi <= 5)and ($key->sanitasi >= 5)) {
                # code...
                $key->l_sanitasi = 5;
            }
        }
    //--------------pola asuh------------------------------------------------//
        foreach ($data as $key) {
            # code...
            if (($key->asuh < 1) and ($key->asuh >= 1)) {
                # code...
                $key->l_asuh = 1;
            }elseif (($key->asuh <= 2)and ($key->asuh >= 2)) {
                # code...
                $key->l_asuh = 2;
            }elseif (($key->asuh <= 3 ) and ($key->asuh >= 3 )) {
                # code...
                $key->l_asuh = 3;
            }elseif (($key->asuh <=4) and ($key->asuh >= 4)) {
                # code...
                $key->l_asuh = 4;
            }elseif (($key->asuh <= 5)and ($key->asuh >= 5)) {
                # code...
                $key->l_asuh = 5;
            }
        }    
    //--------------pangan------------------------------------------------//
        foreach ($data as $key) {
            # code...
            if (($key->pangan < 1) and ($key->pangan >= 1)) {
                # code...
                $key->l_pangan = 1;
            }elseif (($key->pangan <= 2)and ($key->pangan >= 2)) {
                # code...
                $key->l_pangan = 2;
            }elseif (($key->pangan <= 3 ) and ($key->pangan >= 3 )) {
                # code...
                $key->l_pangan = 3;
            }elseif (($key->pangan <=4) and ($key->pangan >= 4)) {
                # code...
                $key->l_pangan = 4;
            }elseif (($key->pangan <= 5)and ($key->pangan >= 5)) {
                # code...
                $key->l_pangan = 5;
            }
        }
    //--------------kemiskinan------------------------------------------------//
        foreach ($data as $key) {
            # code...
            if (($key->miskin < 1) and ($key->miskin >= 1)) {
                # code...
                $key->l_miskin = 1;
            }elseif (($key->miskin <= 2)and ($key->miskin >= 2)) {
                # code...
                $key->l_miskin = 2;
            }elseif (($key->miskin <= 3 ) and ($key->miskin >= 3 )) {
                # code...
                $key->l_miskin = 3;
            }elseif (($key->miskin <=4) and ($key->miskin >= 4)) {
                # code...
                $key->l_miskin = 4;
            }elseif (($key->miskin <= 5)and ($key->miskin >= 5)) {
                # code...
                $key->l_miskin = 5;
            }
        }
    //--------------pendidikan------------------------------------------------//
        foreach ($data as $key) {
            # code...
            if (($key->pendidikan < 1) and ($key->pendidikan >= 1)) {
                # code...
                $key->l_pendidikan = 1;
            }elseif (($key->pendidikan <= 2)and ($key->pendidikan >= 2)) {
                # code...
                $key->l_pendidikan = 2;
            }elseif (($key->pendidikan <= 3 ) and ($key->pendidikan >= 3 )) {
                # code...
                $key->l_pendidikan = 3;
            }elseif (($key->pendidikan <=4) and ($key->pendidikan >= 4)) {
                # code...
                $key->l_pendidikan = 4;
            }elseif (($key->pendidikan <= 5)and ($key->pendidikan >= 5)) {
                # code...
                $key->l_pendidikan = 5;
            }
        }
        return $data->all();
    }
//*!!---------------Perhitungan Normalisasi----------------------------------------------------------------------------!!//
    public function get_normalized()
    {
        # code...
        $data = $this->get_data();
        $temp_makan = 0;
        $temp_infeksi = 0;
        $temp_sanitasi = 0;
        $temp_asuh = 0;
        $temp_pangan = 0; 
        $temp_miskin = 0; 
        $temp_pendidikan = 0; 
        foreach ($data as $key) {
            # code...
            $temp_makan += $key->l_makan*$key->l_makan;
            $temp_infeksi += $key->l_infeksi*$key->l_infeksi;
            $temp_sanitasi += $key->l_sanitasi*$key->l_sanitasi;
            $temp_asuh += $key->l_asuh*$key->l_asuh;
            $temp_pangan += $key->l_pangan*$key->l_pangan;
            $temp_miskin += $key->l_miskin*$key->l_miskin;
            $temp_pendidikan += $key->l_pendidikan*$key->l_pendidikan;
        }
        foreach ($data as $key) {
            # code...
            $key->r_makan = $key->l_makan/(sqrt($temp_makan));
            $key->r_infeksi = $key->l_infeksi/(sqrt($temp_infeksi));
            $key->r_sanitasi = $key->l_sanitasi/(sqrt($temp_sanitasi));
            $key->r_asuh = $key->l_asuh/(sqrt($temp_asuh));
            $key->r_pangan = $key->l_pangan/(sqrt($temp_pangan));
            $key->r_miskin = $key->l_miskin/(sqrt($temp_miskin));
            $key->r_pendidikan = $key->l_pendidikan/(sqrt($temp_pendidikan));
        }
        return $data;        
    }
//*!!---------------Perhitungan Berbobot---------------------------------------------------------------------------!!//
    public function get_terbobot()
    {
        # code...
        $data = $this->get_normalized();
        $options = \App\Setting::getAllKeyValue();
        $c1 = json_decode($options['c1']);
        $c2 = json_decode($options['c2']);
        $c3 = json_decode($options['c3']);
        $c4 = json_decode($options['c4']);
        $c5 = json_decode($options['c5']);
        $c6 = json_decode($options['c6']);
        $c7 = json_decode($options['c7']);
        foreach ($data as $key) {
            # code...
            $key->v_makan = $key->r_makan*$c1;
            $key->v_infeksi = $key->r_infeksi*$c2;
            $key->v_sanitasi = $key->r_sanitasi*$c3;
            $key->v_asuh = $key->r_asuh*$c4;
            $key->v_pangan = $key->r_pangan*$c5;
            $key->v_miskin = $key->r_miskin*$c6;
            $key->v_pendidikan = $key->r_pendidikan*$c7;
        }

        return $data;
    }
//*!!---------------Perhitungan ideal---------------------------------------------------------------------------!!//
    public function get_ideal(){
        # code...
        $options = \App\Setting::getAllKeyValue();
        $c1 = json_decode($options['c1']);
        $c2 = json_decode($options['c2']);
        $c3 = json_decode($options['c3']);
        $c4 = json_decode($options['c4']);
        $c5 = json_decode($options['c5']);
        $c6 = json_decode($options['c6']);
        $c7 = json_decode($options['c7']);
        $data = $this->get_terbobot();
        $temp_makan = [];
        $temp_infeksi = [];
        $temp_sanitasi = [];
        $temp_asuh = [];
        $temp_pangan= [];
        $temp_miskin = [];
        $temp_pendidikan= [];
        foreach ($data as $key) {
            # code...
            $temp_makan[] = $key->v_makan;
            $temp_infeksi[] = $key->v_infeksi;
            $temp_sanitasi[] = $key->v_sanitasi;
            $temp_asuh[] = $key->v_asuh;
            $temp_pangan[] = $key->v_pangan;
            $temp_miskin[] = $key->v_miskin;
            $temp_pendidikan[] = $key->v_pendidikan;
        }

        $solusi = array(
            'c1' => array('negatif' => (!$c1) ?  max($temp_makan) :  min($temp_makan),'positif' => ($c1) ?  max($temp_makan) :  min($temp_makan)),
            'c2' => array('negatif' => (!$c2) ?  max($temp_infeksi) :  min($temp_infeksi),'positif' => ($c2) ?  max($temp_infeksi) :  min($temp_infeksi)),
            'c3' => array('negatif' => (!$c3) ?  max($temp_sanitasi) :  min($temp_sanitasi),'positif' => ($c3) ?  max($temp_sanitasi) :  min($temp_sanitasi)),
            'c4' => array('negatif' => (!$c4) ?  max($temp_asuh) :  min($temp_asuh),'positif' => ($c4) ?  max($temp_asuh) :  min($temp_asuh)),
            'c5' => array('negatif' => (!$c5) ?  max($temp_pangan) :  min($temp_pangan),'positif' => ($c5) ?  max($temp_pangan) :  min($temp_pangan)),
            'c6' => array('negatif' => (!$c6) ?  max($temp_miskin) :  min($temp_miskin),'positif' => ($c6) ?  max($temp_miskin) :  min($temp_miskin)),
            'c7' => array('negatif' => (!$c7) ?  max($temp_pendidikan) :  min($temp_pendidikan),'positif' => ($c7) ?  max($temp_pendidikan) :  min($temp_pendidikan)),
        );

        return $solusi;
    }

    public function get_positif_negatif_distance()
    {
        # code...
        $data = $this->get_terbobot();
        $solusi_ideal = $this->get_ideal();
        foreach ($data as $key) {
            # code...
            
            $key->a_makan = pow(($key->v_makan - $solusi_ideal['c1']['positif']),2);
            $key->a_infeksi = pow(($key->v_infeksi - $solusi_ideal['c2']['positif']),2);
            $key->a_sanitasi = pow(($key->v_sanitasi - $solusi_ideal['c3']['positif']),2);
            $key->a_asuh = pow(($key->v_asuh - $solusi_ideal['c4']['positif']),2);
            $key->a_pangan = pow(($key->v_pangan - $solusi_ideal['c5']['positif']),2);
            $key->a_miskin = pow(($key->v_miskin - $solusi_ideal['c6']['positif']),2);
            $key->a_pendidikan = pow(($key->v_pendidikan - $solusi_ideal['c7']['positif']),2);
            
            $key->a_total = sqrt($key->a_makan+$key->a_infeksi+$key->a_sanitasi+$key->a_asuh+$key->a_pangan+$key->a_miskin+$key->a_pendidikan);

            $key->b_makan = pow(($key->v_makan - $solusi_ideal['c1']['negatif']),2);
            $key->b_infeksi = pow(($key->v_infeksi - $solusi_ideal['c2']['negatif']),2);
            $key->b_sanitasi = pow(($key->v_sanitasi - $solusi_ideal['c3']['negatif']),2);
            $key->b_asuh = pow(($key->v_asuh - $solusi_ideal['c4']['negatif']),2);
            $key->b_pangan = pow(($key->v_pangan - $solusi_ideal['c5']['negatif']),2);
            $key->b_miskin = pow(($key->v_miskin - $solusi_ideal['c6']['negatif']),2);
            $key->b_pendidikan = pow(($key->v_pendidikan - $solusi_ideal['c7']['negatif']),2);
            
            $key->b_total = sqrt($key->b_makan+$key->b_infeksi+$key->b_sanitasi+$key->b_asuh+$key->b_pangan+$key->b_miskin+$key->b_pendidikan);
        }
        return $data;
    }

    public function get_nilai_preferensi()
    {
        # code...
        $data = $this->get_positif_negatif_distance();
        foreach ($data as $key) {
            # code...
            $key->nilai_preferensi = $key->b_total/($key->a_total + $key->b_total);
            
        }
        return $data;
        
    }


//**!!---------------Melempar ke View---------------------------------------------------------------------------!!//
    public function matrix_keputusan_ternormalisasi()
    {
        # code...
        $data = $this->get_normalized();
        return Datatables::of($data)
                ->setRowId(function(Data $data){
                    return $data->id;
                })->make(true);
    }
//**!!---------------Melempar ke  View---------------------------------------------------------------------------!!//
    public function matrix_keputusan_terbobot()
    {
        # code...
        //menyiapkan data chart
        $data = $this->get_terbobot();

        return Datatables::of($data)
                ->setRowId(function(Data $data){
                    return $data->id;
                })->make(true);
    }
//**!!---------------Melempar ke  View---------------------------------------------------------------------------!!//
    public function solusi_ideal()
    {
        # code...
        $data['solusi'] = $this->get_ideal();
        return view('faktor.normalisasi',$data);
    }

    public function jarak_solusi_positif_negatif()
    {
        # code...
        $data = $this->get_positif_negatif_distance();
        return Datatables::of($data)
                ->setRowId(function(Data $data){
                    return $data->id;
                })->make(true);
    }
    public function nilai_preferensi(Request $request)
    {
        # code...
        $data = $this->get_nilai_preferensi();
        return Datatables::of($data)
        ->setRowId(function(Data $data){
            return $data->id;
        })->make(true);

    }
    public function hasil_akhir()
    {
        # code..
        $data = $this->get_normalized();
        $data = $this->get_nilai_preferensi();
        return Datatables::of($data)
        ->setRowId(function(Data $data){
            return $data->id;
        })->make(true);
    }
}
