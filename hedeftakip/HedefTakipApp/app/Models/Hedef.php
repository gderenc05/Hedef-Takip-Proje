<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hedef extends Model
{
 use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'hedefler';

    protected $fillable = [
        'ad',
        'kategori_id',
        'aciklama',
        'baslangic_tarihi',
        'bitis_tarihi',

    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function durum()
    {
        return $this->belongsTo(Durum::class);
    }


}
