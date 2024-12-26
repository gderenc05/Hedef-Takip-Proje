<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivasyonSozleri extends Model
{
    use HasFactory;

    protected $table = 'motivasyon_sozleri';
    protected $fillable = ['soz', 'yazar'];
}
