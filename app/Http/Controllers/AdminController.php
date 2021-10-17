<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sayfa;


class AdminController extends Controller
{
    function index()
    {
        return view('admin.sayfalar.index');
    }
    function sayfalarApi()
    {
        return sayfa::get();
    }

    function ekleApi(Request $request)
    {
        $sayfa = new sayfa();
        $sayfa->sayfa_basligi = $request->sayfaAdi;
        $sayfa->sayfa_icerik = $request->sayfaIcerik;
        $sayfa->sayfa_aciklamasi = $request->sayfaMetaAciklamasi;
        $sayfa->sayfa_anahtar_kelimeler = $request->sayfaAnahtarKelimeler;
        $sayfa->sayfa_tipi = $request->sayfaTipi;
        $sayfa->sayfa_durumu = $request->sayfaDurumu;
        if($sayfa->save()){
            return ['status'=>true,'message'=>'Başarıyla Kaydedilmiştir','data'=>$request->all()];
        }else{
            return ['status'=>false,'message'=>'Başarısız Olmuştur'];
        }

    }

    function duzenle()
    {
        return 'Burası Düzenle';
    }
}
