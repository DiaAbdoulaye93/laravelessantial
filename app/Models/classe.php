<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    // use HasFactory;
    protected $table = 'classe';
    protected $fillable = ['libelle','effectif','anneescolaire'];
}
