<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sayfa;


class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index()
    {
        return view('admin.sayfalar.index');
    }
    function sayfalarApi()
    {
        return sayfa::get();
    }
    function sayfalarFiltreApi($status=null)
    {
        if($status=="aktif"){

            return sayfa::where('sayfa_durumu','=','aktif')->get();
        }elseif($status=="pasif"){

            return sayfa::where('sayfa_durumu','=','pasif')->get();
        }else{
            return '';
        }
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
        $sayfa->sayfa_url = $request->sayfaUrl;
        $sayfa->menude_goster = $request->menudeGoster;
        if($sayfa->save()){
            return ['status'=>true,'message'=>'Başarıyla Kaydedilmiştir','data'=>$request->all()];
        }else{
            return ['status'=>false,'message'=>'Başarısız Olmuştur'];
        }

    }

    function guncelleApi(Request $request)
    {
        /*$duzenlenecekVeri=json_decode($request->duzenlenecekVeri,true);
        
        $sayfa = sayfa::where('id','=',$duzenlenecekVeri['id'])->first();
        $sayfa->sayfa_basligi = $duzenlenecekVeri['sayfa_basligi'];
        $sayfa->sayfa_icerik = $duzenlenecekVeri['sayfa_icerik'];
        $sayfa->sayfa_aciklamasi = $duzenlenecekVeri['sayfa_aciklamasi'];
        $sayfa->sayfa_anahtar_kelimeler = $duzenlenecekVeri['sayfa_anahtar_kelimeler'];
        $sayfa->sayfa_tipi = $duzenlenecekVeri['sayfa_tipi'];
        $sayfa->sayfa_durumu = $duzenlenecekVeri['sayfa_durumu'];*/
        $sayfa = sayfa::where('id','=',$request->id)->first();
        $sayfa->sayfa_basligi = $request->sayfaAdi;
        $sayfa->sayfa_icerik = $request->sayfaIcerik;
        $sayfa->sayfa_aciklamasi = $request->sayfaMetaAciklamasi;
        $sayfa->sayfa_anahtar_kelimeler = $request->sayfaAnahtarKelimeler;
        $sayfa->sayfa_tipi = $request->sayfaTipi;
        $sayfa->sayfa_durumu = $request->sayfaDurumu;
        $sayfa->sayfa_url = $request->sayfaUrl;
        $sayfa->menude_goster = $request->menudeGoster;
        if($sayfa->save()){
            return ['status'=>true,'message'=>'Başarıyla Kaydedilmiştir','data'=>$request->all()];
        }else{
            return ['status'=>false,'message'=>'Başarısız Olmuştur'];
        }

    }
    function silApi(Request $request){
        
        $sayfa = sayfa::where('id','=',$request->id)->first();
        if($sayfa->delete()){
            return ['status'=>true,'message'=>'Başarıyla Silinmiştir','data'=>$request->all()];
        }else{
            return ['status'=>false,'message'=>'Başarısız Olmuştur'];
        }
        
    }
}
