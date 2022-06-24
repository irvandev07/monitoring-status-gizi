<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auths.login');
});

Route::group(['middlerware' => ['Auth','checkRole:admin']],function(){
   
    Route::get('/login','AuthController@login')->name('login');
    Route::post('/postloginpus', 'AuthController@postloginpus');
    Route::get('/logout','AuthController@logout');
    Route::get('/lupaPassword','AuthController@lupaPass');
    
    Route::get('/profile','ProfileController@profile');
    Route::get('/pengaturan','PengaturanController@pengaturan');

    Route::get('/dashboard','DashboardController@index');

    Route::get('/wilayah','WilayahController@index');
    Route::post('/wilayah/tambah','WilayahController@tambah');
    Route::post('/wilayah/import','WilayahController@importexcel')->name('wilayah.import');

    Route::get('/wilayah/{posyandu}/detail','DataAnakController@anak');
    Route::post('/wilayah/data-anak/tambah','DataAnakController@tambah');
    Route::get('/wilayah/{posyandu}/detail/exportexcel','DataAnakController@exportexcel');
    Route::post('/wilayah/detail/importexcel','DataAnakController@importexcel')->name('anak.import');
    Route::get('/data-anak/{id}/hapus','DataAnakController@hapus');
    Route::resource('/update-anak','DataAnakController');

    Route::get('/kriteria','FaktorController@kriteria');
    Route::post('/kriteria/import','FaktorController@importexcel')->name('kriteria.import');
    Route::post('/kriteria/tambah','FaktorController@tambah');
    Route::resource('/update','FaktorController');
    Route::get('/kriteria/{id}/hapus','FaktorController@hapus');
    Route::get('/kriteria/exportexcel/', 'FaktorController@exportexcel');

    Route::get('/alternatif','FaktorController@alternatif');
    Route::post('/alternatif/tambah','FaktorController@tambahAl');
    Route::post('/alternatif/{id}/update','FaktorController@updateAl');
    Route::get('/alternatif/{id}/edit','FaktorController@editAl');
    Route::get('/alternatif/{id}/hapus','FaktorController@hapusAl');

    Route::get('/laporan','LaporanController@laporan');
    Route::post('/laporan/tambah','LaporanController@tambah');


    Route::get('/nilaimatriks','FaktorController@nilaimatriks');

    Route::get('/hasil', function () {
        return view('faktor.normalisasi');
    });
    
    Route::get('/hasil_akhir', function () {
        return view('faktor.hasil_akhir');
    });

    Route::get('/hasil', 'HasilTopsisController@solusi_ideal');
    Route::get('/hasil/pre', 'HasilTopsisController@nilai_preferensi');

    Route::group(['as' => 'admin.'], function(){
        Route::group(["as" => "topsis.", "prefix" => "topsis"], function () {
            Route::get('/normalisasi', 'HasilTopsisController@matrix_keputusan_ternormalisasi')->name('matrix_keputusan_ternormalisasi');
            Route::get('/normalisasi-berbobot', 'HasilTopsisController@matrix_keputusan_terbobot')->name('matrix_keputusan_terbobot');
            Route::get('/jarak_solusi_positif_negatif', 'HasilTopsisController@jarak_solusi_positif_negatif')->name('jarak_solusi_positif_negatif');
            Route::get('/nilai_preferensi', 'HasilTopsisController@nilai_preferensi')->name('nilai_preferensi');
            Route::get('/hasil_akhir', 'HasilTopsisController@hasil_akhir')->name('hasil_akhir');
        });
    });
});