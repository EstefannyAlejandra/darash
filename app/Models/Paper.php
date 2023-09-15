<?php

namespace App\Models;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

     public function user()
     {
    	return $this->belongsTo(User::class);
     }

     public function evento()
     {
    	return $this->belongsTo(Evento::class);
     }

}
