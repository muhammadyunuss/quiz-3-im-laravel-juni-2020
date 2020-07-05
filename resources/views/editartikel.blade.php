@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Edit Artikel</h1>
              </div>
              <form action="/artikel/{{$getArtikel['id']}}" method="POST" class="user">@csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul"><h4>Judul</h4></label>
                  <input type="text" class="form-control form-control-user" id="judul" name="judul" value="{{$getArtikel['judul']}}" placeholder="Enter....">
                </div>
                <div class="form-group">
                    <label for="iis"><h4>Isi</h4></label>
                    <textarea class="form-control form-control-user" name="isi" id="isi" cols="auto" rows="auto" placeholder="Enter....">{{$getArtikel['isi']}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="judul"><h4>Tag</h4></label>
                  <input type="text" class="form-control form-control-user" id="tag" name="tag" value="{{$getArtikel['tag']}}" placeholder="info php laravel">
                  <span>Berikan "#" Untuk Kata Kunci Misal: #Php #Artikel</span>
                </div>

                <hr>

                <button class="btn btn-facebook btn-user btn-block" type="submit">Submit</button>

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>

  </div>
  <!-- /.container-fluid -->
@endsection

