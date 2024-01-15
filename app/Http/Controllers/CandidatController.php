<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;


class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidat = Candidat::all();
        return view('candidats.show', compact('candidat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidat = new Candidat();
        return view('candidats.add', compact('candidat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation des champs du formulaire
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'parti' => 'required',
            'Biographie' => 'required',
            'Validate' => 'required',
            'photo' => 'nullable',

        ]);
        $candidat = new Candidat();
        // $candidat::create($request->all());
        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->parti = $request->parti;
        $candidat->Biographie = $request->Biographie;
        $candidat->Validate = $request->Validate;
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            $file->move($destination, $file->getClientOriginalName());
            // $filename = time().'.'.$extension;
            // $file->move('downloads',$filename);
            $candidat->photo=$filename;
            }else{
                return $request;
                $candidat->photo = '';
            }
        $candidat->save();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->back()->with('success','Le candidat a été ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidat $candidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $candidat = Candidat::find($id);
        return view("candidats.edit",compact('candidat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'parti' => 'required',
            'Biographie' => 'required',
            'Validate' => 'required',
            'photo' => 'nullable',

        ]);
        $candidat = Candidat::find($id);
        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->parti = $request->parti;
        $candidat->Biographie = $request->Biographie;
        $candidat->Validate = $request->Validate;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();
            $destination = "downloads";
            $file->move($destination, $file->getClientOriginalName());
            // $filename = time().'.'.$extension;
            // $file->move('downloads',$filename);
            $candidat->photo=$filename;
            }else{
                return $request;
                $candidat->photo = '';
            }
        $candidat->update();
        // Redirection vers la page d'accueil avec un message de confirmation
        return redirect()->route('candidats.index')->with('success','Candidat Modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $candidat = Candidat::find($id);
       $candidat->delete();
       return redirect()->back();
    }

}
