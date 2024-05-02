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
            <h1>Table Role</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Table Role</li>
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
                    <h2>Role <small>List dari data role</small></h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah data akun</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Nama</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="nama">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">NIK</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="nik">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputPassword1"
                                                        name="email">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Akses</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="akses">
                                                        <option value="user">user</option>
                                                        <option value="admin">admin</option>
                                                    </select>
                                                </div>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                $no=1;
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->akses}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#staticBackdrop{{$item->id_account}}">
                                            <i class="icon-pencil"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{$item->id_account}}"
                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('setting/role/edit/'.$item->id_account)}}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="nama"
                                                                        value="{{$item->nama}}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">NIK</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="nik"
                                                                        value="{{$item->nik_k}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Email</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="email"
                                                                        value="{{$item->email}}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Akses</label>
                                                                    <div class="form-group">
                                                                        <select class="form-control"
                                                                            id="exampleFormControlSelect1" name="akses">
                                                                            @if ($item->akses == 'user')
                                                                            <option value="{{$item->akses}}">
                                                                                {{$item->akses}}</option>
                                                                            <option value="admin">admin</option>
                                                                            @else
                                                                            <option value="{{$item->akses}}">
                                                                                {{$item->akses}}</option>
                                                                            <option value="user">user</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('setting/role/delete/'.$item->id_account)}}" method="post"
                                            id="hapusUs">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="clickHapusUs()" class="btn btn-danger btn-sm"
                                                style="margin-top: 2px"><i class="icon-trash"></i></button>
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
    function clickHapusUs() {
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
              document.getElementById('hapusUs').submit();
          }
      });
      
  }
</script>
@endsection