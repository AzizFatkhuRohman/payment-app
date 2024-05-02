@extends('layouts.app')
@section('main')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session('create'))
<script>
    // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Success',
        text: '{{ session('create') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
@if(session('update'))
<script>
    // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Update',
        text: '{{ session('update') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
@if(session('delete'))
<script>
    // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Delete',
        text: '{{ session('delete') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Table Periode</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Table Periode</li>
                </ol>
            </nav>
        </div>

    </div>
</div>

<div class="container-fluid">

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2> Data Periode <small>List dari data Periode</small></h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bulan</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                    name="bulan">
                                                    <option value="Januari">Januari</option>
                                                    <option value="Februari">Februari</option>
                                                    <option value="Maret">Maret</option>
                                                    <option value="April">April</option>
                                                    <option value="Mei">Mei</option>
                                                    <option value="Juni">Juni</option>
                                                    <option value="Juli">Juli</option>
                                                    <option value="Agustus">Agustus</option>
                                                    <option value="September">September</option>
                                                    <option value="Oktober">Oktober</option>
                                                    <option value="November">November</option>
                                                    <option value="Desember">Desember</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Tahun</label>
                                                <input type="number" class="form-control" id="exampleInputPassword1"
                                                    name="tahun">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>

                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                            <thead>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($collection as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->bulan}}</td>
                                    <td>{{$item->tahun}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#exampleModal{{$item->id_periode}}">
                                            <i class="icon-pencil"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$item->id_periode}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Periode
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('periode/edit/'.$item->id_periode)}}" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Bulan</label>
                                                                <select class="form-control"
                                                                    id="exampleFormControlSelect1" name="bulan">
                                                                    <option value="{{$item->bulan}}">{{$item->bulan}}
                                                                    </option>
                                                                    <option value="Januari">Januari</option>
                                                                    <option value="Februari">Februari</option>
                                                                    <option value="Maret">Maret</option>
                                                                    <option value="April">April</option>
                                                                    <option value="Mei">Mei</option>
                                                                    <option value="Juni">Juni</option>
                                                                    <option value="Juli">Juli</option>
                                                                    <option value="Agustus">Agustus</option>
                                                                    <option value="September">September</option>
                                                                    <option value="Oktober">Oktober</option>
                                                                    <option value="November">November</option>
                                                                    <option value="Desember">Desember</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Tahun</label>
                                                                <input type="number" class="form-control"
                                                                    id="exampleInputPassword1" name="tahun"
                                                                    value="{{$item->tahun}}">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('periode/delete/'.$item->id_periode)}}" method="post"
                                            id="hapusPeriode">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="clickHapusPeriode()"
                                                class="btn btn-danger btn-sm" style="margin-top: 2px"><i
                                                    class="icon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
    function clickHapusPeriode() {
      Swal.fire({
          title: 'Konfirmasi',
          text: 'Apakah Anda yakin ingin menghapus ini?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('hapusPeriode').submit();
          }
      });
      
  }
</script>
@endsection