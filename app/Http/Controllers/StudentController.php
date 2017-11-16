<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Student;

class StudentController extends Controller
{
    private  $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function index()
    {
        $students = $this->student->paginate(10); //n

        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');

    }

    public function store(StudentRequest $request)
    {
        $this->student->create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'age' => $request->input('age'),
            'email' => $request->input('email')
        ]);

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
        $student = $this->student->find($id);

        if($student){
            $student->update($request->all());
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
            ->orderBy('id', 'DESC')->get();

        return view('student.search', compact('students'));
        // dd($keyword);
    }
    
}