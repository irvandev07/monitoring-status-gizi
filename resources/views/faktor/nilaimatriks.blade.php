@extends('layouts.master')
@section('title')
Matriks | TA Silvi 2020
@stop
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hasil Akhir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item ">Faktor</li>
              <li class="breadcrumb-item ">Hasil Akhir</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Nilai Akhir</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example" class="table table-bordered table-striped">
                        <thead>
                          <tr class="bg-primary">
                            <th>Name</th>
                            <th>posyandu 1</th>
                            <th>posyandu 2</th>
                            <th>posyandu 3</th>
                            <th>posyandu 4</th>
                            <th>Factor</th>
                            <th>Max</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>Asupan Makan</td>
                              <td>1.2345</td>
                              <td>2.3456</td>
                              <td>3.4567</td>
                              <td>4.5678</td>
                              <td></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Infeksi Penyakit</td>
                              <td>9.8765</td>
                              <td>3.5454</td>
                              <td>4.2627</td>
                              <td>8.2354</td>
                              <td></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Sanitasi</td>
                              <td>0.5678</td>
                              <td>3.5601</td>
                              <td>0.0121</td>
                              <td>1.3254</td>
                              <td></td>
                              <td></td>
                          </tr>
                           <tr>
                              <td>kemiskinan</td>
                              <td>1.5678</td>
                              <td>1.5601</td>
                              <td>2.0121</td>
                              <td>1.3254</td>
                              <td></td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>Pendidikan</td>
                              <td>2.5678</td>
                              <td>1.5601</td>
                              <td>3.0121</td>
                              <td>1.3254</td>
                              <td></td>
                              <td></td>
                          </tr>
                        </tbody>
                      </table>
              </div>
            </div>
            
          </div>
        </div>
        
</section>

@endsection

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
            
$(document).ready(function() {
    var table = $('#example').DataTable({
    	columnDefs: [
      	{
        	targets: -1,
          render: function (data, type, row) {
          	return Math.max(row[1], row[2], row[3], row[4]);
          }
        }
      ]
    });
} );
</script>

@endpush