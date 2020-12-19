<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasiulymai extends Model
{
    use HasFactory;

    protected $fillable = [
        'pradzia',
        'pabaiga',
        'informacija',
        'pavadinimas',
    ];


}
