<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'tbl_periode';
    protected $primaryKey = 'id_periode'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = [
        'bulan',
        'tahun'
    ];
    public function salaryK(){
        return $this->hasMany(SalaryK::class,'id_periode');
    }
    public function Total()
    {
        return $this->count();
    }
    public function Tampil()
    {
        return $this->orderBy('id_periode', 'desc')->get();
    }
    public function Buat($data){
        return $this->insert($data);
    }
    public function Ubah($id_periode, $data)
    {
        return $this->find($id_periode)->update($data);
    }
    public function Hapus($id_periode){
        return $this->find($id_periode)->delete();
    }
}
