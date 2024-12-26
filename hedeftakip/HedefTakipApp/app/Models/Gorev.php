<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gorev extends Model
{
    use HasFactory;
    protected $table = 'gorevler';
    protected $fillable = [
        'ad',
        'aciklama',
        'baslangic_tarihi',
        'bitis_tarihi',
    ];


}
