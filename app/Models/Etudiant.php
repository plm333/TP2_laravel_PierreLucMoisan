<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse', 
        'telephone',
        'courriel',
        'date_de_naissance',
        'ville_id'
    ];

    // protected $table = 'nom_table';
    // protected $primaryKey = 'nom_id';
    // $timestamp = false;

    public function etudiantHasVille(){
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }
}
