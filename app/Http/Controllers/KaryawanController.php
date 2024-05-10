<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    protected $karyawan;
    protected $bank;
    public function __construct(\App\Models\Karyawan $karyawan, Bank $bank)
    {
        $this->bank = $bank;
        $this->karyawan = $karyawan;
    }
    public function index()
    {
        $title = 'Karyawan';
        $collection = $this->karyawan->Tampil();
        $data_bank = $this->bank->Tampil();
        return view('admin.karyawan', compact('title', 'collection', 'data_bank'));
    }
    public function post(Request $request)
    {
        $bank_name = Bank::where('bank_name', $request->nama_bank)->first();
        $code = $bank_name->code_bank;
        $this->karyawan->Buat([
            'nik_k' => $request->nik,
            'nama_k' => $request->nama,
            'jabatan' => $request->jabatan,
            'unit' => $request->unit,
            'status' => 4,
            'akses' => 'Employee',
            'tgl_masuk' => $request->tanggaL_masuk,
            'email' => $request->email,
            'no_ktp' => $request->no_ktp,
            'no_npwp' => $request->no_npwp,
            'no_rek' => $request->no_rekening,
            'nama_bank' => $request->nama_bank,
            'kode_bank' => $code,
            'cabang_bank' => $request->cabang_bank,
            'kota_bank' => $request->kota_bank,
            'nama_akun_bank' => $request->nama_akun_bank,
            'no_bpjs_kes' => $request->pbpjskes,
            'no_bpjs_tk' => $request->pbpjstk,
            'ptkp' => $request->ptkp,
            'pbpjskes' => $request->bpjs_kes,
            'pbpjstk' => $request->bpjs_tk,
            'basic_salary' => $request->gaji_pokok,
            'transport' => $request->transport,
            'komunikasi' => $request->komunikasi,
            'makan' => $request->makan,
            'tunjangan_shift' => 0,
            'bpk' => $request->bpk,
            'ket' => $request->keterangan
        ]);
        return redirect()->back()->with('create', 'Data berhasil ditambah');
    }
    public function put(Request $request, $id_karyawan)
    {
        $bank_name = Bank::where('bank_name', $request->nama_bank)->first();
        $code = $bank_name->code_bank;
        $data = [
            'nik_k' => $request->nik,
            'nama_k' => $request->nama,
            'jabatan' => $request->jabatan,
            'unit' => $request->unit,
            'status' => 4,
            'akses' => 'Employee',
            'tgl_masuk' => $request->tanggaL_masuk,
            'email' => $request->email,
            'no_ktp' => $request->no_ktp,
            'no_npwp' => $request->no_npwp,
            'no_rek' => $request->no_rekening,
            'nama_bank' => $request->nama_bank,
            'kode_bank' => $code,
            'cabang_bank' => $request->cabang_bank,
            'kota_bank' => $request->kota_bank,
            'nama_akun_bank' => $request->nama_akun_bank,
            'no_bpjs_kes' => $request->pbpjskes,
            'no_bpjs_tk' => $request->pbpjstk,
            'ptkp' => $request->ptkp,
            'pbpjskes' => $request->bpjs_kes,
            'pbpjstk' => $request->bpjs_tk,
            'basic_salary' => $request->gaji_pokok,
            'transport' => $request->transport,
            'komunikasi' => $request->komunikasi,
            'makan' => $request->makan,
            'tunjangan_shift' => 0,
            'bpk' => $request->bpk,
            'ket' => $request->keterangan
        ];
        Karyawan::where('id_karyawan',$id_karyawan)->update($data);
        return redirect('data-karyawan')->with('update', 'Data berhasil diubah');
    }
    public function delete($id_karyawan){
        $this->karyawan->Hapus($id_karyawan);
        return redirect('data-karyawan')->with('update', 'Data berhasil diubah');
    }
}
