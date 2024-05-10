<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'tbl_karyawan';
    protected $primaryKey = 'id_karyawan'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    protected $fillable = [
        'nik_k',
        'nama_k',
        'jabatan',
        'unit',
        'status',
        'akses',
        'tgl_masuk',
        'email',
        'no_ktp',
        'no_npwp',
        'no_rek',
        'nama_bank',
        'kode_bank',
        'cabang_bank',
        'kota_bank',
        'nama_akun_bank',
        'no_bpjs_kes',
        'no_bpjs_tk',
        'ptkp',
        'pbpjskes',
        'pbpjstk',
        'basic_salary',
        'transport',
        'komunikasi',
        'makan',
        'tunjangan_shift',
        'bpk',
        'ket'
    ];
    public function salaryK()
    {
        return $this->hasMany(SalaryK::class,'nik_k');
    }
    public function Total()
    {
        return $this->count();
    }
    public function Tampil()
    {
        return $this->orderBy('id_karyawan', 'DESC')->get();
    }
    public function Buat($data){
        return $this->create($data);
    }
    public function Edit($data, $id_karyawan){
        return $this->find($id_karyawan)->update($data);
    }
    public function Hapus($id_karyawan){
        return $this->find($id_karyawan)->delete();
    }
}
