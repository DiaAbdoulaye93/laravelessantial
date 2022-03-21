<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use GrahamCampbell\ResultType\Success;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    public function create(Request $request)
    {
        $student = new Student();
        $student->prenom = $request->input('prenom');
        $student->nom = $request->input('nom');
        $student->cours = $request->input('cours');
        $student->email = $request->input('email');
        $student->telephone = $request->input('telephone');
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
    public function getstudent()
    {
        $students = student::all();
        return response()->json([
            'status' => 200,
            'students' => $students,
        ]);
    }
    public function getstudentdetails($id)
    {
        $student = student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $student,
        ]);
    }
    public function updatestudent(Request $request, $id)
    {
        //
        $student = student::find($id);
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
            'prenom' => 'required|min:3|max:255',
            'nom' => 'required|min:2|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|numeric',
            'cours' => 'required|max:1000',
        ], [
            'required' => 'Le :attribute est Obligatoire.',
            'min' => 'Un :attribute est composé au moins de :min caractéres.',
            'max' => 'Un :attribute ne doit pas dépasser :max caractéres.',

        ]);
        try {
            Student::create($storeData);
            toast('insertion reussi','success');
            return view('etudiant/ajouterEtudiant');
        } catch (\Exception $e) {
            toast('Echec insertion','error');
            return view('etudiant/ajouterEtudiant');
        }
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
        return view('etudiant/ajouterEtudiant', compact('student'));
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
        try {
            Student::whereId($id)->update($updateData);
            toast('Modification reussi','success');
            return redirect('/students')->with('completed', 'Modification reussi');
        } catch (\Exception $e) {
            toast('Echec modification','error');
            return view('etudiant/ajouterEtudiant');
        }
    }
    public function destroy($id)
    {


        $student = Student::findOrFail($id);

        // $student->delete();
        alert()->question('Sweet Alert with warning.')->with();
        // Alert::question('Voulez vous supprimer', 'Cette action est irreversible');
        return redirect('/students')->with('csuccess', 'User deleted successfully');
    }
    public function myNotification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.', 'Basic');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.', 'Welcome to ItSolutionStuff.com')->autoclose(3500);
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                break;
            default:
                # code...
                break;
        }


        return view('my-notification');
    }
}
