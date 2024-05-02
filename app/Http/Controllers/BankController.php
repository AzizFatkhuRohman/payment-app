<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Validator;

class BankController extends Controller
{
    protected $bank;
    public function __construct(Bank $bank){
        $this->bank = $bank;

    }
    public function index(){
        $title = 'Data Bank';
        $collection = $this->bank->Tampil();
        return view('admin.bank',compact('title','collection'));
    }
    public function post(Request $request){
        $val = Validator::make($request->all(),[
            'kode_bank'=>'required|unique:tbl_bank,code_bank',
            'nama_bank'=>'required|unique:tbl_bank,bank_name',
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            $this->bank->Buat([
                'code_bank'=>$request->kode_bank,
                'bank_name'=>$request->nama_bank
            ]);
            return redirect()->back()->with('create','Create successfully');
        }
        
    }
    public function put(Request $request, $id_bank){
        $val = Validator::make($request->all(),[
            'kode_bank'=>'required',
            'nama_bank'=>'required',
        ]);
        if ($val->fails()) {
            return redirect('data-bank')->withErrors($val);
        } else {
            $this->bank->Ubah($id_bank,[
                'code_bank'=>$request->kode_bank,
                'bank_name'=>$request->nama_bank
            ]);
            return redirect('data-bank')->with('update','Update successfully');
        }
        
    }
    public function delete($id_bank){
        $this->bank->Hapus($id_bank);
        return redirect('data-bank')->with('delete','Delete Successfully');
    }
}
