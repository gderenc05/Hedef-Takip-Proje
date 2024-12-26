<?php

namespace App\Http\Controllers;

use App\Models\Gorev;
use App\Models\GorevDurum;
use App\Models\GorevKategori;
use Illuminate\Http\Request;

class GorevController
{
    public function index()
    {
        $gorevler = Gorev::all();
        return view('gorev', compact('gorevler'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string',
            'baslangic_tarihi' => 'required|date',
            'bitis_tarihi' => 'required|date|after_or_equal:baslangic_tarihi',
        ]);

        Gorev::create($request->all());

        return redirect()->route('gorevler.store')->with('success', 'Görev başarıyla eklendi.');
    }
}
