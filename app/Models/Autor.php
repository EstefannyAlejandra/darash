<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'paper_id',
        'country_id'
    ];

    public function autores(){
        return $this->belongsTo(Paper::class);
    }

}
