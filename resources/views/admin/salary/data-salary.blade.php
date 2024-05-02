@extends('layouts.app')
@section('main')
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
<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h1>Table Salary</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-cube"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Salary Table</li>
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
                    <h2>Data Salary <small>List dari data salary</small></h2>
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
                                        <form action="{{url('vendor/add-vendor')}}" method="post">
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
                                    <th>NIK</th>
                                    <th>Bulan</th>
                                    <th>Nama</th>
                                    <th>Jumlah OT</th>
                                    <th>Jumlah Salary</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30">No</th>
                                    <th>NIK</th>
                                    <th>Bulan</th>
                                    <th>Nama</th>
                                    <th>Jumlah OT</th>
                                    <th>Jumlah Salary</th>
                                    <th>Keterangan</th>
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
                                    <td>{{$item->nik_k}}</td>
                                    <td>{{$item->periode->bulan}} - {{$item->periode->tahun}}</td>
                                    <td>{{$item->karyawan->nama_k}}</td>
                                    <td>{{$item->jumlah_jam_ot}}</td>
                                    <td>{{$item->amount_gajikaryawan}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#example{{$item->id_salary_k}}">
                                                    <i class="icon-pencil"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="example{{$item->id_salary_k}}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Input Data Salary
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{url('payslip/salary/edit/'.$item->id_salary_k)}}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleInputEmail1">Nama
                                                                                Karyawan</label>
                                                                            <input type="text" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="nama_karyawan"
                                                                                value="{{$item->karyawan->nama_k}}"
                                                                                readonly>
                                                                            <input type="text" name="nik"
                                                                                value="{{$item->nik_k}}" hidden>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                for="exampleInputEmail1">Periode</label>
                                                                            <input type="email" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="periode"
                                                                                value="{{$item->periode->bulan}} - {{$item->periode->tahun}}"
                                                                                readonly>
                                                                            <input type="text" name="'id_periode"
                                                                                value="{{$item->id_periode}}" hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Jumlah Jam
                                                                                Overtime</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="jumlah_jam_ot"
                                                                                value="{{$item->jumlah_jam_ot}}">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            @php
                                                                            $makan = $item->karyawan->makan;
                                                                            $hitung_weh = $item->total_makan / $makan;
                                                                            @endphp
                                                                            <label for="exampleInputEmail1">Jumlah Hari
                                                                                Makan</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="jumlah_hari_makan"
                                                                                value="{{$hitung_weh}}">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Jumlah
                                                                                Tunjangan Shift</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="jumlah_tunjangan_shift"
                                                                                value="{{$item->jumlah_shift}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Tunjangan
                                                                                3T</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="tunjangan_tiga_t"
                                                                                value="{{$item->tunjangan_3t}}">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Rapel
                                                                                Overtime</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="rapel_overtime"
                                                                                value="{{$item->rapel_ot}}">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Rapel
                                                                                Gaji</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="rapel_gaji"
                                                                                value="{{$item->rapel_gaji}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            @php
                                                                            $gaji = $item->karyawan->basic_salary;
                                                                            $thr = $item->jumlah_apresiasi;
                                                                            $hitung_deui = $thr / $gaji
                                                                            @endphp
                                                                            <label for="exampleInputEmail1">THR /
                                                                                Apresiasi</label>
                                                                            <input type="text" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp" name="thr"
                                                                                value="{{$hitung_deui}}">
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label for="exampleInputEmail1">Tidak Hadir
                                                                                Tanpa Upah</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="tidak_hadir_tanpa_upah"
                                                                                value="{{$item->tpu}}">
                                                                        </div>
                                                                    </div>
                                                                    <h5 class="modal-title">Data PPh</h5>
                                                                    <div class="row">
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Penggantian
                                                                                PPh</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="penggantian_pph"
                                                                                value="{{$item->ppph}}">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Lebih bayar
                                                                                PPh</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="lebih_bayar_pph"
                                                                                value="{{$item->lpph}}">
                                                                        </div>
                                                                        <div class="form-group col-4">
                                                                            <label for="exampleInputEmail1">Kurang Bayar
                                                                                PPh</label>
                                                                            <input type="number" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="kurang_pph"
                                                                                value="{{$item->kpph}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-4">
                                                                        <label for="exampleInputEmail1">Tanggal Rilis
                                                                            Payslip</label>
                                                                        <input type="date" class="form-control"
                                                                            id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp"
                                                                            name="tgl_release"
                                                                            value="{{$item->tgl_release}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="exampleFormControlTextarea1">Keterangan</label>
                                                                        <textarea class="form-control"
                                                                            id="exampleFormControlTextarea1" rows="2"
                                                                            name="keterangan">{{$item->keterangan}}</textarea>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{url('payslip/salary/delete/'.$item->id_salary_k)}}"
                                                    method="post" id="hapusSal">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" type="button"
                                                        onclick="clickHapusSal()"><i class="icon-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{url('payslip/salary/print/'.$item->id_salary_k)}}"
                                                    class="btn btn-primary btn-sm mt-2"><i class="icon-printer"></i></a>
                                            </div>
                                            <div class="col-6">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-success btn-sm mt-2"
                                                    data-toggle="modal" data-target="#Modal{{$item->id_salary_k}}">
                                                    <i class="icon-eye"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="Modal{{$item->id_salary_k}}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Publish
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{url('payslip/salary/publish/'.$item->id_salary_k)}}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlSelect1">Status
                                                                            Publish
                                                                        </label>
                                                                        <select class="form-control"
                                                                            id="exampleFormControlSelect1" name="publish">
                                                                            <option value="{{$item->publish}}">{{$item->publish}}</option>
                                                                            @if ($item->publish == 'Yes')
                                                                            <option value="No">No</option>
                                                                            @else
                                                                            <option value="Yes">Ya</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    function clickHapusSal() {
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
              document.getElementById('hapusSal').submit();
          }
      });
      
  }
</script>
@endsection