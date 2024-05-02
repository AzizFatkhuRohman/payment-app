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
            <h1>Table Vendor</h1>
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
                    <h2>Data Vendor <small>List dari data vendor yang sudah terdaftar</small></h2>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Vendor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('peb/vendor/add-vendor')}}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">Kode Vendor</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="kode_vendor">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">Nama Vendor</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="nama_vendor">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="inputGroupFile01"
                                                                aria-describedby="inputGroupFileAddon01"
                                                                name="photo_vendor">
                                                            <label class="custom-file-label"
                                                                for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">No Telp</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="no_telp">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="email">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">NPWP</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="npwp">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="inputGroupFile01"
                                                                aria-describedby="inputGroupFileAddon01"
                                                                name="photo_npwp">
                                                            <label class="custom-file-label"
                                                                for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">No Rekening</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="no_rekening">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">Nama Bank</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="nama_bank">
                                                        @foreach ($bank as $item)
                                                        <option value="{{$item->id_bank}}">{{$item->bank_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">Nama Pemilik Rekening</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="nama_pemilik_rekening">
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="inputGroupFile01"
                                                                aria-describedby="inputGroupFileAddon01"
                                                                name="photo_rekening">
                                                            <label class="custom-file-label"
                                                                for="inputGroupFile01">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">Alamat Bank</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="alamat_bank">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label for="exampleInputEmail1">Kota Bank</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="kota_bank">
                                                </div>
                                                <div class="form-group col-8">
                                                    <label for="exampleFormControlTextarea1">Keterangan</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                                        rows="1" name="keterangan"></textarea>
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
                                    <th>Nama Vendor</th>
                                    <th>Email</th>
                                    <th>Rekening</th>
                                    <th>Nama Rekening</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30">No</th>
                                    <th>Nama Vendor</th>
                                    <th>Email</th>
                                    <th>Rekening</th>
                                    <th>Nama Bank</th>
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
                                    <td>{{$item->nama_vendor}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->rek_vendor}}</td>
                                    <td>{{$item->bank->bank_name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#example{{$item->id_v}}">
                                            <i class="icon-pencil"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="example{{$item->id_v}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Vendor</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('vendor/edit/'.$item->id_v)}}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <h5 class="modal-title">Data Vendor</h5>
                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">Kode Vendor</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="kode_vendor"
                                                                        value="{{$item->kode_vendor}}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">Nama Vendor</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="nama_vendor"
                                                                        value="{{$item->nama_vendor}}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">No Telp</label>
                                                                    <input type="number" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="no_telp"
                                                                        value="{{$item->telpon}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="email"
                                                                        value="{{$item->email}}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">NPWP</label>
                                                                    <input type="number" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="npwp"
                                                                        value="{{$item->npwp}}">

                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">No Rekening</label>
                                                                    <input type="number" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="no_rekening"
                                                                        value="{{$item->rek_vendor}}">
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">Nama Bank</label>
                                                                    <select class="form-control"
                                                                        id="exampleFormControlSelect1" name="nama_bank">
                                                                        <option value="{{$item->bank->id_bank}}">
                                                                            {{$item->bank->bank_name}}</option>
                                                                        @foreach ($bank as $i)
                                                                        <option value="{{$i->id_bank}}">
                                                                            {{$i->bank_name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">Nama Pemilik
                                                                        Rekening</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp"
                                                                        name="nama_pemilik_rekening"
                                                                        value="{{$item->atas_nama}}">

                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">Alamat Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="alamat_bank"
                                                                        value="{{$item->address_bank}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputEmail1">Kota Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" name="kota_bank"
                                                                        value="{{$item->bank_city}}">
                                                                </div>
                                                                <div class="form-group col-8">
                                                                    <label
                                                                        for="exampleFormControlTextarea1">Keterangan</label>
                                                                    <textarea class="form-control"
                                                                        id="exampleFormControlTextarea1" rows="1"
                                                                        name="keterangan">{{$item->ket}}</textarea>
                                                                </div>
                                                            </div>
                                                            @if ($item->photo_vendor !=null || $item->photo_npwp != null
                                                            || $item->photo_rekening !=
                                                            null)
                                                            <h5 class="modal-title mt-2">Dokumen</h5>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="justify-content-center text-center">
                                                                        <label for="exampleInputEmail1">Vendor</label>
                                                                        <img src="{{asset('vendor/'.$item->photo_vendor)}}"
                                                                            class="rounded mx-auto d-block" alt="..."
                                                                            width="80%">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="justify-content-center text-center">
                                                                        <label for="exampleInputEmail1">NPWP</label>
                                                                        <img src="{{asset('npwp/'.$item->photo_npwp)}}"
                                                                            class="rounded mx-auto d-block" alt="..."
                                                                            width="80%">
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="justify-content-center text-center">
                                                                        <label for="exampleInputEmail1">Rekening</label>
                                                                        <img src="{{asset('rekening/'.$item->photo_rekening)}}"
                                                                            class="rounded mx-auto d-block" alt="..."
                                                                            width="80%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('vendor/delete/'.$item->id_v)}}" method="post"
                                            id="hapusVendor">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mt-2" type="button"
                                                onclick="clickHapusVendor()"><i class="icon-trash"></i></button>
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
    function clickHapusVendor() {
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
              document.getElementById('hapusVendor').submit();
          }
      });
      
  }
</script>
@endsection