<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class PeriodeController extends Controller
{
    protected $periode;
    public function __construct(\App\Models\Periode $periode){
        $this->periode = $periode;
    }
    public function index(){
        $title = 'Periode';
        $collection = $this->periode->Tampil();
        return view('admin.periode',compact('title','collection'));
    }
    public function post(Request $request){
        $val = Validator::make($request->all(),[
            'bulan'=>'required',
            'tahun'=>'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            $this->periode->Buat([
                'bulan'=>$request->bulan,'tahun'=>$request->tahun
            ]);
            return redirect()->back()->with('create','Create Successfully');
        }
        
    }
    public function put (Request $request, $id_periode){
        $val = Validator::make($request->all(),[
            'bulan'=>'required',
            'tahun'=>'required'
        ]);
        if ($val->fails()) {
            return redirect('periode')->withErrors($val);
        } else {
            $this->periode->Ubah($id_periode,[
                'bulan'=>$request->bulan,'tahun'=>$request->tahun
            ]);
            return redirect('periode')->with('update','Update Successfully');
        }
    }
    public function delete($id_periode){
        $this->periode->Hapus($id_periode);
        return redirect('periode')->with('delete','Successfully');
    }
}
