<?php

namespace App\Http\Controllers;

use App\Models\Hedef;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function statistics()
    {


        $kategoriler = Kategori::all();
        $hedefler = Hedef::all();
        $toplamHedefSayisi = $hedefler->count();
        $tamamlananHedefSayisi = $hedefler->where('durum_id', 3)->count();
        $devamEdenHedefSayisi = $hedefler->where('durum_id', 2)->count();
        // Bu ayın hedefleri için query builder kullanıyoruz
        $yeniHedeflerAy = Hedef::whereMonth('baslangic_tarihi', now()->month)->count();


        $baslangicHedefleri = $hedefler->where('durum_id', 1)->count();
        $devamEdenHedefleri = $hedefler->where('durum_id', 2)->count();
        $bittiHedefleri = $hedefler->where('durum_id', 3)->count();

        return view('statistics.index', compact(
            'toplamHedefSayisi',
            'tamamlananHedefSayisi',
            'devamEdenHedefSayisi',
            'yeniHedeflerAy',
            'hedefler',
            'baslangicHedefleri',
            'devamEdenHedefleri',
            'bittiHedefleri'
        ));
    }

    public function filter(Request $request)
    {

        $kategoriler = Kategori::all();


        $hedefler = Hedef::all();

        return view('statistics.index', compact('kategoriler', 'hedefler'));
    }

    public function index()
    {

        $kategoriler = Kategori::all();


        $kategoriHedefSayilari = [];

        foreach ($kategoriler as $kategori) {
            $kategoriHedefSayilari[$kategori->id] = $kategori->hedefler()->count();
        }

        return view('statistics.index', compact('kategoriler', 'kategoriHedefSayilari'));
    }
}
