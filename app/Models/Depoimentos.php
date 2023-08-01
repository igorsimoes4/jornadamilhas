<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimentos extends Model
{
    protected $table = 'depoimentos';

    use HasFactory;

    protected $fillable = [
        'foto',
        'depoimento',
        'nome_user',
    ];

}
