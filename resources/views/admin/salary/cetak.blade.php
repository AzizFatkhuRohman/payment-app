@extends('layouts.app')
@section('main')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <img src="{{asset('assets/images/logo-akti.png')}}" height="40" class="user-image" alt="User Image"
                align="right">
              <h6>
                YAYASAN TOYOTA INDONESIA
                <br><small class="float-left">AKADEMI KOMUNITAS TOYOTA INDONESIA</small>
              </h6>
            </div>

            <div class="col-12" style="text-align: center;">
              <h5><b>Slip Gaji</b></h5>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-default" border="1">
                <thead>

                  <!-- Data Diri -->
                  <tr>
                    <th colspan="2" align="center" style="border-bottom: 1px solid; text-align: center;">PENDAPATAN</th>
                    <th colspan="2" align="center" style="border-bottom: 1px solid; text-align: center;">POTONGAN</th>
                    <th style="border-bottom: 1px solid">Nama</th>
                    <th style="border-bottom: 1px solid">{{$data->karyawan->nama_k}}</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>Gaji Pokok</td>
                    <td align="right">{{number_format($data->karyawan->basic_salary,0,",",".")}}</td>
                    <td>Pajak</td>
                    <td align="right">{{number_format($data->pph_masa,0,",",".")}}</td>
                    <td>NIK</td>
                    <td>{{$data->nik_k}}</td>
                  </tr>
                  <tr>
                    <td>Tunjangan jabatan</td>
                    <td align="right">0</td>
                    <td>Iuran BPJS Kesehatan Institusi</td>
                    <td align="right">{{number_format($data->bpjs_dp,0,",",".")}}</td>
                    <td>Lokasi</td>
                    <td>Karawang</td>
                  </tr>
                  <tr>
                    <td>Tunjangan transport</td>
                    <td align="right">{{number_format($data->transport,0,",",".")}}</td>
                    <td>Iuran BPJS Kesehatan</td>
                    <td align="right">{{number_format($data->bpjs,0,",",".")}}</td>
                    <td>Bulan</td>
                    <td>{{$data->periode->bulan}} - {{$data->periode->tahun}}</td>
                  </tr>
                  <tr>
                    <?php 
                      $total_komunikasi = $data->karyawan->komunikasi + $data->tunjangan_3t;
                      ?>
                    <td>Tunjangan Komunikasi</td>
                    <td align="right">
                      <?php echo number_format($total_komunikasi,0,",",".");?>
                    </td>
                    <td>BPJS TK JKK & JKM</td>
                    <td align="right">
                      <?php echo number_format($data->jht_dp,0,",","."); ?>
                    </td>
                    <td>Unit/Biro</td>
                    <td>
                      {{$data->karyawan->unit}}
                    </td>
                  </tr>
                  <tr>
                    <td>BPK</td>
                    <td align="right">
                      {{number_format($data->karyawan->bpk,0,",",".")}}
                    </td>
                    <td>BPJS TK JHT</td>
                    <td align="right">
                      {{number_format($data->jht,0,",",".");}}
                    </td>
                    <td style="border-bottom: 1px solid;"><strong>Diterima</strong></td>
                    </hr>
                    <td align="right" style="border-bottom: 1px solid;"><strong><u>
                          {{number_format($data->amount_gajikaryawan,0,",",".")}}
                        </u></strong></td>
                  </tr>
                  <tr>
                    <td>Tunjangan lembur</td>
                    <td align="right">
                      {{number_format($data->jumlah_ot,0,",",".")}}
                    </td>
                    <td></td>
                    <td></td>
                    <td colspan="2" rowspan="3" style="text-align: center;">
                      <p>Karawang,
                        {{date('d F Y', strtotime($data->tgl_release))}}
                      </p>
                    </td>
                  </tr>

                  <tr>
                    <td>Apresiasi</td>
                    <td align="right">
                      {{number_format($data->jumlah_apresiasi,0,",",".")}}
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Iuran BPJS Kesehatan Institusi</td>
                    <td align="right">
                      {{number_format($data->bpjs_dp,0,",",".")}}
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>BPJS TK JKK & JKM</td>
                    <td align="right">
                      {{number_format($data->jht_dp,0,",",".")}}
                    </td>
                    <td></td>
                    <td></td>
                    <td colspan="3" rowspan="3" style="text-align: center;"><strong><u>Warnoto</u></strong></td>
                  </tr>
                  <tr>
                    <?php 
                      $koreksi = $data->rapel_ot + $data->rapel_gaji;
                      ?>
                    <td>Koreksi</td>
                    <td align="right">
                      {{number_format($koreksi,0,",",".")}}
                    </td>
                    <td></td>
                    <td></td>

                  </tr>
                  <tr>
                    <td><strong>Total Pendapatan</strong></td>
                    <td align="right"><strong>
                        {{number_format($data->total_pendapatan,0,",",".")}}
                      </strong></td>
                    <td><strong>Total Potongan</strong></td>
                    <!--  <?php 
                        $pph = $data->pph;
                        $bpjs = $data->bpjs;
                        $jht = $data->jht;

                        $subtraction = $pph + $bpjs + $jht;
                      ?> -->
                    <td align="right"><strong>
                        {{number_format($data->total_potongan,0,",",".")}}
                      </strong></td>
                  </tr>

                </tbody>
              </table>



            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          {{-- <a href="<?php echo site_url('salary/cetak_slip/'.$value->id_salary_k); ?>" rel="noopener"
            class="btn btn-default"><i class="fa fa-print"></i> Print</a> --}}
          < </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection