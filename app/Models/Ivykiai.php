<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ivykiai extends Model
{
    use HasFactory;

    protected $fillable = [
        'pradzia',
        'trukme',
        'koeficientas_1',
        'koeficientas_2',
        'komanda_1',
        'komanda_2',
        'rezultatas',
        'status',
    ];
    public function komanda()
    {
        return $this->belongsTo('App\Models\Ivykiai');
    }
}
