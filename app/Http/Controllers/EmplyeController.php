<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmplyeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $employes = employe::all()->toArray();
       return array_reverse($employes); 
    }

    /**
     * Store a newly created resource in storage.   
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employe = new employe([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'age' => $request->input('age'),
            'tel' => $request->input('tel'),
            'mail' => $request->input('mail'),
            'adresse' => $request->input('adresse'),
            'cin' => $request->input('cin'),
            'etet' => $request->input('etet'),
            //'etat' => 'E'
        ]);
        $employe->save();
        return response()->json('employe créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        $Emp = Employe::find($employe);
        return response()->json($Emp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $employe)
    {
        $Emp = Employe::find($employe);
        $Emp->update($request->all());
        return response()->json('Employe MAJ avec succées!');
    }

    /**
     * Remove the specified resource from storage.   
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $Emp = Employe::find($employe);
        $Emp->delete();
        return response()->json('Employe supprimé avec succées!');
    }
}
