<?php
namespace App\Http\Controllers; // ikut name space

use App\Student;

class  LoginController extends Controller { // rus extend

    public function index()
    {
        //mendapatkan data yang id 1
        // return Student::find(1);

        // return Student::where('age', 21)
        //                 ->orWhere('age', 25)
        //                 ->get();

        //tampilkan semmua data di students
        // return Student::all();

        //insert data
        // Student::create([
        //     'name' => 'Ozan Tamvan',
        //     'address' => 'Cirebon, Kec kapetakan',
        //     'age' =>  '12',
        //     'email' => 'ptmajumundur@gmail.com'
        // ]);

        // Delete Data
        $student = Student::find(1);
        if($student) {
            $student->delete();
        }
        // Student::find(1)->delete();

        $student2 = Student::find(2);
        if($student2) {
            $student2->update([
                'name' => 'curanmor',
                'address' => 'Indramayu, Kec kapetakan',
                'age' =>  17,
                'email' => 'ptmajumaju@gmail.com'
            ]);
        }


        // return 'ini  dari login contrhaoller@index';
        // $nama = "AHMAD FAUZAN";
        // $sekolah = "SMKN 1 KRANGKENG";
        // $dataArray = ['KAMU', 'TAMMBAH', 'AKU', 'JADI', 'KITA']; //array

        // cara ke1
        // return view('login.login', ['nama' => $nama]); 

        // cara ke2
        // return view('login.login')->with('nama', $nama); 
        
        // cara ke3
        // return view('login.login', compact('nama', 'sekolah', 'dataArray')); // cara ini di rekomdasikan kata mas budi
    }

}





        // return Student::where('age', 21)->get();
// ->where('id', 3)
                        // ->first();

///----------------- Yang Ke 2