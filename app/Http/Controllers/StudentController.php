<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

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
    // public function create()
    // {
    //     return view('create');
    // }
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
        return response()->json([
            'status' => 200,
            'message' => 'modification reussi',
            
        ]);
    }
    
    public function deletestudent($id)
    {
        return student::destroy($id);
    }
   
    public function store(Request $request)
    {
    
        $storeData = $request->validate([
            'prenom' => 'required|max:255',
            'nom' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|numeric',
            'cours' => 'required|max:1000',
        ]);
        try {
            Student::create($storeData);
            Alert::success('Bravo', 'ajout reussi');
            return view('etudiant/ajouterEtudiant');
        } catch (\Exception $e){
            Alert::success('error', 'Veuillez assayer');
            return view('etudiant/ajouterEtudiant');
        }
        // Student::create($storeData);
        // Alert::success('Bravo', 'ajout reussi');
        //  return view('etudiant/ajouterEtudiant');
    }
    // StudentController.php
    public function index()
    {
        $student = Student::all();
        return view('etudiant/listeEtudiant', compact('student'));
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('etudiant/editerEtudiant', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'prenom' => 'required|max:255',
            'nom' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|numeric',
            'cours' => 'required|max:1000',
        ]);
        try{
            Student::whereId($id)->update($updateData);
            Alert::success('Bravo', 'ajout reussi');
            return redirect('/students')->with('completed', 'Modification reussi');
        } catch (\Exception $e){
            Alert::success('error', 'Veuillez assayer');
            return view('etudiant/ajouterEtudiant');
        }
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/students')->with('completed', 'Student has been deleted');
    }
}
