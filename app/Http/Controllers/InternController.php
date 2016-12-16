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
use App\companylist;
use App\kelompok;
use App\kelompokkp;
use App\ajuankp;

class InternController extends Controller
{
    public function intern()
    {
        $data = array();
        $data['cek'] = kelompokkp::where('peserta_didik_id',Auth::user()->id)->orWhere('peserta_didik_2_id',Auth::user()->id)->count();
        $ajuan = DB::table('ajuan_kp')->select('ajuan_kp.*')->where(function ($query)
        {
            $query->where('ajuan_kp.status',0)
            ->orWhere('ajuan_kp.status',1);
        })->where('ajuan_kp.peserta_didik_id',Auth::user()->id)->count();
        if($ajuan==0)
        {
            $data['cek']=0;
        }
        $data['list'] = companylist::where('soft_delete',0)->get();
        $data['mahasiswa'] = pesertadidik::where('nrp', '!=', Auth::user()->nrp)->get();
        return view('internship-form', $data);
    }

    public function daftarkp()
    {
        $data = input::all();
        $idkelompok = Uuid::generate();
        list($uuid, $iduser) = $this->uuid_user();
        $tanggal = date('Y-m-d');
        $tglMulai = date("Y-m-d", strtotime($data['tanggalmulai']));
        $tglSelesai = date("Y-m-d", strtotime($data['tanggalselesai']));

        kelompokkp::insert(array(
            'id' => $idkelompok,
            'peserta_didik_id' => $iduser,
            'peserta_didik_2_id' => $data['friend'],
            'created_at' => $tanggal,
            'ajuankp_id' => $uuid
        ));

        kelompok::insert(array(
            'id' => $idkelompok,
            'nm_kel' => $data['namakelompok']
        ));

        ajuankp::insert(array(
            'id' => $uuid,
            'peserta_didik_id' => $iduser,
            'companylist_id' => $data['perusahaan'],
            'kelompok_pd_id' => $idkelompok ,
            'tgl_ajuan' => $tanggal,
            'tanggal_mulai' => $tglMulai,
            'tanggal_selesai' => $tglSelesai
        ));


        Session::flash('sukses', 'Berhasil input ajuan kerja praktek');
        return redirect('internform');

    }

    public function proposal()
    {
        list($iduser, $ajuankp) = $this->ajuanKPbyUser();
        $data = array();
        $data['ajuan'] = $ajuankp;
        return view('internship-proposal', $data);
    }

    public function ajuanKPbyUser()
    {
        $iduser = Auth::user()->id;
        $kelompok = kelompokkp::where('peserta_didik_id',$iduser)->orWhere('peserta_didik_2_id',$iduser)->get();
        $items =array();
        foreach ($kelompok as $item) {
            array_push($items,$item->id);
        }
        $ajuankp = ajuankp::whereIn('kelompok_pd_id', $items)->get();
        return array($iduser, $ajuankp);
    }

    public function uuid_user()
    {
        $uuid = Uuid::generate();
        $iduser = Auth::user()->id;
        return array($uuid, $iduser);
    }
}
