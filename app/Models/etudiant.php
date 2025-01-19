<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    protected $fillable = ['nom', 'prenom','email','password','matricule','filière','classe', 'groupe'];

}
