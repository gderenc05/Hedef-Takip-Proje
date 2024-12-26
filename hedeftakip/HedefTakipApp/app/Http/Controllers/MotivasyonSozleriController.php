<?php

namespace App\Http\Controllers;

use App\Models\MotivasyonSozleri;
use Illuminate\Http\Request;

class MotivasyonSozleriController extends Controller
{
    public function sozleriListele()
    {
        $sozler = MotivasyonSozleri::all();
        return view('welcome', compact('sozler'));
    }


    public function sozuEkle(Request $request)
    {

        $request->validate([
            'soz' => 'required|string|max:255',
            'yazar' => 'nullable|string|max:255',
        ]);


        MotivasyonSozleri::create([
            'soz' => $request->soz,
            'yazar' => $request->yazar,
        ]);

        return redirect()->route('motivasyon.sozler_listele')->with('success', 'Yeni söz başarıyla eklendi.');
    }


    public function sozuSil($id)
    {
        $soz = MotivasyonSozleri::findOrFail($id); // Sözün ID'sine göre bul
        $soz->delete(); // Sözün silinmesi
        return redirect()->route('motivasyon.sozler_listele')->with('success', 'Söz başarıyla silindi.');
    }
}
