<?php

namespace App\Http\Controllers;

use App\Exports\PayDateExport;
use App\Models\PaymentDate;
use App\Models\paymentVendor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class PaymentDateController extends Controller
{
    protected $paymentdate;
    public function __construct(\App\Models\PaymentDate $paymentdate){
        $this->paymentdate=$paymentdate;
    }
    public function index(){
        $title = 'Payment Date';
        $data = $this->paymentdate->Tampil();
        return view('admin.payment-date',compact('title','data'));
    }
    public function post(Request $request){
        $val = Validator::make($request->all(),[
            'tanggal'=>'required','deskripsi'=>'required'
        ]);
        if($val->fails()){
            return redirect()->back()->withErrors($val);
        }
        $this->paymentdate->Tambah([
            'deskripsi_pembayaran_v'=>$request->deskripsi,
            'payment_date'=>$request->tanggal
        ]);
        return redirect()->back()->with('create','Create Successfully');
    }
    public function put(Request $request, $id_payment_date){
        $val = Validator::make($request->all(),[
            'tanggal'=>'required','deskripsi'=>'required'
        ]);
        if($val->fails()){
            return redirect('peb/vendor/payment-date')->withErrors($val);
        }
        $this->paymentdate->Ubah($id_payment_date,[
            'deskripsi_pembayaran_v'=>$request->deskripsi,
            'payment_date'=>$request->tanggal
        ]);
        return redirect('peb/vendor/payment-date')->with('update','Update Successfully');
    }
    public function delete($id_payment_date){
        $this->paymentdate->Hapus($id_payment_date);
        return redirect('peb/vendor/payment-date')->with('delete','Delete Successfully');
    }
    public function export($payment_date){
        $data = paymentVendor::where('payment_date',$payment_date)->get();
        return Excel::download(new PayDateExport($data), 'data-transaksi.xlsx');
    }
}
