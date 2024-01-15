<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secteur = Secteur::all();
        return view('secteurs.show', compact('secteur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $secteur = new Secteur();
        return view('secteurs.add', compact('secteur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //Validation des champs du formulaire
         $request->validate([
            'libelle' => 'required',
        ]);
        $secteur = new Secteur();
        $secteur->libelle = $request->libelle;
        // if ($request->hasFile('icon')) {
        //     $file = $request->file('icon');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file->move('uploads/images',$filename);
        //     $secteur->icon=$filename;
        //     }else{
        //         return $request;
        //         $secteur->icon = '';
        //     }
        $secteur->save();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->back()->with('success','Le secteurs a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Secteur $secteur)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $secteur = Secteur::find($id);
        return view("secteurs.edit",compact("secteur"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $secteur = Secteur::find($id);
        $secteur->libelle = $request->libelle;
        $secteur->update();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->route('secteurs.index')->with('success','Secteur Modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secteur $id)
    {
        $secteur=Secteur::find($id);
        $secteur->delete();
        return redirect()->back();
    }
}
