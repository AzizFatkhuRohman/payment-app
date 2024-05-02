<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    protected $karyawan;
    protected $bank;
    public function __construct(\App\Models\Karyawan $karyawan, Bank $bank){
        $this->bank = $bank;
        $this->karyawan = $karyawan;
    }
    public function index(){
        $title = 'Karyawan';
        $collection = $this->karyawan->Tampil();
        $data_bank = $this->bank->Tampil();
        return view('admin.karyawan',compact('title','collection','data_bank'));
    }
}
