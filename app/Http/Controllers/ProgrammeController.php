<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Programme;
use App\Models\Secteur;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programme = Programme::all();
        return view('programmes.show', compact('programme'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programme = new Programme();
        // $candidat = Candidat::pluck(['id','nom']);
        $candidats = Candidat::all();
        $secteur = Secteur::all();
        return view('programmes.add', compact('programme','candidats','secteur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //Validation des champs du formulaire
         $request->validate([
            'titre' => 'required',
            'contenu' => 'required',
            'document' => 'required',
            'candidat_id' => 'required',
            'secteur_id' => 'required'

        ]);
        $programme = new Programme();
        $programme->titre = $request->titre;
        $programme->contenu = $request->contenu;
        $programme->candidat_id = $request->candidat_id;
        $programme->secteur_id = $request->secteur_id;
        // $programme->document = $request->document;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            // $filename = time().'.'.$extension;
            $file->move($destination,$filename);
            $programme->document=$filename;
            }else{
                return $request;
                $programme->document = '';
            }
        $programme->save();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->back()->with('success','Le programme a été ajouté avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Programme $programme)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $programme = Programme::find($id);
        $secteurs = Secteur::all();
        $candidats = Candidat::all();
        return view("programmes.edit",compact("programme","candidats","secteurs"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $programme = Programme::find($id);
        $programme->titre = $request->titre;
        $programme->contenu = $request->contenu;
        $programme->candidat_id = $request->candidat_id;
        $programme->secteur_id = $request->secteur_id;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            // $filename = time().'.'.$extension;
            $file->move($destination,$filename);
            $programme->document=$filename;
            }else{
                return $request;
                $programme->document = '';
            }
        $programme->update();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->route('programmes.index')->with('success','Programme Modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $programme = Programme::find($id);
        $programme->delete();
        return redirect()->back();
    }
}
