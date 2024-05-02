<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'tbl_account';
    protected $primaryKey = 'id_account'; // Tentukan primary key yang digunakan
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'nik_k',
        'email',
        'password',
        'akses',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Tambah($data)
    {
        return $this->insert($data);
    }
    public function Tampil()
    {
        return $this->orderBy('id_account', 'desc')->get();
    }
    public function Ubah($id_account, $data)
    {
        return $this->find($id_account)->update($data);
    }
    public function Hapus($id_account){
        return $this->find($id_account)->delete();
    }
    public function Temukan($id_account){
        return $this->find($id_account);
    }
}
