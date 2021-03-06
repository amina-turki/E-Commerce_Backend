<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::all()->toArray();
       return array_reverse($articles); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     /*   if (article::create($request->all())) {
            return response()->json([
                'success' => 'Actualité créée avec succès'
            ], 200);
        }
*/

        $client = new article([
            'referance' =>$request->input('referance'),
            'nom' => $request->input('nom'),
            'prixA' => $request->input('prixA'),
            'prixV' => 500,
            'etat' => 'E'
        ]);
        $client->save();
        return response()->json('Client créé !');
      
    }


    function getArticleCatUnProd(Request $request,$id){
        $record = DB::select("select c.nom as type , c.description, c.id from categories c, articles a where  a.id=c.articleCat_id and c.articleCat_id=? ",[$id]);
        return $record;
    }

    function getArticleCat(Request $request){
        $record = DB::select("select c.nom as type,c.id as idc , c.description,a.* from categories c, articles a where  a.id=c.articleCat_id  ");
        return $record;
    }

    public function storeByAtt(Request $request)
    {
        $client = new article([
            'referance' =>$request->input('referance'),
            'nom' => $request->input('nom'),
            'prixA' => $request->input('prixA'),
            'prixV' => $request->input('prixV'),
            'etat' => 'E'
        ]);
        $client->save();
        return response()->json('Client créé !');
    }


    
    public function recherche ($nom) {
       return $clients  =  DB::table('articles')
                      ->where('nom' , 'LIKE' , '%'.$nom.'%' )
                      ->get();
                      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show( $article)
    {
        $Art = Article::find($article);
        return response()->json($Art);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $article)
    {
        $Art = Article::find($article);
        $Art->update($request->all());
        return response()->json('article MAJ !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {
        $Art = Article::find($article);
        $Art->delete();
        return response()->json('Article supprimé !');
    }

    

  
}
