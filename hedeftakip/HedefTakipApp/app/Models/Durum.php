<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durum extends Model
{
    use HasFactory;
    protected $table = 'durumlar';
    protected $fillable = ['ad'];

    public function hedefler()
    {
        return $this->hasMany(Hedef::class);
    }
}
