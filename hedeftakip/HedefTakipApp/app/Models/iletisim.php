<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iletisim extends Model
{
    use HasFactory;
    protected $table = 'iletisim_sayfası';
    protected $fillable = ['ad','soyad', 'email', 'mesaj'];
}
