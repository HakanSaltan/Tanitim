<?php

namespace App\Http\Controllers;

use App\sayfa;

class SayfalarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index($deger = "")
    {
        $deger = "/". $deger;
        $sayfa = sayfa::where('sayfa_url', $deger)->first();

        if($sayfa != null)
        {
            return view('page')->with('sayfa', $sayfa);
        }
        else
        {
            return "Sayfa Bulunamadı";
        }

    }
    public function menuler()
    {
        $sayfalar = sayfa::all();
        return ['status' => true, 'data' => $sayfalar];
    }


}
