<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'moti',
        'date_depart',
        'date_retour',
    ];
}
