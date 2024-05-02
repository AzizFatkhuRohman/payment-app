<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'tbl_bank';
    protected $primaryKey = 'id_bank'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'code_bank',
        'bank_name'
    ];
    public function vendor(){
        return $this->hasMany(Vendor::class,'id_bank');
    }
    public function Tampil()
    {
        return $this->orderBy('id_bank', 'DESC')->get();
    }
    public function Buat($data)
    {
        return $this->create($data);
    }
    public function Ubah($id_bank, $data)
    {
        return $this->find($id_bank)->update($data);
    }
    public function Hapus($id_bank){
        return $this->find($id_bank)->delete();
    }
}
