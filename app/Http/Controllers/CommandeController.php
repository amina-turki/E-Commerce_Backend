<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Commandes = Commande::all()->toArray();
       return array_reverse($Commandes); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Commande::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show($commande)
    {
        $Comma = Commande::find($commande);
        return response()->json($Comma);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $commande)
    {
        $Comma = Commande::find($commande);
        $Comma->update($request->all());
        return response()->json('Commande MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy( $commande)
    {
        $comma = Commande::find($commande);
        $comma->delete();
        return response()->json('commande supprimé !');
    }


    function getArticleCat(Request $request){
        $record = DB::select("select cl.nom , cl.prenom,cl.tel,cl.mail,cl.adresse,a.nom,l.montant,c.date  from ligne_commandes l, commandes c , clients cl , articles a  where  l.commande_id=c.id and l.article_id=a.id  and c.client_id =cl.id ");
        return $record;
    }

}
