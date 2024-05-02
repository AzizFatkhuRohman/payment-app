<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Karyawan;
use App\Models\SalaryK;
use Illuminate\Http\Request;

class SalaryKController extends Controller
{
    protected $periode;
    protected $salaryK;
    protected $bank;
    public function __construct(\App\Models\Periode $periode, SalaryK $salaryK, Bank $bank)
    {
        $this->periode = $periode;
        $this->salaryK = $salaryK;
        $this->bank = $bank;
    }
    public function form_sort()
    {
        $title = 'Form Sorting Salary';
        $data = $this->periode->Tampil();
        return view('admin.salary.form-sort', compact('title', 'data'));
    }
    public function show(Request $request)
    {
        $title = 'Salary';
        $id_periode = $request->periode;
        $data = $this->salaryK->Tampil($id_periode);
        $bank = $this->bank->Tampil();
        return view('admin.salary.data-salary', compact('title', 'data', 'bank'));
    }
    public function put(Request $request, $id_salary_k)
    {
        $kode = $request->input('nik');
        $k = Karyawan::where('nik_k', $kode)->first(); // Assuming only one record is expected
        $total_lembur = round((1 / 173 * $k->basic_salary) * $request->jumlah_jam_ot);
        $total_makan = $k->makan * $request->jumlah_hari_makan;
        $total_thr = round($k->basic_salary * $request->thr);
        $total_gaji = round($k->basic_salary + $k->transport + $k->komunitas + $request->jumlah_tunjangan_shift);
        if ($total_gaji < 5176179) {
            $hasil_gaji = 5176179;
        } else {
            $hasil_gaji = $total_gaji;
        }
        if ($k->pbpjskes == 'Tidak') {
            $bpjs_dp = 0;
            $bpjs_dk = 0;
        } else {
            $bpjs_dp = round($hasil_gaji * (4 / 100));
            $bpjs_dk = round($hasil_gaji * (1 / 100));
        }
        if ($request->bpjstk == "Tidak") {
            $jkk = 0;
            $jkm = 0;
            $jht = 0;
            // Yang dibayar Karyawan
            $jkk2 = 0;
            $jkm2 = 0;
            $jht2 = 0;
        } else {
            $jkk = round($k->basic_salary * (0.24 / 100));
            $jkm = round($k->basic_salary * (0.30 / 100));
            $jht = round($k->basic_salary * (3.7 / 100));

            // Yang dibayar Karyawan
            $jkk2 = 0;
            $jkm2 = 0;
            $jht2 = round($k->basic_salary * (2 / 100));
        }
        $total_bpjstk_dp = $jkk + $jkm;
        $total_bpjstk_dk = $jkk2 + $jkm2 + $jht2;
        $asuransidp = round($bpjs_dp + $total_bpjstk_dp);
        $gaji_bruto = round($k->basic_salary + $k->transport + $k->komunikasi + $request->jumlah_tunjangan_shift +
            $total_lembur + $total_makan + $k->bpk + $total_thr + $request->tunjangan_tiga_t + $request->rapel_overtime +
            $request->rapel_gaji + $request->penggantian_pph + $request->lebih_bayar_pph - $request->tidak_hadir_tanpa_upah - $request->kurang_pph);
        $jumlah_income = round($k->basic_salary + $k->transport + $k->komunikasi + $request->jumlah_tunjangan_shift + $total_lembur + $total_makan
            + $k->bpk + $total_thr + $request->tunjangan_tiga_t + $request->rapel_overtime + $request->rapel_gaji + $asuransidp + $request->pengganti_pph - $request->tidak_hadir_tanpa_upah);
        $biaya_jabatan = $jumlah_income * (5 / 100);

        //Iuran Pensiun/JHT diambil dari $total_bpjstk_dk

        //Penghasilan Netto
        $gaji_netto = $jumlah_income - $biaya_jabatan - $total_bpjstk_dk;
        $gaji_netto_anual = round($gaji_netto * 12);

        //potongan Pajak
        $ptkp = $k->ptkp;
        $pkp_anual = $gaji_netto_anual - $ptkp;
        $pembulatan = $pkp_anual;
        $bulat = substr($pembulatan, -3);
        if ($bulat < 999) {
            $akhir = $pembulatan - $bulat;
        } else {
            $akhir = $pembulatan + (1000 - $bulat);

        }

        $pph_terhutang = round($akhir * (5 / 100));
        $pph_masa = round($pph_terhutang / 12);
        if ($pph_masa < 0) {
            $pph_masa_total = 0;
        } else {
            $pph_masa_total = $pph_masa;
        }
        $total_pendapatan = round($k->basic_salary + $k->transport + $k->komunikasi + $k->bpk + $request->jumlah_tunjangan_shift + $total_lembur + $total_makan + $total_thr + $request->tunjangan_tiga_t + $request->rapel_overtime + $request->rapel_gaji
            + $bpjs_dp + $total_bpjstk_dp + $request->pengganti_pph - $request->tidak_hadir_tanpa_upah);
        $total_potongan = round($pph_masa_total + $bpjs_dp + $bpjs_dk + $total_bpjstk_dp + $total_bpjstk_dk + $request->kurang_pph - $request->lebih_bayar_pph);
        $gaji_karyawan = (round($gaji_bruto - ($total_bpjstk_dk + $bpjs_dk + $pph_masa_total)) + 1);


        $this->salaryK->Ubah($id_salary_k, [
            // 'nik_k' => $k->nik,
            'basic_salary' => $k->basic_salary,
            'transport' => $k->transport,
            'komunikasi' => $k->komunikasi,
            'makan' => $k->makan,
            'bpk' => $k->bpk,
            'jumlah_jam_ot' => $request->jumlah_jam_ot,
            'jumlah_ot' => $total_lembur,
            'total_makan' => $total_makan,
            'jumlah_apresiasi' => $total_thr,
            'ppph' => $request->input('penggantian_pph'),
            'lpph' => $request->input('lebih_bayar_pph'),
            'kpph' => $request->input('kurang_pph'),
            'tpu' => $request->tidak_hadir_tanpa_upah,
            'jumlah_shift' => $request->jumlah_tunjangan_shift,
            'tunjangan_3t' => $request->tunjangan_tiga_t,
            'rapel_ot' => $request->rapel_overtime,
            'rapel_gaji' => $request->rapel_gaji,
            'bpjs' => $bpjs_dk,
            'bpjs_dp' => $bpjs_dp,
            'jht' => $total_bpjstk_dk,
            'jht_dp' => $total_bpjstk_dp,
            'asuransidp' => $asuransidp,
            'jumlah_gaji_bruto' => $gaji_bruto,
            'jumlah_income' => $jumlah_income,
            'total_pendapatan' => $total_pendapatan,
            'total_potongan' => $total_potongan,
            'biaya_jabatan' => $biaya_jabatan,
            'income_nett' => $gaji_netto,
            'income_nett_1year' => $gaji_netto_anual,
            'pkp_1year' => $pkp_anual,
            'pembulatan' => $akhir,
            'pph_terhutang' => $pph_terhutang,
            'pph_masa' => ($pph_masa_total + $request->input('kurang_pph')) - $request->input('lebih_bayar_pph'),
            'pph_masa_real' => $pph_masa,
            'amount_gajikaryawan' => $gaji_karyawan,
            'tgl_release' => $request->tgl_release,
            'keterangan' => $request->keterangan
        ]);
        return redirect('payslip/salary');
    }
    public function publish(Request $request, $id_salary_k)
    {
        $this->salaryK->Ubah($id_salary_k, ['publish' => $request->publish]);
        return redirect('payslip/salary');
    }
    public function print($id_salary_k)
    {
        $title = 'Cetak Salary';
        $data = SalaryK::with('karyawan', 'periode')->find($id_salary_k);
        return view('admin.salary.cetak', compact('data','title'));
    }
    public function delete($id_salary_k){
        $this->salaryK->Hapus($id_salary_k);
        return redirect('payslip/salary');
    }
}