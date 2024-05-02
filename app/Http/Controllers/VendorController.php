<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Validator;

class VendorController extends Controller
{
    protected $bank;
    protected $vendor;
    public function __construct(Bank $bank, Vendor $vendor)
    {
        $this->bank = $bank;
        $this->vendor = $vendor;
    }
    public function index()
    {
        $title = 'Vendor';
        $bank = $this->bank->Tampil();
        $data = $this->vendor->Tampil();
        return view('admin.vendor.vendor', compact('title', 'bank', 'data'));
    }
    public function add(Request $request)
    {
        $photoNpwpName = null;
        $photoRekeningName = null;
        $photoVendorName = null;
        if ($request->file('photo_vendor') != null) {
            $photoVendorFile = $request->file('photo_vendor');
            $photoVendorName = 'ven_' . time() . '_' . $photoVendorFile->getClientOriginalName();
            $photoVendorFile->move(public_path('vendor'), $photoVendorName);
        }

        if ($request->file('photo_npwp') != null) {
            $photoNpwpFile = $request->file('photo_npwp');
            $photoNpwpName = 'npwp_' . time() . '_' . $photoNpwpFile->getClientOriginalName();
            $photoNpwpFile->move(public_path('npwp'), $photoNpwpName);
        }

        if ($request->file('photo_rekening') != null) {
            $photoRekeningFile = $request->file('photo_rekening');
            $photoRekeningName = 'rek_' . time() . '_' . $photoRekeningFile->getClientOriginalName();
            $photoRekeningFile->move(public_path('rekening'), $photoRekeningName);
        }

        $kode_bank = Bank::where('id_bank', $request->nama_bank)->value('code_bank');
        $tipe_trans = ($kode_bank === 0) ? 'OVB' : 'LLG';

        $this->vendor->Buat([
            'kode_vendor' => $request->kode_vendor,
            'nama_vendor' => $request->nama_vendor,
            'photo_vendor' => $photoVendorName,
            'telpon' => $request->no_telp,
            'email' => $request->email,
            'npwp' => $request->npwp,
            'photo_npwp' => $photoNpwpName,
            'rek_vendor' => $request->no_rekening,
            'id_bank' => $request->nama_bank,
            'atas_nama' => $request->nama_pemilik_rekening,
            'photo_rekening' => $photoRekeningName,
            'address_bank' => $request->alamat_bank,
            'bank_city' => $request->kota_bank,
            'kode_bank' => $kode_bank,
            'currency' => 'IDR',
            'transaction_type' => $tipe_trans,
            'resident_status' => 0,
            'citizen_status' => 0,
            'ket' => $request->keterangan
        ]);

        return redirect()->back()->with('create', 'Create Successfully');
    }
    public function put(Request $request, $id_v)
    {
        $kode_bank = Bank::where('id_bank', $request->nama_bank)->value('code_bank');
        $tipe_trans = ($kode_bank === 0) ? 'OVB' : 'LLG';

        $this->vendor->Ubah($id_v, [
            'kode_vendor' => $request->kode_vendor,
            'nama_vendor' => $request->nama_vendor,
            'telpon' => $request->no_telp,
            'email' => $request->email,
            'npwp' => $request->npwp,
            // 'photo_npwp' => $photoNpwpName,
            'rek_vendor' => $request->no_rekening,
            'id_bank' => $request->nama_bank,
            'atas_nama' => $request->nama_pemilik_rekening,
            // 'photo_rekening' => $photoRekeningName,
            'address_bank' => $request->alamat_bank,
            'bank_city' => $request->kota_bank,
            'kode_bank' => $kode_bank,
            'currency' => 'IDR',
            'transaction_type' => $tipe_trans,
            'resident_status' => 0,
            'citizen_status' => 0,
            'ket' => $request->keterangan
        ]);

        return redirect('peb/vendor')->with('update', 'Update Successfully');
    }
    public function delete($id_v)
    {
        $this->vendor->Hapus($id_v);
        return redirect('peb/vendor')->with('delete', 'Delete Successfully');
    }
}
