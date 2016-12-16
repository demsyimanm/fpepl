<?php

namespace App\Http\Controllers;
use Request;
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
use App\dailylog;

class AdminController extends Controller
{
    public function approval($id)
    {
        if (Request::isMethod('get')) {
            $req = ajuankp::find($id);
            $lecturers = pesertadidik::where('role',2)->get();
            $kel = kelompokkp::where('kelompok_pd_id',$req->kelompok_pd_id)->first();
            return view('admin.approval', compact('req','kel','lecturers'));
        } 
        else if (Request::isMethod('post')) {
            $data = Input::all();
            
            ajuankp::where('id', $id)->update(array(
                'status'         => $data['status'], 
                'dosbing_id'     => $data['dosbing'], 
            ));
            if($data['status']==2)
            {
                 ajuankp::where('id', $id)->update(array( 
                    'dosbing_id'     => "" 
                ));
            }
            return redirect('dashboard');
        }
    }

    public function accepted()
    {
        if (Request::isMethod('get')) {
            $reqs = ajuankp::where('status',1)->get();
            return view('admin.approved', compact('reqs'));
        } 

    }

    public function rejected()
    {
        if (Request::isMethod('get')) {
            $reqs = ajuankp::where('status',2)->get();
            return view('admin.rejected', compact('reqs'));
        } 

    }

    public function logs($id)
    {
        if (Request::isMethod('get')) {
            $logs = dailylog::where('ajuan_kp_id',$id)->get();
            $req = ajuankp::find($id);
            $kelompok = kelompokkp::where('kelompok_pd_id',$req->kelompok_pd_id)->first();
            return view('admin.homeDailyLog', compact('logs','req','kelompok'));
        } 

    }
}
