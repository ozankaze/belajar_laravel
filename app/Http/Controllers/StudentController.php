<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem; //bwat mindahin gambar  copy dll  :v
use App\Http\Requests\StudentRequest;
use Intervention\Image\ImageManager; //memanipulasi image
use App\Student;

class StudentController extends Controller
{
    private  $student;

    private $filesystem;
    private $imageManager;

    public function __construct(Student $student, Filesystem $filesystem, ImageManager $imageManager)
    {
        $this->student = $student;
        $this->filesystem = $filesystem;
        $this->imageManager = $imageManager;
    }

    public function index()
    {
        $students = $this->student->orderBy('id', 'DESC')->paginate(10); //n

        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');

    }

    public function store(StudentRequest $request)
    {   
        // dappetin data inputan kecuali photo
        $student = $request->except("photo");
        //cek  jika mengupload photo
        if ($request->hasFile('photo')) {
            // dd("ngupload Photo");
            $student['photo'] = $this->generatePhoto($request->file('photo'), $request->except('photo'));
            // dd($student);
        }
        $this->student->create($student);

        session()->flash('success_message', 'Data Tersimpan');

        return redirect('/student'); 
    }


    public function edit($id)
    {
        $student = $this->student->find($id);

        return view('student.edit', compact('student'));
        // dd($student);
    }

    public function update($id, StudentRequest $request)
    {
        $studentForm =  $request->except('photo');
            if ($request->hasFile('photo')) {
                // dd("ada photo");

                $studentForm['photo'] = $this->generatePhoto($request->file('photo'), $studentForm);
            }

            dd("ada photo");

        $student = $this->student->find($id);

        if($student){
            $student->update($studentForm);
        }

        session()->flash('success_message', 'Data Terupdate');

        return redirect('/student');
                // ->with('success_message', 'Data terupdate')
        // dd($id);
        // dd($request->all());
    }

    public function destroy($id)
    {
        $student = $this->student->find($id);

        if($student) {
            $student->delete();
        }

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $students = $this->student->where('name', 'like', "%$keyword%") // pake kutip dua biar bisa baca pakai variable
            ->orderBy('id', 'DESC')->paginate(10);
        $students->appends(['keyword' => $keyword]); //bwat  nargeting pag  ke hal 2

        return view('student.search', compact('students'));
        // dd($keyword);
    }
    
    private function generatePhoto($photo, $data) 
    {
        $filename = date('YmdHis').'-'.snake_case($data['name']).".".$this->filesystem->extension($photo->getClientOriginalName());
        $path = public_path("photos/").$filename;

        // dd($path);

        $this->imageManager->make($photo->getRealPath())->save($path);

        return "/photos/".$filename;
    }
}
