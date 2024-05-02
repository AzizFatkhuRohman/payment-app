<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryK extends Model
{
    use HasFactory;
    protected $table = 'tbl_salary_k';
    protected $primaryKey = 'id_salary_k'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nik_k',
        'id_periode',
        'basic_salary',
        'transport',
        'komunikasi',
        'makan',
        'bpk',
        'jumlah_jam_ot',
        'jumlah_ot',
        'total_makan',
        'jumlah_apresiasi',
        'ppph',
        'lpph',
        'kpph',
        'tpu',
        'jumlah_shift',
        'tunjangan_3t',
        'rapel_ot',
        'rapel_gaji',
        'bpjs',
        'bpjs_dp',
        'jht',
        'jht_dp',
        'asuransidp',
        'jumlah_gaji_bruto',
        'jumlah_income',
        'total_pendapatan',
        'total_potongan',
        'biaya_jabatan',
        'income_nett',
        'income_nett_1year',
        'pkp_1year',
        'pembulatan',
        'pph_terhutang',
        'pph_masa',
        'pph_masa_real',
        'amount_gajikaryawan',
        'keterangan',
        'tgl_release',
        'publish'
    ];
    public function periode(){
        return $this->belongsTo(Periode::class,'id_periode');
    }
    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'nik_k','nik_k');
    }
    public function Tampil($id_periode){
        return $this->with('periode','karyawan')->where('id_periode',$id_periode)->orderBy('id_salary_k','desc')->get();
    }
    public function Ubah($id_salary_k,$data){
        return $this->find($id_salary_k)->update($data);
    }
    public function Hapus($id_salary_k){
        return $this->find($id_salary_k)->delete();
    }
}
