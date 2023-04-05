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
        'date_de_naissance',
        'ville_id',
        'user_id'
    ];

    // protected $table = 'nom_table';
    // protected $primaryKey = 'nom_id';
    // $timestamp = false;

    public function etudiantHasVille(){
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }

    public function etudiantHasUser(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
