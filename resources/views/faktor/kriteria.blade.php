@extends('layouts.master')
@section('title')
Kriteria | TA Silvi 2020
@stop

@section('content')
<!-- Content Header (Page header) -->

<style>
.btn-circle {
    width: 25px;
    height: 25px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
</style>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Faktor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Faktor</li>
              <li class="breadcrumb-item active">Data Faktor</li>
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
            <div class="float-left">
                <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#KriteriaModal">
                <i class="fas fa-plus pr-2"></i>Tambah Data</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tablekriteria" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Posyandu</th>
                  <th>Asupan Makan</th>
                  <th>Intefeksi</th>
                  <th>Sanitasi</th>
                  <th>Pola Asuh</th>
                  <th>Pangan</th>
                  <th>Kemiskinan </th>
                  <th>Pendidikan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data_kriteria as $data_kriteria)
                      <tr>
                        <th scope="row">{{$data_kriteria->alternatif}}</th>
                        <td>{{$data_kriteria->nama}}</td>
                        <td>{{$data_kriteria->makan}}</td>
                        <td>{{$data_kriteria->infeksi}}</td>
                        <td>{{$data_kriteria->sanitasi}}</td>
                        <td>{{$data_kriteria->asuh}}</td>
                        <td>{{$data_kriteria->pangan}}</td>
                        <td>{{$data_kriteria->miskin}}</td>
                        <td>{{$data_kriteria->pendidikan}}</td>
                        <td>
                          <!--<a href="/kriteria/{{$data_kriteria->id}}/edit" class="btn btn-warning btn-sm text-white edit">Edit</a> -->
                          <a href="#" class="btn btn-warning btn-sm  text-white Edit" kriteria-edit="{{$data_kriteria->id}}"><i class="fas fa-pencil-alt"></i></a>
                          <a href="#" class="btn btn-danger btn-sm delete" kriteria-hapus="{{$data_kriteria->id}}" kriteria-nama="{{$data_kriteria->nama}}"><i class="far fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    @endforeach
                     
                    </tbody>
                <tfoot>
                    <tr>
                      <th>#ID</th>
                      <th>Posyandu</th>
                      <th>(C1)</th>
                      <th>(C2)</th>
                      <th>(C3)</th>
                      <th>(C4)</th>
                      <th>(C5)</th>
                      <th>(C6)</th>
                      <th>(C7) </th>
                      <th>Aksi</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            </div>
          </div>
               <!-- Modal Tambah Kriteria-->
               <div class="modal fade " id="KriteriaModal" tabindex="-1" role="dialog" aria-labelledby="KriteriaModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content card-primary card-outline">
                      <div class="modal-header">
                        <h5 class="modal-title" id="KriteriaModalLabel">Tambah Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action=/kriteria/tambah method="POST">
                      {{csrf_field()}}
                          <div class="form-group">
                            <label for="id_kriteria">Alternatif</label>
                            <select name="alternatif" id="alternatif" class="form-control {{$errors->has('nama')? 'is-invalid':''}} alternatif" id="exampleFormControlSelect1">
                            <option>---Pilih---</option>
                            @foreach ($data_wilayah as $wilayah)
                              <option value="{{$wilayah->id}}">{{$wilayah->alternatif}}</option>
                            @endforeach
                            </select>
                            @if($errors->has('alternatif'))
                              <span class="help-block">{{$errors->first('alternatif')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_kriteria">Nama Posyandu</label>
                            
                            <input name="nama" class="form-control {{$errors->has('nama')? 'is-invalid':''}} posyandu" id="posyandu" readonly value="">
                            </input>
                            @if($errors->has('nama'))
                              <span class="help-block">{{$errors->first('nama')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Asupan Makan</label>
                            <select name="makan" class="form-control {{$errors->has('makan')? 'is-invalid':''}}" id="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            @if($errors->has('makan'))
                              <span class="help-block">{{$errors->first('makan')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Infeksi Penyakit</label>
                            <select name="infeksi" class="form-control {{$errors->has('infeksi')? 'is-invalid':''}}" id="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            @if($errors->has('infeksi'))
                              <span class="help-block">{{$errors->first('infeksi')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Sanitasi</label>
                            <select name="sanitasi" class="form-control {{$errors->has('sanitasi')? 'is-invalid':''}}" id="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            @if($errors->has('sanitasi'))
                              <span class="help-block">{{$errors->first('sanitasi')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Pola Asuh</label>
                            <select name="asuh" class="form-control {{$errors->has('asuh')? 'is-invalid':''}}" id="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            @if($errors->has('asuh'))
                              <span class="help-block">{{$errors->first('asuh')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Ketersediaan Pangan </label>
                            <select name="pangan" class="form-control {{$errors->has('pangan')? 'is-invalid':''}}" id="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            @if($errors->has('pangan'))
                              <span class="help-block">{{$errors->first('pangan')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Kemiskinan</label>
                            <select name="miskin" class="form-control {{$errors->has('miskin')? 'is-invalid':''}}" id="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            @if($errors->has('miskin'))
                              <span class="help-block">{{$errors->first('miskin')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Pendidikan</label>
                            <select name="pendidikan" class="form-control {{$errors->has('pendidikan')? 'is-invalid':''}}" id="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                            @if($errors->has('pendidikan'))
                              <span class="help-block">{{$errors->first('pendidikan')}}</span>
                            @endif
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
                <!-- Modal edit Kriteria-->
               <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="KriteriaModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content card-warning card-outline">
                      <div class="modal-header">
                        <h5 class="modal-title" id="KriteriaModalLabel">Update Data Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action="/update" method="POST" id="editForm">
                      {{csrf_field()}}
                      {{method_field('PUT')}}

                          <div class="form-group">
                            <label for="id_kriteria">Alternatif</label>
                            <input name ="alternatif" type="text" class="form-control" id="EditAlternatif" readonly>
                            @if($errors->has('Alternatif'))
                              <span class="help-block">{{$errors->first('Alternatif')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_kriteria">Nama Posyandu</label>
                            <input name = "nama" type="text" class="form-control" id="nama" aria-describedby="emailHelp">
                            @if($errors->has('nama'))
                              <span class="help-block">{{$errors->first('nama')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Asupan Makan</label>
                            <select id="makan" name="makan" class="form-control {{$errors->has('makan')? 'is-invalid':''}}" id="">
                              <option value="1" {{old('makan')}}>1</option>
                              <option value="2" {{old('makan')}}>2</option>
                              <option value="3" {{old('makan')}}>3</option>
                              <option value="4" {{old('makan')}}>4</option>
                              <option value="5" {{old('makan')}}>5</option>
                            </select>
                            @if($errors->has('makan'))
                              <span class="help-block">{{$errors->first('makan')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Infeksi Penyakit</label>
                            <select id="infeksi" name="infeksi" class="form-control {{$errors->has('infeksi')? 'is-invalid':''}}" id="">
                              <option value="1" {{old('infeksi')}}>1</option>
                              <option value="2" {{old('infeksi')}}>2</option>
                              <option value="3" {{old('infeksi')}}>3</option>
                              <option value="4" {{old('infeksi')}}>4</option>
                              <option value="5" {{old('infeksi')}}>5</option>
                            </select>
                            @if($errors->has('infeksi'))
                              <span class="help-block">{{$errors->first('infeksi')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Sanitasi</label>
                            <select id="sanitasi" name="sanitasi" class="form-control {{$errors->has('sanitasi')? 'is-invalid':''}}" id="exampleFormControlSelect1">
                              <option value="1" {{old('sanitasi')}}>1</option>
                              <option value="2" {{old('sanitasi')}}>2</option>
                              <option value="3" {{old('sanitasi')}}>3</option>
                              <option value="4" {{old('sanitasi')}}>4</option>
                              <option value="5" {{old('sanitasi')}}>5</option>
                            </select>
                            @if($errors->has('sanitasi'))
                              <span class="help-block">{{$errors->first('sanitasi')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Pola Asuh</label>
                            <select id="asuh" name="asuh" class="form-control {{$errors->has('asuh')? 'is-invalid':''}}">
                              <option value="1" {{old('asuh')}}>1</option>
                              <option value="2" {{old('asuh')}}>2</option>
                              <option value="3" {{old('asuh')}}>3</option>
                              <option value="4" {{old('asuh')}}>4</option>
                              <option value="5" {{old('asuh')}}>5</option>
                            </select>
                            @if($errors->has('asuh'))
                              <span class="help-block">{{$errors->first('asuh')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Ketersediaan Pangan </label>
                            <select id="pangan" name="pangan" class="form-control {{$errors->has('pangan')? 'is-invalid':''}}" i>
                              <option value="1" {{old('pangan')}}>1</option>
                              <option value="2" {{old('pangan')}}>2</option>
                              <option value="3" {{old('pangan')}}>3</option>
                              <option value="4" {{old('pangan')}}>4</option>
                              <option value="5" {{old('pangan')}}>5</option>
                            </select>
                            @if($errors->has('pangan'))
                              <span class="help-block">{{$errors->first('pangan')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Kemiskinan</label>
                            <select id="miskin" name="miskin" class="form-control {{$errors->has('miskin')? 'is-invalid':''}}" >
                              <option value="1" {{old('miskin')}}>1</option>
                              <option value="2" {{old('miskin')}}>2</option>
                              <option value="3" {{old('miskin')}}>3</option>
                              <option value="4" {{old('miskin')}}>4</option>
                              <option value="5" {{old('miskin')}}>5</option>
                            </select>
                            @if($errors->has('miskin'))
                              <span class="help-block">{{$errors->first('miskin')}}</span>
                            @endif
                          </div><div class="form-group">
                            <label for="exampleFormControlSelect1">Pendidikan</label>
                            <select id="pendidikan" name="pendidikan" class="form-control {{$errors->has('pendidikan')? 'is-invalid':''}}" >
                              <option value="1" {{old('pendidikan')}}>1</option>
                              <option value="2" {{old('pendidikan')}}>2</option>
                              <option value="3" {{old('pendidikan')}}>3</option>
                              <option value="4" {{old('pendidikan')}}>4</option>
                              <option value="5" {{old('pendidikan')}}>5</option>
                            </select>
                            @if($errors->has('pendidikan'))
                              <span class="help-block">{{$errors->first('pendidikan')}}</span>
                            @endif
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning text-white">Update</button>
                      </div>
                    </form>
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
                        {!!Form::open(['route' => 'kriteria.import' , 'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ])!!}

                        {!!Form::file('data_kriteria')!!}
                      </div>
                      <div class="modal-footer">
                      <input type=submit class="btn btn-sm btn-success" value='Import'>
                      </div>
                    </div>
                  </div>
                </div>
      </div>
</section>
@stop

@push('js')
<script type="text/javascript">
  $(document).ready(function () {
    var table = $("#tablekriteria").DataTable({
      responsive: true,
      scrollCollapse: true,
    });

    table.on('click','.Edit',function(){

      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')){
        $tr = $tr.prev ('.parent');
      }

      var data = table.row($tr).data();
      var kriteria_edit = $(this).attr('kriteria-edit');
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


      $('#editForm').attr('action', '/update/'+kriteria_edit);
      $('#EditModal').modal('show');

    });

    table.on('click','.delete',function(){
        var kriteria_id = $(this).attr('kriteria-hapus');
        var kriteria_nama = $(this).attr('kriteria-nama');
        swal({
          title: "Yakin ?",
          text: "Mau Dihapus data kriteria " +kriteria_nama+ " ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => { //promise
          if (willDelete) {
            window.location = "/kriteria/"+kriteria_id+"/hapus";
           
          } else {
            swal("File anda aman!");
          }
        });
    });

    $(document).on('change','.alternatif',function(){
      var id=$(this).val();
      var a=$(this).parent();
      console.log(id);
      var op="";
      $.ajax({
        type:'get',
        url:'{!!URL::to('findAlternatif')!!}',
        data:{'id':id},
        dataType:'json',//return data will be json
        success:function(data){
          console.log("posyandu");
          console.log(data.posyandu);
          $('#posyandu').val(data.posyandu);

        },
				error:function(){
				}
    });
  });
});
</script>
@endpush

          
