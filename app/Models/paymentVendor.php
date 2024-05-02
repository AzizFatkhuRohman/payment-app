<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentVendor extends Model
{
    use HasFactory;
    protected $table = 'tbl_payment_v';
    protected $primaryKey = 'id_payment_v'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [

        'nama_vendor',
        'bank_name',
        'address_bank',
        'bank_city',
        'bank_code',
        'account_name',
        'account_number',
        'currency',
        'amount_payment',
        'description',
        'kode_pay',
        'email_vendor',
        'transaction_type',
        'resident_status',
        'citizen_status',
        'payment_date'
    ];
    public function Tampil()
    {
        return $this->orderBy('id_payment_v', 'desc')->get();
    }
    public function Post($data)
    {
        return $this->create($data);
    }
    public function Put($id_payment_v, $data)
    {
        return $this->find($id_payment_v)->update($data);
    }
    public function Del($id_payment_v)
    {
        return $this->find($id_payment_v)->delete();
    }
}
