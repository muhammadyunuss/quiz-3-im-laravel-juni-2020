@extends('layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Artikel</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tabel Artikel</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($artikel as $row)
                    <td>
                        <div class="card shadow mb-8">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                              <h6 class="m-0 font-weight-bold text-primary">Judul : {{$row->judul}}</h6>
                              <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="btn btn-primary">Pilih</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                  <div class="dropdown-header">Aksi</div>
                                  <a class="dropdown-item" href="/artikel/{{$row->id}}">Lihat</a>
                                  <a class="dropdown-item" href="/artikel/{{$row->id}}/edit">Edit</a>
                                  <a title="Delete Artikel" class="dropdown-item confirmDelete" recordid="{{ $row->id }}" href="javascript:void(0)">Hapus</i></a>
                                    <form id="formdelete" action="/artikel/{{$row['id']}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <?php //<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"><a title="Delete Pertanyaan dan Jawaban" class="confirmDelete" recordid="{{ $row->id }}" href="javascript:void(0)"><i class="fas fa-trash"></i></a></i></button> ?>
                                    </form>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Selamat Mencoba !!</a>
                                </div>
                              </div>
                            </div>
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                Slug : {{$row->slug}}
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                {{$row->isi}}
                            </div>
                            <div class="card-body">
                                <?php
                                        $tagging = $row->tag;
                                        $tager = explode("#",$tagging);
                                        ?>
                                        @foreach ($tager as $item)
                                            @if (!empty($item))
                                            <a href="#" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-flag"></i>
                                                </span>
                                            <span class="text">{{$item}}</span>
                                          </a>
                                            @endif
                                        @endforeach
                            </div>
                          </div>
                     </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                <th>Name</th>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection
@push('datatables')
  <script>
      // Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

  </script>
  @endpush

  @push('konfirmdelete')
<!-- Sweet Alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(".confirmDelete").click(function () {
        var recordid = $(this).attr('recordid');
        Swal.fire({
            title: 'Apa anda yakin menghapus file?',
            text: "Anda tidak akan dapat mengembalikan file ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus File!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Berhasil Dihapus!',
                    'File Sudah Terhapus.',
                    'success'
                )
                document.getElementById("formdelete").submit();
            }
        });
    });
    </script>
@endpush
