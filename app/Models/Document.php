<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'nom_fr',
        'date',
        'path',
        'user_id'
    ];

    public function articleHasUser(){
        return $this->hasOne
        ('App\Models\User','id','user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
