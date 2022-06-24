@extends('layouts.master')
@section('title')
Hasil Akhir | TA Silvi 2020
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
                <table id="NilaiAkhir" class="table table-bordered table-striped">
                  <thead>
                    <tr class="bg-primary">
                      <th>#ID </th>
                      <th>Rank</th>
                      <th>Posyandu</th>
                      <th>Preferensi</th>
                      <th>Faktor</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                        
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

    var table = $("#NilaiAkhir").DataTable({
        processing: true,
        scrollY : true,
        serverSide: true,
        scrollCollapse: true,
        responsive: true,
        ajax:'{!! route('admin.topsis.hasil_akhir')!!}',
        order:[0,'desc'],
        columns:[
          {data:'id', name: 'id',visible:false},
          {data:'rank',name:'rank', defaultContent: ''},
          {data:'nama', name: 'nama'},
          {data:'nilai_preferensi',name:'nilai_preferensi',visible:false},
          {
            data:'faktor', name: 'faktor', defaultContent: ''},
          { 
            data: 'jum',      
            data: function(row) {
              return Math.max(
                row.r_makan, 
                row.r_infeksi, 
                row.r_sanitasi,
                row.r_asuh, 
                row.r_pangan, 
                row.r_miskin, 
                row.r_pendidikan)*100 + '  %';
            }
          }
        ],  
        drawCallback: function () {
              api = this.api();
              var arr = api.columns(3).data()[0];  //get array of column 2 (nilai_preferensi)
              console.log(arr);
              var sorted = arr.slice().sort(function(a,b){return b-a});
              var ranks = arr.slice().map(function(v){ return sorted.indexOf(v)+1 });
              console.log(sorted);
              console.log(ranks);
              // interate through each row
              api.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                var data = this.data();
                console.log(data.alternatif, data.nilai_preferensi, ranks[arr.indexOf(data.nilai_preferensi)]);
                data.rank = ranks[arr.indexOf(data.nilai_preferensi)];  //set the rank column = the array index of the nilai_preferensi in the ranked array
            } );
          api.rows().invalidate();
        }
      });
      table
      .order( [ 3, 'rank' ] )
      .draw();
      
} );
</script>

@endpush