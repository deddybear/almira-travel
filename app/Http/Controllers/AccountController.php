<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;


class AccountController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next){
            $this->id = Auth::user()->id;

            return $next($request);
        });
    }


    /** 
        * TODO : Admin Function
    */
    
    public function pageView() {
        $dataAkun = Auth::user();
        return view('dashboard.edit-akun', compact('dataAkun'));
    }

    public function changeName(Request $req) {

        $req->validate([
            'nama_akun' => 'required|string|between:5,50'
        ]);

        try {
            User::where('id', $this->id)->update(['name' => $req->nama_akun]);
            return redirect('/admin/dashboard/account')->with('sukses', 'Berhasil merubah nama akun anda');
        } catch (\Throwable $th) {
            return redirect('/admin/dashboard/account')->with('gagal', 'Gagal merubah nama akun anda');
        }
    }

    public function changePassword(Request $req) {

        $req->validate([
            'password_sekarang' => 'required|string',
            'password'          => 'required|string|between:8,17|confirmed'
        ]);

        try {
            $data = User::select('password')->where('id', $this->id)->first();

            if (Hash::check($req->password_sekarang, $data->password)) {
                return redirect('/admin/dashboard/account')->with('password_sekarang', 'Password Baru dan Lama tidak boleh sama');
            }
                 
            User::where('id', $this->id)->update(['password' => Hash::make($req->password)]);
            $req->session()->flush();
            return redirect('/login')->with('sukses', 'Berhasil merubah password akun anda');
                
            
        } catch (\Throwable $th) {
            return redirect('/admin/dashboard/account')->with('gagal', 'Data User tidak diketahui coba sekali lagi');
        }
    }

    public function changeEmail(Request $req) {

        $req->validate([
            'email' => 'required|email|max:40', Rule::unique('tbl_users', 'email')->ignore($this->id)
        ]);

        try {
            return redirect('/admin/dashboard/account')->with('sukses', 'Berhasil merubah email akun anda');
        } catch (\Throwable $th) {
            return redirect('/admin/dashboard/account')->with('sukses', 'Gagal merubah email akun anda');
        }

    }
}
