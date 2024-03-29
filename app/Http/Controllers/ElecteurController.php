<?php

namespace App\Http\Controllers;

use App\Models\Electeur;
use Illuminate\Http\Request;

class ElecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('electeurs.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Electeur $electeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $electeur = Electeur::find($id);
        return view("electeurs.edit", compact('electeur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Electeur $electeur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Electeur $electeur)
    {
        //
    }
}
