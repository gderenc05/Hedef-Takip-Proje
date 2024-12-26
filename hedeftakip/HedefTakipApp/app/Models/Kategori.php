<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoriler';

    protected $fillable = ['ad', 'aciklama'];


    public function hedefler()
    {
        return $this->hasMany(Hedef::class, 'kategori_id');
    }

}
