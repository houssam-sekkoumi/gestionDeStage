<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prof extends Model
{
    protected $fillable = ['nom', 'prenom','email','password','matricule','filière'];

}
