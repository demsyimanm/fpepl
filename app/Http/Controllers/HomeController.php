<?php

namespace App\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Uuid;
use Auth;
use Input;
use Session;
use Validator;
use DB;
use App\pesertadidik;
use App\ajuankp;

class HomeController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        if (Auth::user()->role == 3) return view('index');
        elseif (Auth::user()->role == 1) {
            $news = ajuankp::where('status', 0)->get();
            return view('admin.permohonan', compact('news'));
        } else {
            
        }
    }

    public function dashboardAdmin()
    {

    }

    public function login(Request $request)
    {
        $new = $request->only('nrp', 'password');

        if (Auth::attempt($new, true)) {
            $id = Auth::user()->nm_pd;
            return redirect('dashboard');
        } else {

            Session::flash('status', 'failed');
            return redirect('/');

        }
    }

    public function register()
    {
        return view('register');
    }

    public function regisform()
    {
        $data = input::all();
        $id = Uuid::generate();
        $password = bcrypt($data['password']);
        $cek = pesertadidik::where('nrp', $data['nrp'])->count();

        if ($cek > 0) {
            Session::flash('status', 'exist');
            return view('register');
        } else if (substr($data['nrp'], 0, 2) != '51') {
            Session::flash('status', 'register-failed');
            return view('register');
        }
        pesertadidik::insert(array(
            'id' => $id,
            'nm_pd' => $data['nama'],
            'jk' => $data['jeniskelamin'],
            'tgl_lahir' => $data['tanggallahir'],
            'nrp' => $data['nrp'],
            'email' => $data['email'],
            'no_hp' => $data['telpon'],
            'password' => $password,
            'role' => 3
        ));
        session::flash('registersukses', 'ok');
        return redirect('/');

    }

    public function registerDosen()
    {
        return view('dosen.register');
    }

    public function regisformDosen()
    {
        $data = input::all();
        $id = Uuid::generate();
        $password = bcrypt($data['password']);
        $cek = pesertadidik::where('nrp', $data['nrp'])->count();

        if ($cek > 0) {
            Session::flash('status', 'exist');
            return view('dosen.register');
        }
        pesertadidik::insert(array(
            'id' => $id,
            'nm_pd' => $data['nama'],
            'jk' => $data['jeniskelamin'],
            'tgl_lahir' => $data['tanggallahir'],
            'nrp' => $data['nrp'],
            'email' => $data['email'],
            'no_hp' => $data['telpon'],
            'password' => $password,
            'role' => 2
        ));
        session::flash('registersukses', 'ok');
        return redirect('/');

    }

}
