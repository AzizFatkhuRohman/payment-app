<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $table = 'tbl_vendor';
    protected $primaryKey = 'id_v'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'kode_vendor',
        'nama_vendor',
        'photo_vendor',
        'telpon',
        'email',
        'npwp',
        'photo_npwp',
        'rek_vendor',
        'id_bank',
        'atas_nama',
        'photo_rekening',
        'address_bank',
        'bank_city',
        'kode_bank',
        'currency',
        'transaction_type',
        'resident_status',
        'citizen_status',
        'ket'
    ];
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }
    public function Total()
    {
        return $this->count();
    }
    public function Buat($data)
    {
        $this->create($data);
    }
    public function Tampil()
    {
        return $this->with('bank')->orderBy('id_v', 'desc')->get();
    }
    public function Ubah($id_v, $data)
    {
        return $this->find($id_v)->update($data);
    }
    public function Hapus($id_v)
    {
        return $this->find($id_v)->delete();
    }
}
