<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $User;
    public function __construct(User $User)
    {
        $this->User = $User;
    }
    public function index()
    {
        $title = 'Role';
        $data = $this->User->Tampil();
        return view('admin.role.role',compact('title','data'));
    }
    public function login()
    {
        $title = 'Login';
        return view('auth.login', compact('title'));
    }
    public function post(Request $request)
    {
        $val = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        }
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('failed', 'Email atau password salah!');
        }

    }
    public function add(Request $request)
    {
        $val = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required|unique:users,nik_k',
            'email' => 'required|unique:users,email',
            'akses' => 'required'
        ]);
        if ($val->fails()) {
            return redirect()->back()->withErrors($val);
        } else {
            $this->User->Tambah([
                'nama' => $request->nama,
                'nik_k' => $request->nik,
                'email' => $request->email,
                'password' => Hash::make('payment123'),
                'akses' => $request->akses,
                'role_id'=>'0'
            ]);
            return redirect()->back()->with('create', 'Create successfully');
        }

    }
    public function edit(Request $request, $id_account){
        $val = Validator::make($request->all(),[
            'nama'=>'required',
            'nik'=>'required',
            'email'=>'required',
            'akses'=>'required'
        ]);
        if ($val->fails()) {
            return redirect('setting/role')->withErrors($val);
        }
        $this->User->Ubah($id_account,[
            'nama'=>$request->nama,
            'nik_k'=>$request->nik,
            'email'=>$request->email,
            'akses'=>$request->akses
        ]);
        return redirect('setting/role')->with('update','Update Successfully');
    }
    public function delete($id_account){
        $this->User->Hapus($id_account);
        return redirect('setting/role')->with('delete','Delete Successfully');
    }
    public function change(){
        $title = 'Ubah Password';
        $id_account = Auth::user()->id_account;
        $data = $this->User->Temukan($id_account);
        return view('admin.change',compact('title','data'));
    }
    public function Postchange(Request $request){
        $val = Validator::make($request->all(),[
            'password'=>'required|min:6'
        ],[
            'password.required'=>'Password Tidak Boleh Kosong',
            'password.min'=>'Password Minimum 6 Karakter'
        ]);
        if($val->fails()){
            return redirect('change-password')->withErrors($val);
        }
        $id_account= Auth::user()->id_account;
        $this->User->Ubah($id_account,[
            'password'=>Hash::make($request->password)
        ]);
        return redirect('change-password')->with('Update','Ubah Password berhasil');
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
