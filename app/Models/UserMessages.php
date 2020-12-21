<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'receiver',
        'date',
        'sender'
    ];

    protected $hidden = [
        'id'
    ];
}
