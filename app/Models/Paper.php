<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'resumen',
        'topicos',
        'paper',
        'user_id',
    ];

     public function users()
     {
    	return $this->belongsToMany(User::class);
     }

     public function evaluador()
     {
         return $this->hasMany(Evaluador::class);
     }

     public function autor()
     {
         return $this->hasMany(Autor::class);
     }

    

}
