@extends('layouts.app')
@section('main')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Edit Transaksi</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Transaksi</li>
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
                    <h2>Data Karyawan <small>List dari data karyawan terbaru</small></h2>
                    <ul class="header-dropdown dropdown">

                        <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                    </ul>
                </div>

                <div class="body">
                    <form action="" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="exampleFormControlInput1">Nama Vendor</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="nama_vendor">
                                    @foreach ($vendor as $item)
                                    <option value="{{$item->nama_vendor}}">{{$item->nama_vendor}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleFormControlInput1">Jumlah Bayar</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1"
                                    name="jumlah_bayar">
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleFormControlInput2">Payment
                                    Date</label>
                                <input type="date" class="form-control" id="exampleFormControlInput2"
                                    name="tanggal_pembayaran">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleFormControlInput1">Deskripsi</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    name="description">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleFormControlInput1">Kode Pembayaran</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="kode_pembayaran">
                                    @foreach ($pay_date as $item)
                                    <option value="{{$item->deskripsi_pembayaran_v}}">
                                        {{$item->deskripsi_pembayaran_v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection