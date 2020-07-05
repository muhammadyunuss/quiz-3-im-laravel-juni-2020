@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{$getArtikel['judul']}}</h6>
        </div>
        <div class="card-body">
            <p>
                {{$getArtikel['isi']}}
            </p>
      <a style="float: right" href="/artikel" class="btn btn-facebook btn-user">Kembali</a>

        </div>
      </div>

  </div>
  <!-- /.container-fluid -->
@endsection
