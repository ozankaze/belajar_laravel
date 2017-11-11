<?php
namespace App\Http\Controllers; // ikut name space

class  LoginController extends Controller { // rus extend

    public function index()
    {
        // return 'ini  dari login contrhaoller@index';
        $nama = "AHMAD FAUZAN";
        $sekolah = "SMKN 1 KRANGKENG";
        $dataArray = ['KAMU', 'TAMMBAH', 'AKU', 'JADI', 'KITA']; //array

        // cara ke1
        // return view('login.login', ['nama' => $nama]); 

        // cara ke2
        // return view('login.login')->with('nama', $nama); 
        
        // cara ke3
        return view('login.login', compact('nama', 'sekolah', 'dataArray')); // cara ini di rekomdasikan kata mas budi
    }

}







///----------------- Yang Ke 2