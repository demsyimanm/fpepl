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
use App\companylist;


class CompanyController extends Controller
{

    public function tambahperusahaan()
    {
        $data = input::all();
        $id = Uuid::generate();
        companylist::insert(array(
            'id' => $id,
            'nm_lemb' => $data['nama'],
            'jl' => $data['alamat'],
            'jabatan_pic' => $data['jabatan'],
            'profil' => $data['profil'],
            'telpon' => $data['telpon'],
            'jenis' => $data['jenisbisnis'],
            'pic' => $data['personincharge']
        ));

        session::flash('registersukses1', 'ok');
        return redirect('companylist');
    }

    public function updateperusahaan()
    {
        $data = input::all();


        $item = companylist::where('id',$data['id'])->first();
        $item->nm_lemb = $data['nama'];
        $item->jl = $data['alamat'];
        $item->jabatan_pic = $data['jabatan'];
        $item->profil = $data['profil'];
        $item->telpon = $data['telpon'];
        $item->jenis = $data['jenisbisnis'];
        $item->pic = $data['personincharge'];
        $item->save();

        session::flash('Update Sukses', 'ok');
        return redirect('companylist');
    }

    public function listperusahaan()
    {
        $data = array();
        $data['list'] = companylist::where('soft_delete',0)->get();
        return view('company-list', $data);
    }

    public function listperusahaanRemove($id)
    {
        companylist::where('id',$id)->update(array(
        'soft_delete' => 1
      ));
        return redirect('companylist');
    }

    public function listperusahaanUpdate($id)
    {
        $data['list'] = companylist::get();
        $data['item'] = companylist::where('id', $id)->first();
        return view('company-update', $data);
    }

}
