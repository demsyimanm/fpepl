<?php

namespace App\Http\Controllers;

//use Request;
use App\kelompokkp;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Uuid;
use Auth;
use Input;
use Session;
use Validator;
use DB;
use App\dailylog;
use App\ajuankp;

class DailyLogController extends Controller
{
    public function dailylog($id_akt = null)
    {
        list($iduser, $ajuankp) = $this->ajuanKPbyUser();
        $cek = ajuankp::where('peserta_didik_id',$iduser)->where('status',1)->count();
        if($cek > 0)
        {
//            dd($ajuankp);
            $data['logs'] = dailylog::where('ajuan_kp_id', '=', $ajuankp->id)->get();
            $data['flag'] = 1;
        }
        else
        {
            $data['logs'] = 0;            
            $data['flag'] = 0;
        }
        return view('daily-log', $data);
        
    }

    public function selectdailylog($id_akt)
    {
        $idActivity = $id_akt;
        $data = dailylog::where('id_akt_kp', '=', $idActivity)->first();
        return view('daily-log', $data);
    }

    public function dailylogRemove($id_akt)
    {
        dailylog::where('id', $id_akt)->delete();
        return redirect('dailylog');
    }

    public function posdailylog()
    {
        $data = input::all();
        list($uuid, $iduser) = $this->uuid_user();
        list($iduser, $idkp) = $this->ajuanKPbyUser();
        // dd($data);
        $tgl = date("Y-m-d", strtotime($data['tanggal']));
        dailylog::insert(array(
            'id' => $uuid,
            'ajuan_kp_id' => $idkp->id,
            'konten' => $data['konten'],
            'tanggal' => $tgl,
            'readed' => 0
        ));
        return redirect('dailylog');

    }

    public function ajuanKPbyUser()
    {
        $iduser = Auth::user()->id;
        $kelompok = kelompokkp::where('peserta_didik_id', $iduser)->orWhere('peserta_didik_2_id', $iduser)->get();
        $items = array();
        foreach ($kelompok as $item) {
            array_push($items, $item->id);
        }
        $ajuankp = ajuankp::whereIn('kelompok_pd_id', $items)->where('status',1)->first();

//        dd($ajuankp);
        return array($iduser, $ajuankp);
    }

    public function uuid_user()
    {
        $uuid = Uuid::generate();
        $iduser = Auth::user()->id;
        return array($uuid, $iduser);
    }
}
