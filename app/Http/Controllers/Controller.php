<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\PaymentDate;
use App\Models\Periode;
use App\Models\Vendor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $karyawan;
    protected $vendor;
    protected $paymentdate;
    protected $periode;
    public function __construct(Karyawan $karyawan, Vendor $vendor,PaymentDate $paymentdate,Periode $periode)
    {
        $this->karyawan = $karyawan;
        $this->vendor = $vendor;
        $this->paymentdate = $paymentdate;
        $this->periode = $periode;
        
    }
    public function index()
    {
        $title = 'Dashboard';
        $total_karyawan = $this->karyawan->Total();
        $total_vendor = $this->vendor->Total();
        $total_payment_date = $this->paymentdate->Total();
        $total_periode = $this->periode->Total();
        return view('admin.index', compact('title', 'total_karyawan', 'total_vendor','total_payment_date','total_periode'));
    }
}
