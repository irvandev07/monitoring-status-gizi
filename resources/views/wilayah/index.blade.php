@extends('layouts.master')
@section('title')
Wilayah | TA Silvi 2020
@stop
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Wilayah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Wilayah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
      
          <div class="col-12">
            <div class="card">
            <div class="card-header border-0">
            <div class="float-left">
                <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#KriteriaModal">
                <i class="fas fa-plus pr-2"></i>Tambah Wilayah</button>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabelwilayah" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Posyandu</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data_wilayah as $wilayah)
                      <tr>
                      <th scope="row">{{$wilayah->id}}</th>
                        <td>{{$wilayah->posyandu}}</td>
                        <td>{{$wilayah->alamat}}</td>
                        <td>
                          <a href="/wilayah/{{$wilayah->posyandu}}/detail" class="btn btn-warning btn-sm text-white"><i class="far fa-eye mr-1"></i>Detail</a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Posyandu</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
                <!-- Modal tambah-->
              <div class="modal fade" id="KriteriaModal" tabindex="-1" role="dialog" aria-labelledby="KriteriaModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="KriteriaModalLabel">Tambah Data posyandu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action=/wilayah/tambah method="POST">
                      {{csrf_field()}}
                          <div class="form-group">
                            <label for="id_alternatif">Id Alternatif</label>
                            <input name = "alternatif" type="text" class="form-control {{$errors->has('alternatif')? 'is-invalid':''}}" aria-describedby="emailHelp">
                            
                             @if($errors->has('alternatif'))
                              <span class="help-block">{{$errors->first('alternatif')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_alternatif">Nama Posyandu</label>
                            <input name = "posyandu" type="text" class="form-control {{$errors->has('posyandu')? 'is-invalid':''}}" aria-describedby="emailHelp">

                            @if($errors->has('posyandu'))
                              <span class="help-block">{{$errors->first('posyandu')}}</span>
                            @endif
                          </div>
                          <div class="form-group">
                            <label for="id_alternatif">Alamat Posyandu </label>
                            <input name = "alamat" type="text" class="form-control {{$errors->has('alamat')? 'is-invalid':''}}"  aria-describedby="emailHelp">

                             @if($errors->has('alamat'))
                              <span class="help-block">{{$errors->first('alamat')}}</span>
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
                        {!!Form::open(['route' => 'wilayah.import' , 'class' => 'form-horizontal' , 'enctype' => 'multipart/form-data' ])!!}

                        {!!Form::file('data_wilayah')!!}
                      </div>
                      <div class="modal-footer">
                      <input type=submit class="btn btn-sm btn-primary" value='Import'>
                      </div>
                    </div>
                  </div>
                </div>
      </div>
</section>

@stop

@push('js')
<script>
  $(function () {
    $("#tabelwilayah").DataTable({
        scrollY : true,
        scrollCollapse: true,
        responsive: true,
    });
  });
</script>
@endpush




