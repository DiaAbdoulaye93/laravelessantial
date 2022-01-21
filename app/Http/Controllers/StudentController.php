<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function create(Request $request)
    {
        $student= new Student();
        $student->prenom= $request->input('prenom'); 
        $student->nom= $request->input('nom');
        $student->cours= $request->input('cours');
        $student->email= $request->input('email'); 
        $student->telephone= $request->input('telephone'); 
        $student->save();
        return response()->json([
            'status' => 200,
            'message' => 'Ajout étudiant validé',
        ]);

    }
    public function getstudent(){
        $students= student::all();
        return response()->json([
            'status' => 200,
            'students' => $students,
        ]);
       
    }   
     public function getstudentdetails($id){
        $student= student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $student,
        ]);
    }
    public function updatestudent(Request $request,$id)
    {
        //
        $student=student::find($id);
        $student->update($request->all());
        // dd($student);
        // return $student;
        return response()->json([
            'status' => 200,
            'message' => 'modification reussi',
            
        ]);
    }
    public function deletestudent($id)
    {
        return student::destroy($id);
    }
}
