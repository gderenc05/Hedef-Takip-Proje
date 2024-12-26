<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;


class KategoriController extends Controller
{

    public function index()
    {

        $kategoriler = Kategori::all();


        return view('categories.index', compact('kategoriler'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'ad' => 'required|string|max:255',
            'aciklama' => 'nullable|string|max:1000',
        ]);

        Kategori::create($validated);


        return redirect()->route('categories')->with('success', 'Kategori başarıyla eklendi.');
    }
}
