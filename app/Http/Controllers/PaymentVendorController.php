<?php

namespace App\Http\Controllers;

use App\Exports\PayExport;
use App\Models\Bank;
use App\Models\PaymentDate;
use App\Models\paymentVendor;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PaymentVendorController extends Controller
{
    protected $paymentvendor;
    protected $vendor;
    protected $paymentDate;
    public function __construct(paymentVendor $paymentvendor, Vendor $vendor, PaymentDate $paymentDate)
    {
        $this->paymentvendor = $paymentvendor;
        $this->vendor = $vendor;
        $this->paymentDate = $paymentDate;
    }
    public function index()
    {
        $title = 'Transaksi';
        $data = $this->paymentvendor->Tampil();
        $vendor = $this->vendor->Tampil();
        $pay_date = $this->paymentDate->Tampil();
        return view('admin.transaksi', compact('title', 'data', 'vendor', 'pay_date'));
    }
    public function postTransaksi(Request $request)
    {
        $kode = $request->nama_vendor;
        $vendor = Vendor::where('nama_vendor', $kode)->first();
        $bank = Bank::where('id_bank', $vendor->id_bank)->first();
        $this->paymentvendor->Post([
            'nama_vendor' => $vendor->nama_vendor,
            'bank_name' => $bank->bank_name,
            'address_bank' => $vendor->address_bank,
            'bank_city' => $vendor->bank_city,
            'bank_code' => $vendor->kode_bank,
            'account_name' => $vendor->atas_nama,
            'account_number' => $vendor->rek_vendor,
            'currency' => $vendor->currency,
            'amount_payment' => $request->jumlah_bayar,
            'description' => $request->description,
            'kode_pay' => $request->kode_pembayaran,
            'email_vendor' => $vendor->email,
            'transaction_type' => $vendor->transaction_type,
            'resident_status' => $vendor->resident_status,
            'citizen_status' => $vendor->citizen_status,
            'payment_date' => $request->tanggal_pembayaran,
        ]);
        return redirect()->back()->with('create', 'Data Berhasil Ditambah');
    }
    public function put($id_payment_v){
        $title = 'Edit Transaksi';
        $pay_date = $this->paymentDate->Tampil();
        $data = paymentVendor::where('id_payment_v',$id_payment_v)->first();
        return view('admin.edit-transaksi',compact('title','data','pay_date'));
    }
    public function putTransaksi($id_payment_v, Request $request){
        $this->paymentvendor->Put($id_payment_v, [
            'amount_payment' => $request->jumlah_bayar,
            'description' => $request->description, // Correctly accessing the 'description' field
            'kode_pay' => $request->kode_pembayaran,
            'payment_date' => $request->payment_date,
        ]);
        
        return redirect()->back()->with('update', 'Data Berhasil Diubah');
    }
    public function delete($id_payment_v){
        $this->paymentvendor->Del($id_payment_v);
        return redirect('peb/vendor/data-transaksi')->with('delete', 'Data Berhasil Dihapus');
    }
    public function export($id_payment_v){
        $data = paymentVendor::where('id_payment_v',$id_payment_v)->get();
        return Excel::download(new PayExport($data), 'data.xlsx');
    }
    
}
