<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Factures = Facture::all()->toArray();
        return array_reverse($Factures); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Facture::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function show($facture)
    {
        $Comma = Facture::find($facture);
        return response()->json($Comma);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $facture)
    {
        $Comma = Facture::find($facture);
        $Comma->update($request->all());
        return response()->json('Facture MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facture  $facture
     * @return \Illuminate\Http\Response
     */
    public function destroy($facture)
    {
        
        $comma = Facture::find($facture);
        $comma->delete();
        return response()->json('Facture supprimé !');
    }
}
