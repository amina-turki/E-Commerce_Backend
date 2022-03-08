<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = "articles";
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'etat','prix'
    ];
    public function Factures()
    {
        return $this->hasMany(Facture::class);
    }

public function Categories()

     {
        return $this->hasMany(Categorie::class);
    }
    
}
