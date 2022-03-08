<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    public $table = "factures";
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'tva','taxe','nom_societe','adresse','quantite','articleFac_id '
    ];
    public function articles(){
        return $this->belongsTo(Article::class);
    }

}
