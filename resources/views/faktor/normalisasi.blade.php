@extends('layouts.master')
@section('title')
Hasil | TA Silvi 2020
@stop
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hasil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Faktor</li>
              <li class="breadcrumb-item active">Hasil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      
</section>

<section class="content">
      <div class="container-fluid">
      <!-- Button trigger modal -->
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Normalisasi</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="tabelkriteria" class="table table-bordered table-striped">
                        <thead>
                          <tr class="bg-primary">
                            <th>#ID </th>
                            <th>Posyandu</th>
                            <th>Asupan Makan</th>
                            <th>Intefeksi</th>
                            <th>Sanitasi</th>
                            <th>Pola Asuh</th>
                            <th>Pangan</th>
                            <th>Kemiskinan </th>
                            <th>Pendidikan</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                        <tfoot>
                          <tr class="bg-primary">
                              <th>#ID </th>
                              <th>Posyandu</th>
                              <th>(C1)</th>
                              <th>(C2)</th>
                              <th>(C3)</th>
                              <th>(C4)</th>
                              <th>(C5)</th>
                              <th>(C6)</th>
                              <th>(C7) </th>
                          </tr>
                        </tfoot>
                      </table>
              </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Normalisasi Berbobot</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="normalisasibobot" class="table table-bordered table-striped ">
                        <thead>
                          <tr class="bg-primary">
                            <th>#ID</th>
                            <th>Posyandu</th>
                            <th>Asupan Makan</th>
                            <th>Infeksi</th>
                            <th>Sanitasi</th>
                            <th>Pola Asuh</th>
                            <th>Pangan</th>
                            <th>Kemiskinan </th>
                            <th>Pendidikan</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                          
                        </tbody>
                        <tfoot>
                          <tr class="bg-primary">
                              <th>#ID</th>
                              <th>Posyandu</th>
                              <th>(C1)</th>
                              <th>(C2)</th>
                              <th>(C3)</th>
                              <th>(C4)</th>
                              <th>(C5)</th>
                              <th>(C6)</th>
                              <th>(C7) </th>
                          </tr>
                        </tfoot>
                      </table>
              </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Solusi Ideal</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="SolusiIdeal" class="table table-bordered table-striped">
                        <thead>
                          <tr class="bg-primary">
                            <th>Nilai</th>
                            <th>Asupan Makan</th>
                            <th>Infeksi</th>
                            <th>Sanitasi</th>
                            <th>Pola Asuh</th>
                            <th>Pangan</th>
                            <th>Kemiskinan </th>
                            <th>Pendidikan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td><b>Y MIN</b></td>
                              <td>{{$solusi['c1']['negatif']}}</td>
                              <td>{{$solusi['c2']['negatif']}}</td>
                              <td>{{$solusi['c3']['negatif']}}</td>
                              <td>{{$solusi['c4']['negatif']}}</td>
                              <td>{{$solusi['c5']['negatif']}}</td>
                              <td>{{$solusi['c6']['negatif']}}</td>
                              <td>{{$solusi['c7']['negatif']}}</td>
                          </tr>
                          <tr>
                              <td><b>Y MAX</b></td>
                              <td>{{$solusi['c1']['positif']}} </td>
                              <td>{{$solusi['c2']['positif']}}</td>
                              <td>{{$solusi['c3']['positif']}}</td>
                              <td>{{$solusi['c4']['positif']}}</td>
                              <td>{{$solusi['c5']['positif']}}</td>
                              <td>{{$solusi['c6']['positif']}}</td>
                              <td>{{$solusi['c7']['positif']}}</td>
                          </tr>
                        <tbody>
                  </table>
              </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Jarak Antar Nilai Terbobot</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="PositifNegatif" class="table table-bordered table-striped">
                  <thead>
                    <tr class="bg-primary">
                      <th>#ID</th>
                      <th>Posyandu</th>
                      <th>S+</th>
                      <th>S-</th>
                    </tr>
                  </thead>
                  <tbody>
                              
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Nilai Preferensi</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="Prefensi" class="table table-bordered table-striped table-responsive{-sm|-md|-lg|-xl}">
                  <thead>
                    <tr class="bg-primary">
                      <th>#ID</th>
                      <th>Alternatif</th>
                      <th>Prefensi</th>
                      <th>Rangking</th>
                    </tr>
                  </thead>
                  <tbody>
                              
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
@stop

@push('js')

<script type="text/javascript">
$(document).ready(function() {
  //---------------Tabel Kriteria--------------//
    $("#tabelkriteria").DataTable({
        processing: true,
        serverSide: true,
        scrollY : true,
        scrollX : true,
        scrollCollapse: true,
        responsive: true,
        ajax: '{!! route('admin.topsis.matrix_keputusan_ternormalisasi') !!}',
        order:[0,'desc'],
        columns:[
            {data:'id', name: 'id'},
            {data:'nama', name: 'nama'},
            {data:'r_makan',name:'r_makan'},
            {data:'r_infeksi',name:'r_infeksi'},
            {data:'r_sanitasi',name:'r_sanitasi'},
            {data:'r_asuh',name:'r_asuh'},
            {data:'r_pangan',name:'r_pangan'},
            {data:'r_miskin',name:'r_miskin'},
            {data:'r_pendidikan', name:'r_pendidikan'}                        
        ]         
    });

  //---------------Tabel Alternatif--------------//
  $("#normalisasibobot").DataTable({
        processing: false,
        serverSide: true,
        scrollY : true,
        scrollX : true,
        scrollCollapse: true,
        responsive: true,
        ajax: '{!! route('admin.topsis.matrix_keputusan_terbobot')!!}',
        order:[0,'desc'],
        columns:[
            {data:'id', name: 'id'},
            {data:'nama', name: 'nama'},
            {data:'v_makan',name:'v_makan'},
            {data:'v_infeksi',name:'v_infeksi'},
            {data:'v_sanitasi',name:'v_sanitasi'},
            {data:'v_asuh',name:'v_asuh'},
            {data:'v_pangan',name:'v_pangan'},
            {data:'v_miskin',name:'v_miskin'},
            {data:'v_pendidikan', name:'v_pendidikan'}                      
        ]
  });
  
  $("#SolusiIdeal").DataTable({
        scrollY : true,
        scrollX : true,
        scrollCollapse: true,
        responsive: true,
  });
  $("#PositifNegatif").DataTable({
        processing: true,
        serverSide: true,
        scrollY : true,
        ajax:'{!! route('admin.topsis.jarak_solusi_positif_negatif')!!}',
        order:[0,'desc'],
        columns:[
            {data:'id', name: 'id'},
            {data:'alternatif', name: 'alternatif'},
            {data:'a_total',name:'a_total'},
            {data:'b_total',name:'b_total'},                          
            
        ]
    });
});

//-------------------------------------Preferensi---------------------------//
$(document).ready(function() {
   $("#Prefensi").DataTable({
        processing: true,
        serverSide: true,
        scrollY : true,
        scrollCollapse: true,
        responsive: true,
          ajax:'{!! route('admin.topsis.nilai_preferensi')!!}',
          order:[0,'desc'],
          columns:[
              {data:'id',name:'id'},
              {data:'alternatif', name: 'alternatif'},
              {data:'nilai_preferensi',name:'nilai_preferensi'},
              {data:'rank',name:'rank', defaultContent: ''},
          ],
            drawCallback: function () {
              api = this.api();
              var arr = api.columns(2).data()[0];  //get array of column 2 (nilai_preferensi)
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
});
</script>
@endpush

          
