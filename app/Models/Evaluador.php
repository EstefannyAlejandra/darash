<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluador extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'paper_id',
        'observacion',
        'calificacion'
    ];

    public function paper()
    {
        return $this->belongsTo(Paper::class);
    }
}
