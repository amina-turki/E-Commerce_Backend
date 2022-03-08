<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    public $table = "ligne_commandes";
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantité', 'montant','commande_id','article_id'
    ];

    public function articles(){
        return $this->belongsTo(Article::class);
    }

    public function commandes(){
        return $this->belongsTo(Commande::class);
    }
}
