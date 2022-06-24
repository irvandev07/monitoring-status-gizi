@extends('layouts.master')
@section('title')
Laporan | TA Silvi 2020
@stop
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Bulanan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card-header border-0">
            <div class="float-left">
                <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#LaporanTambahModal">
                <i class="fas fa-plus pr-2"></i>Tambah Laporan</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="LaporanTabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th >Laporan Bulan</th>
                    <th >Tanggal Penimbangan</th>
                    <th >Jumlah Kader</th>
                    <th >Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $data_laporan)
                      <tr>
                        <th scope="row">{{$data_laporan->laporan_bulan}}</th>
                        <td>{{$data_laporan->tgl_penimbangan}}</td>
                        <td>{{$data_laporan->jumlah_kader}}    </td>
                        <td>
                          <a href="#" class="btn btn-warning btn-sm text-white Edit" id="" DataLaporan-edit="{{$data_laporan->id}}"><i class="far fa-edit mr-1" ></i>Edit</a>
                          <a href="#" class="btn btn-danger btn-sm delete" id="" DataLaporan-hapus="{{$data_laporan->id}}" title="hapus" ><i class="far fa-trash-alt mr-1"></i>Hapus</a></td>
                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th >Laporan Bulan</th>
                    <th >Tanggal Penimbangan</th>
                    <th >Jumlah Kader</th>
                </tr>
                </tfoot>
              </table>
              <!-- Modal tambah laporan -->
               <div class="modal fade" id="LaporanTambahModal" tabindex="-1" role="dialog" aria-labelledby="KriteriaModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="KriteriaModalLabel">Tambah Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action="/laporan/tambah" method="POST">
                      {{csrf_field()}}
                            <div class="form-group">
                            <label for="exampleFormControlSelect1">Laporan Bulan</label>
                            <select name="laporan_bulan" class="form-control {{$errors->has('laporan_bulan')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('laporan_bulan')}}">
                              <option></option>
                              <option>Januari</option>
                              <option>Februari</option>
                              <option>Maret</option>
                              <option>April</option>
                              <option>Mei</option>
                              <option>Juni</option>
                              <option>Juli</option>
                              <option>Agustus</option>
                              <option>September</option>
                              <option>Oktober</option>
                              <option>November</option>
                              <option>Desember</option>
                            </select>

                            @if($errors->has('laporan_bulan'))
                              <span class="help-block">{{$errors->first('laporan_bulan')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Tanggal Penimbangan</label>
                            <input name="tgl_penimbangan" id="datepicker" width="350" class="datepicker {{$errors->has('tgl_penimbangan')?'is-invalid':''}}" data-date-format="mm-dd-yyyy" aria-describedby="emailHelp" value="{{old('tgl_penimbangan')}}" />
                            
                             @if($errors->has('tgl_penimbangan'))
                              <span class="help-block">{{$errors->first('tgl_penimbangan')}}</span>
                            @endif
                           
                            <i style="font-size:12px; color:red;">*Format : 2010-01-05 (yyy-mm-dd)</i>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Nama petugas lapangan yang membina</label>
                            <input name = "petugas_lapangan" type="text" class="form-control {{$errors->has('petugas_lapangan')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('petugas_lapangan')}}">

                            @if($errors->has('petugas_lapangan'))
                              <span class="help-block">{{$errors->first('petugas_lapangan')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah kader yang ada</label>
                            <select name = "jumlah_kader" type="text" class="form-control {{$errors->has('jumlah_kader')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('jumlah_kader')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=10;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('jumlah_kader'))
                              <span class="help-block">{{$errors->first('jumlah_kader')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah kader yang aktif bulan ini</label>
                            <select name = "jumlah_kader_aktif" type="text" class="form-control {{$errors->has('jumlah_kader_aktif')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('jumlah_kader_aktif')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=10;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('jumlah_kader_aktif'))
                              <span class="help-block">{{$errors->first('jumlah_kader_aktif')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang ada di posyandu bulan ini (S)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "s_5" type="text" class="form-control {{$errors->has('s_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_5'))
                              <span class="help-block">{{$errors->first('s_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "s_11" type="text" class="form-control {{$errors->has('s_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_11'))
                              <span class="help-block">{{$errors->first('s_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "s_23" type="text" class="form-control {{$errors->has('s_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_23'))
                              <span class="help-block">{{$errors->first('s_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "s_59" type="text" class="form-control {{$errors->has('s_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_59'))
                              <span class="help-block">{{$errors->first('s_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "s_total" type="text" class="form-control {{$errors->has('s_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_total'))
                              <span class="help-block">{{$errors->first('s_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah semua balita yang terdaftar dan mempunyai KMS bulan ini (K)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "k_5" type="text" class="form-control {{$errors->has('k_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_5'))
                              <span class="help-block">{{$errors->first('k_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "k_11" type="text" class="form-control {{$errors->has('k_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_11'))
                              <span class="help-block">{{$errors->first('k_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "k_23" type="text" class="form-control {{$errors->has('k_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_23'))
                              <span class="help-block">{{$errors->first('k_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "k_59" type="text" class="form-control {{$errors->has('k_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_59'))
                              <span class="help-block">{{$errors->first('k_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "k_total" type="text" class="form-control {{$errors->has('k_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_total'))
                              <span class="help-block">{{$errors->first('k_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang naik berat badannya bulan ini (N)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "n_5" type="text" class="form-control {{$errors->has('n_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_5'))
                              <span class="help-block">{{$errors->first('n_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "n_11" type="text" class="form-control {{$errors->has('n_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_11'))
                              <span class="help-block">{{$errors->first('n_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "n_23" type="text" class="form-control {{$errors->has('n_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_23'))
                              <span class="help-block">{{$errors->first('n_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "n_59" type="text" class="form-control {{$errors->has('n_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_59'))
                              <span class="help-block">{{$errors->first('n_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "n_total" type="text" class="form-control {{$errors->has('n_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_total'))
                              <span class="help-block">{{$errors->first('n_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang tidak naik berat badannya bulan ini (T)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "t_5" type="text" class="form-control {{$errors->has('t_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_5'))
                              <span class="help-block">{{$errors->first('t_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "t_11" type="text" class="form-control {{$errors->has('t_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_11'))
                              <span class="help-block">{{$errors->first('t_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "t_23" type="text" class="form-control {{$errors->has('t_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_23'))
                              <span class="help-block">{{$errors->first('t_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "t_59" type="text" class="form-control {{$errors->has('t_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_59'))
                              <span class="help-block">{{$errors->first('t_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "t_total" type="text" class="form-control {{$errors->has('t_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_total'))
                              <span class="help-block">{{$errors->first('t_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang ditimbang bulan ini tetapi tidak ditimbang bulan lalu (O)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "o_5" type="text" class="form-control {{$errors->has('o_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_5'))
                              <span class="help-block">{{$errors->first('o_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "o_11" type="text" class="form-control {{$errors->has('o_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_11'))
                              <span class="help-block">{{$errors->first('o_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "o_23" type="text" class="form-control {{$errors->has('o_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_23'))
                              <span class="help-block">{{$errors->first('o_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "o_59" type="text" class="form-control {{$errors->has('o_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_59'))
                              <span class="help-block">{{$errors->first('o_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "o_total" type="text" class="form-control {{$errors->has('o_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_total'))
                              <span class="help-block">{{$errors->first('o_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang baru pertama kali hadir di posyandu bulan ini (B)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "b_5" type="text" class="form-control {{$errors->has('b_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_5'))
                              <span class="help-block">{{$errors->first('b_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "b_11" type="text" class="form-control {{$errors->has('b_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_11'))
                              <span class="help-block">{{$errors->first('b_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "b_23" type="text" class="form-control {{$errors->has('b_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_23'))
                              <span class="help-block">{{$errors->first('b_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "b_59" type="text" class="form-control {{$errors->has('b_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_59'))
                              <span class="help-block">{{$errors->first('b_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "b_total" type="text" class="form-control {{$errors->has('b_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_total'))
                              <span class="help-block">{{$errors->first('b_total')}}</span>
                            @endif
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                
              <!-- Modal edit laporan -->
              <div class="modal fade" id="EditLaporanModal" tabindex="-1" role="dialog" aria-labelledby="KriteriaModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="KriteriaModalLabel">Edit Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action=/update method="POST" id="EditLaporanForm">
                      {{csrf_field()}}
                      {{method_field('PUT')}}

                           <div class="form-group">
                            <label for="exampleFormControlSelect1">Laporan Bulan</label>
                            <select name="laporan_bulan" class="form-control {{$errors->has('laporan_bulan')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('laporan_bulan')}}">
                              <option></option>
                              <option>Januari</option>
                              <option>Februari</option>
                              <option>Maret</option>
                              <option>April</option>
                              <option>Mei</option>
                              <option>Juni</option>
                              <option>Juli</option>
                              <option>Agustus</option>
                              <option>September</option>
                              <option>Oktober</option>
                              <option>November</option>
                              <option>Desember</option>
                            </select>

                            @if($errors->has('laporan_bulan'))
                              <span class="help-block">{{$errors->first('laporan_bulan')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Tanggal Penimbangan</label>
                            <input name = "tgl_penimbangan" type="text" class="form-control {{$errors->has('tgl_penimbangan')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('tgl_penimbangan')}}">

                            @if($errors->has('tgl_penimbangan'))
                              <span class="help-block">{{$errors->first('tgl_penimbangan')}}</span>
                            @endif
                              
                              <i style="font-size:12px; color:red;">*Format : 2010-01-05</i>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Nama petugas lapangan yang membina</label>
                            <input name = "petugas_lapangan" type="text" class="form-control {{$errors->has('petugas_lapangan')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('petugas_lapangan')}}">

                            @if($errors->has('petugas_lapangan'))
                              <span class="help-block">{{$errors->first('petugas_lapangan')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah kader yang ada</label>
                            <select name = "jumlah_kader" type="text" class="form-control {{$errors->has('jumlah_kader')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('jumlah_kader')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=10;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('jumlah_kader'))
                              <span class="help-block">{{$errors->first('jumlah_kader')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah kader yang aktif bulan ini</label>
                            <select name = "jumlah_kader_aktif" type="text" class="form-control {{$errors->has('jumlah_kader_aktif')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('jumlah_kader_aktif')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=10;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('jumlah_kader_aktif'))
                              <span class="help-block">{{$errors->first('jumlah_kader_aktif')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang ada di posyandu bulan ini (S)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "s_5" type="text" class="form-control {{$errors->has('s_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_5'))
                              <span class="help-block">{{$errors->first('s_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "s_11" type="text" class="form-control {{$errors->has('s_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_11'))
                              <span class="help-block">{{$errors->first('s_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "s_23" type="text" class="form-control {{$errors->has('s_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_23'))
                              <span class="help-block">{{$errors->first('s_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "s_59" type="text" class="form-control {{$errors->has('s_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_59'))
                              <span class="help-block">{{$errors->first('s_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "s_total" type="text" class="form-control {{$errors->has('s_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('s_total'))
                              <span class="help-block">{{$errors->first('s_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah semua balita yang terdaftar dan mempunyai KMS bulan ini (K)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "k_5" type="text" class="form-control {{$errors->has('k_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('s_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_5'))
                              <span class="help-block">{{$errors->first('k_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "k_11" type="text" class="form-control {{$errors->has('k_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_11'))
                              <span class="help-block">{{$errors->first('k_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "k_23" type="text" class="form-control {{$errors->has('k_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_23'))
                              <span class="help-block">{{$errors->first('k_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "k_59" type="text" class="form-control {{$errors->has('k_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_59'))
                              <span class="help-block">{{$errors->first('k_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "k_total" type="text" class="form-control {{$errors->has('k_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('k_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('k_total'))
                              <span class="help-block">{{$errors->first('k_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang naik berat badannya bulan ini (N)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "n_5" type="text" class="form-control {{$errors->has('n_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_5'))
                              <span class="help-block">{{$errors->first('n_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "n_11" type="text" class="form-control {{$errors->has('n_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_11'))
                              <span class="help-block">{{$errors->first('n_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "n_23" type="text" class="form-control {{$errors->has('n_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_23'))
                              <span class="help-block">{{$errors->first('n_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "n_59" type="text" class="form-control {{$errors->has('n_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_59'))
                              <span class="help-block">{{$errors->first('n_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "n_total" type="text" class="form-control {{$errors->has('n_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('n_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('n_total'))
                              <span class="help-block">{{$errors->first('n_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang tidak naik berat badannya bulan ini (T)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "t_5" type="text" class="form-control {{$errors->has('t_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_5'))
                              <span class="help-block">{{$errors->first('t_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "t_11" type="text" class="form-control {{$errors->has('t_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_11'))
                              <span class="help-block">{{$errors->first('t_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "t_23" type="text" class="form-control {{$errors->has('t_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_23'))
                              <span class="help-block">{{$errors->first('t_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "t_59" type="text" class="form-control {{$errors->has('t_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_59'))
                              <span class="help-block">{{$errors->first('t_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "t_total" type="text" class="form-control {{$errors->has('t_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('t_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('t_total'))
                              <span class="help-block">{{$errors->first('t_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang ditimbang bulan ini tetapi tidak ditimbang bulan lalu (O)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "o_5" type="text" class="form-control {{$errors->has('o_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_5'))
                              <span class="help-block">{{$errors->first('o_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "o_11" type="text" class="form-control {{$errors->has('o_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_11'))
                              <span class="help-block">{{$errors->first('o_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "o_23" type="text" class="form-control {{$errors->has('o_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_23'))
                              <span class="help-block">{{$errors->first('o_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "o_59" type="text" class="form-control {{$errors->has('o_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_59'))
                              <span class="help-block">{{$errors->first('o_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "o_total" type="text" class="form-control {{$errors->has('o_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('o_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('o_total'))
                              <span class="help-block">{{$errors->first('o_total')}}</span>
                            @endif
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">Jumlah balita yang baru pertama kali hadir di posyandu bulan ini (B)</label>
                          </div>

                          <div class="form-group">
                            <label for="id_kriteria">0-5 Bulan</label>
                            <select name = "b_5" type="text" class="form-control {{$errors->has('b_5')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_5')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_5'))
                              <span class="help-block">{{$errors->first('b_5')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">6-11 Bulan</label>
                            <select name = "b_11" type="text" class="form-control {{$errors->has('b_11')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_11')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_11'))
                              <span class="help-block">{{$errors->first('b_11')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">12-23 Bulan</label>
                            <select name = "b_23" type="text" class="form-control {{$errors->has('b_23')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_23')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_23'))
                              <span class="help-block">{{$errors->first('b_23')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">24-59 Bulan</label>
                            <select name = "b_59" type="text" class="form-control {{$errors->has('b_59')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_59')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_59'))
                              <span class="help-block">{{$errors->first('b_59')}}</span>
                            @endif
                          </div>

                           <div class="form-group">
                            <label for="id_kriteria">Total</label>
                            <select name = "b_total" type="text" class="form-control {{$errors->has('b_total')?'is-invalid':''}}" aria-describedby="emailHelp" value="{{old('b_total')}}">
                               <option selected="selected"></option>
                              <?php
                                for($i=1;$i<=100;$i++){
                                  echo"<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>

                            @if($errors->has('b_total'))
                              <span class="help-block">{{$errors->first('b_total')}}</span>
                            @endif
                          </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- Modal Import-->
             <div class="modal fade" id="importxls" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                      
                      </div>
                      <div class="modal-footer">
                      <input type=submit class="btn btn-sm btn-primary" value='Import'>
                      </div>
                    </div>
                  </div>
                </div>
      </div>
     
</section>

@endsection

@push('js')
<script type="text/javascript">
  $(document).ready(function () {
    var table = $("#LaporanTabel").DataTable({
        scrollY : true,
        scrollCollapse: true,
        responsive: true,
    });

    table.on('click','.Edit',function(){

      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')){
        $tr = $tr.prev ('.parent');
      }

      var data = table.row($tr).data();
      var DataLaporan_edit = $(this).attr('DataLaporan-edit');
      console.log(data);

      
      $('#laporan_bulan').val(data[0]);
      $('#tgl_penimbangan').val(data[1]);
      $('#jumlah_kader').val(data[2]);


      $('#EditLaporanForm').attr('action', '/update/'+DataLaporan_edit);
      $('#EditLaporanModal').modal('show');

    });

    table.on('click','.delete',function(){
        var DataLaporan_hapus = $(this).attr('DataLaporan-hapus');
        swal({
          title: "Yakin ?",
          text: "Akan menghapus laporan dengan id " +DataLaporan_hapus+ " ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => { //promise
          if (willDelete) {
            window.location = "/laporan/"+DataLaporan_hapus+"/hapus";
           
          } else {
            swal("File anda aman!");
          }
        });
    });
    $('#datepicker').datepicker({
    timepicker : false,
    datepicker : true,
    uiLibrary: 'bootstrap4',
    format : 'yyyy-mm-dd'
    });
                            
  });
</script>
@endpush