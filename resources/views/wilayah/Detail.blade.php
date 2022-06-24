@extends('layouts.master')
@section('title')
Data Anak Posyandu | TA Silvi 2020
@stop
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Anak</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/wilayah">Wilayah</a></li>
              <li class="breadcrumb-item active">Data Anak</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <div class="float-left">
                <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#DataAnakModal">
                <i class="fas fa-plus pr-2"></i>Tambah Data</button>
              </div>
              <div class="float-right">
              <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#importxls">
                <i class="fas fa-file-upload pr-2"></i>Import XLS</button>
                <a href="/wilayah/{posyandu}/detail/exportexcel" type="button" class="btn btn-primary btn-sm " >
                <i class="fas fa-file-download pr-2"></i>Export XLS</a>
              </div>
              </div>
              <!--tab tabel-->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <table id="tabelAnak" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Nama Balita</th>
                          <th>Jenis Kelamin</th>
                          <th>Status Gizi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data_anak as $anak)
                        <tr>
                        <th scope="row">{{$anak->nama}}</th>
                        <td>{{$anak->kelamin}}</td>
                        <td>{{$anak->gizi}}   </td>
                          <td>
                            <a href="#" class="btn btn-warning btn-sm text-white Edit" anak-edit="{{$anak->id}}" anak-nama="{{$anak->nama}}"anak-posyandu="{{$anak->posyandu}}"><i class="far fa-edit mr-1"></i>Edit</a>
                            <a href="#" class="btn btn-danger btn-sm delete" anak-hapus="{{$anak->id}}" anak-nama="{{$anak->nama}}"anak-posyandu="{{$anak->posyandu}}"><i class="far fa-trash-alt mr-1"></i>Hapus</a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        
                      </tfoot>
                    </table>
                  </div>
              <!-- Modal Tambah Kriteria-->
               <div class="modal fade " id="DataAnakModal" tabindex="-1" role="dialog" aria-labelledby="KriteriaModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content card-primary card-outline">
                      <div class="modal-header">
                        <h5 class="modal-title" id="KriteriaModalLabel">Tambah Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action="/wilayah/data-anak/tambah" method="POST">
                      {{csrf_field()}}
                          <div class="form-group">
                            <label for="id_kriteria">Posyandu</label>
                            <select name="posyandu" id="alternatif" class="form-control {{$errors->has('posyandu')? 'is-invalid':''}} alternatif" id="exampleFormControlSelect1">
                            <option>---Pilih---</option>
                              @foreach ($data_wilayah as $wilayah)
                                <option value="{{$wilayah->posyandu}}">{{$wilayah->posyandu}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('posyandu'))
                              <span class="help-block">{{$errors->first('posyandu')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_alternatif">Nama Anak</label>
                            <input name = "nama" type="text" class="form-control" aria-describedby="emailHelp">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="kelamin" class="form-control {{$errors->has('kelamin')? 'is-invalid':''}}" id="">
                              <option value="Laki-laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                            @if($errors->has('kelamin'))
                              <span class="help-block">{{$errors->first('kelamin')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_alternatif">Status Gizi </label>
                            <input name = "gizi" type="text" class="form-control" aria-describedby="emailHelp">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
              <!-- Modal Edit Kriteria-->
               <div class="modal fade " id="EditAnakModal" tabindex="-1" role="dialog" aria-labelledby="KriteriaModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content card-primary card-outline">
                      <div class="modal-header">
                        <h5 class="modal-title" id="KriteriaModalLabel">Tambah Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action="/update-anak" method="POST" id="EditAnakForm">
                      {{csrf_field()}}
                      {{method_field('PUT')}}

                          <div class="form-group">
                            <label for="id_kriteria">Posyandu</label>
                            <select name="posyandu" id="alternatif" class="form-control {{$errors->has('posyandu')? 'is-invalid':''}} alternatif" id="exampleFormControlSelect1">
                            <option>---Pilih---</option>
                              @foreach ($data_wilayah as $wilayah)
                                <option value="{{$wilayah->posyandu}}">{{$wilayah->posyandu}}</option>
                              @endforeach
                            </select>
                            @if($errors->has('posyandu'))
                              <span class="help-block">{{$errors->first('posyandu')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_alternatif">Nama Anak</label>
                            <input name = "nama" type="text" class="form-control" aria-describedby="emailHelp">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="kelamin" class="form-control {{$errors->has('kelamin')? 'is-invalid':''}}" id="">
                              <option value="Laki-laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                            @if($errors->has('kelamin'))
                              <span class="help-block">{{$errors->first('kelamin')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_alternatif">Status Gizi </label>
                            <input name = "gizi" type="text" class="form-control" aria-describedby="emailHelp">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
            </div>
             <!-- Modal Import-->
                <div class="modal fade" id="importxls" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content card-success card-outline">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body ">
                        {!!Form::open(['route' => 'anak.import' , 'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ])!!}

                        {!!Form::file('data_anak')!!}
                      </div>
                      <div class="modal-footer">
                      <input type=submit class="btn btn-sm btn-success" value='Import'>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
            
        </div>
      </div>
    </div>
      
    </section>

@stop

@push('js')
<script>
  $(document).ready(function() {
   var table = $("#tabelAnak").DataTable({
     
   });
        table.on('click','.Edit',function(){

            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
              $tr = $tr.prev ('.parent');
            }

            var data = table.row($tr).data();
            var anak_edit = $(this).attr('anak-edit');
            console.log(data);

            //id edit model
            $('#EditAlternatif').val(data[0]);
            $('#nama').val(data[1]);
            $('#makan').val(data[2]);
            $('#infeksi').val(data[3]);
            $('#sanitasi').val(data[4]);
            $('#asuh').val(data[5]);
            $('#pangan').val(data[6]);
            $('#miskin').val(data[7]);
            $('#pendidikan').val(data[8]); //data sesuaikan


            $('#EditAnakForm').attr('action', '/update-anak/'+anak_edit);
            $('#EditAnakModal').modal('show');

        });
        table.on('click','.delete',function(){
            var anak_id = $(this).attr('anak-hapus');
            var anak_nama = $(this).attr('anak-nama');
            var anak_posyandu = $(this).attr('anak-posyandu');
            swal({
              title: "Yakin ?",
              text: "Mau Dihapus data Anak " +anak_nama+ " ?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => { //promise
              if (willDelete) {
                window.location = "/data-anak/"+anak_id+"/hapus";
              
              } else {
                swal("File anda aman!");
              }
            });
      });
  });
</script>
@endpush

