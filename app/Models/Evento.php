<?php

namespace App\Models;

use App\Models\Paper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fecha_fin',
        'user_id',
        'publicado'
    ];

    public function papers()
    {
        return $this->hasMany(Paper::class);
    }
    
    public function admEvento()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
