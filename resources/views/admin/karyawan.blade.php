@extends('layouts.app')
@section('main')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Table Karyawan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Table Karyawan</li>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah data karyawan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            @csrf
                                            <span><b>Data Personal</b></span>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">NIK</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="nik" value="">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Nama</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="nama">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">jabatan</label>
                                                    <input type="number" class="form-control" id="exampleInputPassword1"
                                                        name="jabatan">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Unit</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="unit">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Tanggal masuk</label>
                                                    <input type="date" class="form-control" id="exampleInputPassword1"
                                                        name="tanggal_masuk">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputPassword1"
                                                        name="emal">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">No KTP</label>
                                                    <input type="number" class="form-control" id="exampleInputPassword1"
                                                        name="no_ktp">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">No NPWP</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="no_npwp">
                                                </div>
                                            </div>
                                            <span><b>Data Bank</b></span>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">No Rekening</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="no_rekening">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Nama Bank</label>
                                                    <select class="custom-select" id="inputGroupSelect01"
                                                        name="nama_bank">
                                                        @foreach ($data_bank as $item)
                                                        <option value="{{$item->bank_name}}">{{$item->bank_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label for="exampleInputPassword1">Cabang Bank</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="cabang_bank">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputPassword1">Kota Bank</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="kota_bank">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputPassword1">Nama Akun Bank</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="nama_akun_bank">
                                                </div>
                                            </div>
                                            <span><b>Data BPJS</b></span>
                                            <div class="form-group">
                                                <div class="row clearfix">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label>Ikut BPJS Kesehatan</label>
                                                        <br />

                                                        <label class="fancy-radio">
                                                            <input type="radio" name="pbpjskes" value="Ya"
                                                                onclick="text(0)" checked />
                                                            <span><i></i>Ya</span>
                                                        </label>
                                                        <label class="fancy-radio">
                                                            <input type="radio" name="pbpjskes" value="Tidak"
                                                                onclick="text(1)" />
                                                            <span><i></i>Tidak</span>
                                                        </label>
                                                        <p id="error-radio"></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group" id="mytext">
                                                            <label>No BPJS Kesehatan</label>
                                                            <input type="number" name="bpjs_kes" value="0"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row clearfix">
                                                    <div class="col-lg-6 col-md-12">
                                                        <label>Ikut BPJS Ketenagakerjaan</label>
                                                        <br />

                                                        <label class="fancy-radio">
                                                            <input type="radio" name="pbpjstk" value="Ya"
                                                                onclick="text2(0)" checked />
                                                            <span><i></i>Ya</span>
                                                        </label>
                                                        <label class="fancy-radio">
                                                            <input type="radio" name="pbpjstk" value="Tidak"
                                                                onclick="text2(1)" />
                                                            <span><i></i>Tidak</span>
                                                        </label>
                                                        <p id="error-radio"></p>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <div class="form-group" id="mytext2">
                                                            <label>No BPJS Ketenagakerjaan</label>
                                                            <input type="number" name="bpjs_tk" value="0"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">PTKP</label>
                                                <input type="number" class="form-control" id="exampleInputPassword1"
                                                    name="ptkp">
                                            </div>
                                            <span><b>Data salary</b></span>
                                            <div class="row">
                                                <div class="form-group col-4">
                                                    <label for="exampleInputPassword1">Gaji Pokok</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="gaji_pokok">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputPassword1">Transport</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="transport">
                                                </div>
                                                <div class="form-group col-4">
                                                    <label for="exampleInputPassword1">Komunikasi</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="komunikasi">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">Makan</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="makan">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="exampleInputPassword1">BPK</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword1"
                                                        name="bpk">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                    name="keterangan"></textarea>
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
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Unit</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30">No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Unit</th>

                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($collection as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nik_k}}</td>
                                    <td>{{$item->nama_k}}</td>
                                    <td>{{$item->jabatan}}</td>
                                    <td>{{$item->unit}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#staticBackdrop{{$item->id_karyawan}}">
                                            <i class="icon-pencil"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{$item->id_karyawan}}"
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
                                                        <form action="{{url('data-karyawan/edit/'.$item->id_karyawan)}}"
                                                            method="post">
                                                            @method('put')
                                                            @csrf
                                                            <span><b>Data Personal</b></span>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">NIK</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="nik"
                                                                        value="{{$item->nik_k}}" readonly>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Nama</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="nama"
                                                                        value="{{$item->nama_k}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">jabatan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="jabatan"
                                                                        value="{{$item->jabatan}}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Unit</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="unit"
                                                                        value="{{$item->unit}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Tanggal
                                                                        masuk</label>
                                                                    <input type="date" class="form-control"
                                                                        id="exampleInputPassword1" name="tanggal_masuk"
                                                                        value="{{$item->tgl_masuk}}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Email</label>
                                                                    <input type="email" class="form-control"
                                                                        id="exampleInputPassword1" name="emal"
                                                                        value="{{$item->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">No KTP</label>
                                                                    <input type="number" class="form-control"
                                                                        id="exampleInputPassword1" name="no_ktp"
                                                                        value="{{$item->no_ktp}}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">No NPWP</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="no_npwp"
                                                                        value="{{$item->no_npwp}}">
                                                                </div>
                                                            </div>
                                                            <span><b>Data Bank</b></span>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">No
                                                                        Rekening</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="no_rekening"
                                                                        value="{{$item->no_rek}}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleFormControlSelect1">Nama
                                                                        Bank</label>
                                                                    <select class="form-control"
                                                                        id="exampleFormControlSelect1" name="nama_bank">
                                                                        <option value="{{$item->nama_bank}}">
                                                                            {{$item->nama_bank}}</option>
                                                                        @foreach ($data_bank as $i)
                                                                        <option value="{{$i->bank_name}}">
                                                                            {{$i->bank_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputPassword1">Cabang
                                                                        Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="cabang_bank"
                                                                        value="{{$item->cabang_bank}}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputPassword1">Kota Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="kota_bank"
                                                                        value="{{$item->kota_bank}}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputPassword1">Nama Akun
                                                                        Bank</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="nama_akun_bank"
                                                                        value="{{$item->nama_akun_bank}}">
                                                                </div>
                                                            </div>
                                                            <span><b>Data BPJS</b></span>
                                                            <div class="form-group">
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-6 col-md-12">
                                                                        <label>Ikut BPJS Kesehatan</label>
                                                                        <br />
                                                                        <label class="fancy-radio">
                                                                            <input type="radio" name="pbpjskes"
                                                                                value="Ya" onclick="text(0)" checked />
                                                                            <span><i></i>Ya</span>
                                                                        </label>
                                                                        <label class="fancy-radio">
                                                                            <input type="radio" name="pbpjskes"
                                                                                value="Tidak" onclick="text(1)" />
                                                                            <span><i></i>Tidak</span>
                                                                        </label>
                                                                        <p id="error-radio"></p>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-12">
                                                                        <div class="form-group" id="mytext">
                                                                            <label>No BPJS Kesehatan</label>
                                                                            <input type="number" name="bpjs_kes"
                                                                                value="{{$item->no_bpjs_kes}}"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-6 col-md-12">
                                                                        <label>Ikut BPJS Ketenagakerjaan</label>
                                                                        <br />

                                                                        <label class="fancy-radio">
                                                                            <input type="radio" name="pbpjstk"
                                                                                value="Ya" onclick="text2(0)" checked />
                                                                            <span><i></i>Ya</span>
                                                                        </label>
                                                                        <label class="fancy-radio">
                                                                            <input type="radio" name="pbpjstk"
                                                                                value="Tidak" onclick="text2(1)" />
                                                                            <span><i></i>Tidak</span>
                                                                        </label>
                                                                        <p id="error-radio"></p>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-12">
                                                                        <div class="form-group" id="mytext2">
                                                                            <label>No BPJS Ketenagakerjaan</label>
                                                                            <input type="number" name="bpjs_tk"
                                                                                value="{{$item->no_bpjs_tk}}"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">PTKP</label>
                                                                <input type="number" class="form-control"
                                                                    id="exampleInputPassword1" name="ptkp">
                                                            </div>
                                                            <span><b>Data salary</b></span>
                                                            <div class="row">
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputPassword1">Gaji
                                                                        Pokok</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="gaji_pokok"
                                                                        value="{{$item->basic_salary}}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label for="exampleInputPassword1">Transport</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="transport"
                                                                        value="{{$item->transport}}">
                                                                </div>
                                                                <div class="form-group col-4">
                                                                    <label
                                                                        for="exampleInputPassword1">Komunikasi</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="komunikasi"
                                                                        value="{{$item->komunikasi}}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">Makan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="makan"
                                                                        value="{{$item->makan}}">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label for="exampleInputPassword1">BPK</label>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputPassword1" name="bpk"
                                                                        value="{{$item->bpk}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="exampleFormControlTextarea1">Keterangan</label>
                                                                <textarea class="form-control"
                                                                    id="exampleFormControlTextarea1" rows="3"
                                                                    name="keterangan">{{$item->ket}}</textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{url('data-karyawan/delete/'.$item->id_bank)}}" method="post"
                                            id="hapusKar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="clickHapusKar()"
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
    function text(x) {
    if (x == 0) document.getElementById("mytext").style.display = "block"; 
    else document.getElementById("mytext").style.display = "none";
    return;
    }
</script>
<script>
    function text2(x) {
    if (x == 0) document.getElementById("mytext2").style.display = "block"; 
    else document.getElementById("mytext2").style.display = "none";
    return;
    }
</script>
<script>
    function clickHapusKar() {
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
              document.getElementById('hapusKar').submit();
          }
      });
      
  }
</script>
@endsection