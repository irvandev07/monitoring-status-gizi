<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
use App\Anak;

class DashboardController extends Controller
{
    public function index()
    {
        $data_wilayah = Wilayah::all()->count();
        $data_anak = Anak::all()->count();
        return view('dashboard.index',['data_wilayah' => $data_wilayah],['data_anak' => $data_anak]);
    }
    public function calender()
    {
        return view('dashboard.calendar');
    }
}
