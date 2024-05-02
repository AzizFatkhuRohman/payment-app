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
            <h1>Table Pembayaran Vendor</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor Table</li>
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
                    <h2>Data Pembayaran Vendor <small>List dari data vendor yang sudah terdaftar</small></h2>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label for="exampleFormControlInput1">Nama Vendor</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="nama_vendor">
                                                        @foreach ($vendor as $item)
                                                        <option value="{{$item->nama_vendor}}">{{$item->nama_vendor}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleFormControlInput1">Jumlah Bayar</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleFormControlInput1" name="jumlah_bayar">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleFormControlInput2">Payment
                                                        Date</label>
                                                    <input type="date" class="form-control"
                                                        id="exampleFormControlInput2" name="tanggal_pembayaran">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleFormControlInput1">Deskripsi</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleFormControlInput1" name="description">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleFormControlInput1">Kode Pembayaran</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="kode_pembayaran">
                                                        @foreach ($pay_date as $item)
                                                        <option value="{{$item->deskripsi_pembayaran_v}}">
                                                            {{$item->deskripsi_pembayaran_v}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                    name="keterangan"></textarea>
                                            </div> --}}
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
                                    <th>Tanggal Payment</th>
                                    <th>Nama Vendor</th>
                                    <th>Amount</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Tanggal Payment</th>
                                    <th>Nama Vendor</th>
                                    <th>Amount</th>
                                    <th>Deskripsi</th>
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
                                    <td>{{$item->payment_date}}</td>
                                    <td>{{$item->nama_vendor}}</td>
                                    <td>{{$item->amount_payment}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#ex{{$item->id_payment_v}}">
                                            <i class="icon-pencil"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="ex{{$item->id_payment_v}}" tabindex="-1"
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
                                                            action="{{ url('peb/vendor/data-transaksi/'.$item->id_payment_v) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="exampleFormControlInput1">Nama
                                                                        Vendor</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleFormControlInput1" name="tanggal"
                                                                        value="{{ $item->nama_vendor }}" readonly>
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleFormControlInput1">Jumlah
                                                                        Bayar</label>
                                                                    <input type="number" class="form-control"
                                                                        id="exampleFormControlInput1" name="jumlah_bayar"
                                                                        value="{{ $item->amount_payment }}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleFormControlInput2">Payment
                                                                        Date</label>
                                                                    <input type="date" class="form-control"
                                                                        id="exampleFormControlInput2"
                                                                        name="payment_date"
                                                                        value="{{ $item->payment_date }}">
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="form-group col-6">
                                                                    <label
                                                                        for="exampleFormControlInput2">Deskripsi</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleFormControlInput2" name="description"
                                                                        value="{{ $item->description }}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleFormControlInput2">Kode
                                                                        Pembayaran</label>
                                                                    <select class="form-control"
                                                                        id="exampleFormControlSelect1"
                                                                        name="kode_pembayaran">
                                                                        <option value="{{$item->kode_pay}}">
                                                                            {{$item->kode_pay}}</option>
                                                                        @foreach ($pay_date as $i)
                                                                        <option value="{{$i->deskripsi_pembayaran_v}}">
                                                                            {{$i->deskripsi_pembayaran_v}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="form-group">
                                                                <label
                                                                    for="exampleFormControlTextarea1">Keterangan</label>
                                                                <textarea class="form-control"
                                                                    id="exampleFormControlTextarea1" rows="3"
                                                                    name="keterangan">{{$item->description2}}</textarea>
                                                            </div> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('peb/vendor/data-transaksi/'.$item->id_payment_v)}}"
                                            method="post" id="hapusVDate">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm mt-2" type="button"
                                                onclick="clickV()"><i class="icon-trash"></i></button>
                                        </form>
                                        <form action="{{url('peb/vendor/data-transaksi/'.$item->id_payment_v)}}"
                                            method="get">
                                            @csrf
                                            <button class="btn btn-primary btn-sm mt-2" type="submit">Export</button>
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
    function clickV() {
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
              document.getElementById('hapusVDate').submit();
          }
      });
      
  }
</script>
@endsection