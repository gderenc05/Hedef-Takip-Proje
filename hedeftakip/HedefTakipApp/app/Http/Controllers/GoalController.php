<?php

namespace App\Http\Controllers;


use App\Models\Durum;
use App\Models\Gorev;
use App\Models\Hedef;
use App\Models\Kategori;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GoalController extends Controller
{
    public function index()
    {

        $hedefler = Hedef::with('kategori')->get();
        $kategoriler = Kategori::all();


        return view('goal-management.index', compact('hedefler', 'kategoriler'));
    }

    public function create()
    {
        // Tüm kategorileri al
        $kategoriler = Kategori::all();


        return view('goal-management.create', compact('kategoriler'));
    }

    public function edit(Hedef $hedef)
    {

        $kategoriler = Kategori::all();


        return view('goal-management.edit', compact('hedef', 'kategoriler'));
    }

    public function update(Request $request, Hedef $hedef)
    {

        $validated = $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string|max:1000',
            'baslangic_tarihi' => 'nullable|date',
            'bitis_tarihi' => 'nullable|date',

            'kategori_id' => 'nullable|exists:kategoriler,id',
        ]);



        $hedef->update($validated);


        return redirect()->route('goal-management')->with('success', 'Hedef başarıyla güncellendi.');
    }

    public function store(Request $request)
    {


        $validated = $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string|max:1000',
            'kategori_id' => 'required|exists:kategoriler,id',

            'baslangic_tarihi' => 'required|date',
            'bitis_tarihi' => 'required|date',


        ]);


        Hedef::create([
            'ad' => $validated['ad'],
            'kategori_id' => $validated['kategori_id'],
            'aciklama' => $validated['aciklama'],
            'baslangic_tarihi' => $validated['baslangic_tarihi'],
            'bitis_tarihi' => $validated['bitis_tarihi'],

        ]);

        return redirect()->route('goal-management');
    }

    public function destroy($id)
    {
        $hedef = Hedef::findOrFail($id);
        $hedef->delete();

        return redirect()->route('goal-management');
    }

    public function durumGuncelle(Request $request, $id)
    {
        $validated = $request->validate([
            'durum_id' => 'required|integer',
        ]);

        $hedefler = Hedef::findOrFail($id);
        $hedefler->durum_id = $request->durum_id;
        $hedefler->save();
        return redirect()->back()->with('success', 'Durum başarıyla güncellendi!');

    }

    public function düzenle($id)
    {
        $hedef = Hedef::findOrFail($id);
        $durumlar = Durum::all(); // Tüm durumları getir
        return view('goal-management.edit', compact('hedef', 'durumlar'));
    }

}
