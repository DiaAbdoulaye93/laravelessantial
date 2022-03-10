<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\classe;

class classeController extends Controller
{
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'libelle' => 'required|max:255',
            'effectif' => 'required|numeric',
            'anneescolaire' => 'required|date'
        ]);
      
        classe::create($storeData);
        return redirect('')->with('completed', 'Enregistrement reussie');
    }
    public function getClasses()
    {
        $classe = classe::all();
        return view('classe/listeClasses', compact('classe'));
    }

    public function edit($id)
    {
        $classe = classe::findOrFail($id);
        
        return view('classe/editeClasse', compact('classe'));
    }
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'libelle' => 'required|max:255',
            'effectif' => 'required|numeric',
            'anneescolaire' => 'required|date'
        ]);
        classe::whereId($id)->update($updateData);
        return redirect('/classes')->with('completed', 'Modification reussi');
    }   
}
