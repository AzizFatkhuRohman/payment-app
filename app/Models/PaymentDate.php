<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDate extends Model
{
    use HasFactory;
    protected $table = 'tbl_payment_date';
    protected $primaryKey = 'id_payment_date'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'deskripsi_pembayaran_v',
        'payment_date'
    ];

    public function Total()
    {
        return $this->count();
    }
    public function Tampil()
    {
        return $this->orderBy('id_payment_date', 'desc')->get();
    }
    public function Tambah($data)
    {
        return $this->create($data);
    }
    public function Ubah($id_payment_date, $data)
    {
        return $this->find($id_payment_date)->update($data);
    }
    public function Hapus($id_payment_date){
        return $this->find($id_payment_date)->delete();
    }
}
