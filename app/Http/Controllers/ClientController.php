<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use App\Http\Resources\RessourceClient as ResourcesClient;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource. comment
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //return client::all();
       $clients = client::all()->toArray();
       return array_reverse($clients); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (client::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);
        }
    }


    public function storeByAtt(Request $request)
    {
        $client = new Client([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'tel' => $request->input('tel'),
            'mail' => $request->input('mail'),
            'adresse' => $request->input('adresse'),
        ]);
        $client->save();
        return response()->json('Client créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        return new ResourcesClient($client);
    }



    public function showById($id)
    {
    $client = Client::find($id);
    return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, client $client)
    {
        if ($client->update($request->all())) {
            return response()->json([
                'success' => 'Actualité modifiée avec succès'
            ], 200);
        }
    }


    public function update2(Request $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return response()->json('Client MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(client $client)
    {
        $client->delete();
        return response()->json('Client supprimé !');
    }


    public function deleteById($id)
    {
        $client = Client::find($id);
        $client->delete();
        return response()->json('Client supprimé !');
    }
}
