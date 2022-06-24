@extends('layouts.master')
@section('title')
Profile
@stop

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('adminLTE/img/avatar_icon3.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                <p class="text-muted text-center">Admin Puskesmas</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right mr-3">{{auth()->user()->username}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Pekerjaan</b> <a class="float-right mr-3">Admin</a>
                  </li>
                  <li class="list-group-item">
                    <b>Divisi</b> <a class="float-right mr-3">Puskesmas Balita</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@stop