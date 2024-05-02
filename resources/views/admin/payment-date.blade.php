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
            <h1>Table Tanggal Payment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Table Tanggal Payment</li>
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
                    <h2>Tanggal Payment <small>List dari data tanggal pembayaran</small></h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exModal">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleFormControlInput1">Tanggal</label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput1" name="tanggal">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleFormControlInput1">Deskripsi</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1" name="deskripsi">
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
                                    <th>Deskripsi</th>
                                    <th>Tanggal Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Payment</th>
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
                                    <td>{{$item->deskripsi_pembayaran_v}}</td>
                                    <td>{{$item->payment_date}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#ex{{$item->id_payment_date}}">
                                            <i class="icon-pencil"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="ex{{$item->id_payment_date}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ url('peb/vendor/payment-date/'.$item->id_payment_date) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        for="exampleFormControlInput1">Tanggal</label>
                                                                    <input type="date" class="form-control"
                                                                        id="exampleFormControlInput1" name="tanggal"
                                                                        value="{{ $item->payment_date }}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        for="exampleFormControlInput2">Deskripsi</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleFormControlInput2" name="deskripsi"
                                                                        value="{{ $item->deskripsi_pembayaran_v }}">
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
                                        <form action="{{url('peb/vendor/payment-date/'.$item->id_payment_date)}}"
                                            method="post" id="hapusPayDate">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm mt-2" type="button"
                                                onclick="clickPay()"><i class="icon-trash"></i></button>
                                        </form>
                                        <form action="{{url('peb/vendor/payment-date/'.$item->payment_date)}}"
                                            method="get">
                                            @csrf
                                            <button class="btn btn-primary btn-sm" type="submit">Export</button>
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
    function clickPay() {
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
              document.getElementById('hapusPayDate').submit();
          }
      });
      
  }
</script>
@endsection