<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WelcomeController extends Controller
{
    public function welcome()
    {
        $query = DB::table('m_provinsi')
            //->leftJoin('m_provinsi', 'djv_job_vacancy_detail.id_provinsi', '=', 'm_provinsi.id')
            ->select(
                //'djv_job_vacancy_detail.lokasi',
                'm_provinsi.nama as namaprovinsi',
                'm_provinsi.id as idprovinsi',
                
            );
        //$data['getDtProvinsi']=$query->where('djv_job_vacancy_detail.status',1)->get();
        $data['getDtProvinsi']=$query->get();
        $query = DB::table('news_detail')
        ->join('m_news', 'm_news.id', '=', 'news_detail.id_m_news')
        ->select('news_detail.*', 'm_news.nama as category') ;
    $data ['news'] = $query->where('news_detail.status',1)->orderBy('news_detail.created_at', 'desc')->limit(6)->get();
        return view('welcome',$data);
    }
}
