<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ayar;

class AyarlarController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    function ayarlarIndex()
    {
        return view('admin.ayarlar.index');
    }
    function ayarApi()
    {
        return ayar::get();
    }
    function ayarFiltreApi($status=null)
    {
        if($status=="aktif"){

            return ayar::where('sayfa_durumu','=','aktif')->get();
        }elseif($status=="pasif"){

            return ayar::where('sayfa_durumu','=','pasif')->get();
        }else{
            return '';
        }
    }

    function ayarEkleApi(Request $request)
    {
        $sayfa = new ayar();
        $sayfa->ayar_anahtari = $request->ayarAnahtari;
        $sayfa->ayar_degeri= $request->ayarDegeri;
    
        if($sayfa->save()){
            return ['status'=>true,'message'=>'Başarıyla Kaydedilmiştir','data'=>$request->all()];
        }else{
            return ['status'=>false,'message'=>'Başarısız Olmuştur'];
        }

    }

    function ayarGuncelleApi(Request $request)
    {
        /*$duzenlenecekVeri=json_decode($request->duzenlenecekVeri,true);
        
        $sayfa = sayfa::where('id','=',$duzenlenecekVeri['id'])->first();
        $sayfa->sayfa_basligi = $duzenlenecekVeri['sayfa_basligi'];
        $sayfa->sayfa_icerik = $duzenlenecekVeri['sayfa_icerik'];
        $sayfa->sayfa_aciklamasi = $duzenlenecekVeri['sayfa_aciklamasi'];
        $sayfa->sayfa_anahtar_kelimeler = $duzenlenecekVeri['sayfa_anahtar_kelimeler'];
        $sayfa->sayfa_tipi = $duzenlenecekVeri['sayfa_tipi'];
        $sayfa->sayfa_durumu = $duzenlenecekVeri['sayfa_durumu'];*/
        $sayfa = ayar::where('id','=',$request->id)->first();
        $sayfa->ayar_anahtari = $request->ayarAnahtari;
        $sayfa->ayar_degeri= $request->ayarDegeri;
        if($sayfa->save()){
            return ['status'=>true,'message'=>'Başarıyla Kaydedilmiştir','data'=>$request->all()];
        }else{
            return ['status'=>false,'message'=>'Başarısız Olmuştur'];
        }

    }
    function ayarSilApi(Request $request){
        
        $sayfa = ayar::where('id','=',$request->id)->first();
        if($sayfa->delete()){
            return ['status'=>true,'message'=>'Başarıyla Silinmiştir','data'=>$request->all()];
        }else{
            return ['status'=>false,'message'=>'Başarısız Olmuştur'];
        }
        
    }
}
