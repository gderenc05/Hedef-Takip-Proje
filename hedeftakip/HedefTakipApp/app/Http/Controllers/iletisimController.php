<?php

namespace App\Http\Controllers;

use App\Models\iletisim;
use Illuminate\Http\Request;

class iletisimController extends Controller
{
    public function index()
    {

        return view('iletisim');
    }

    public function store(Request $request)
    {

        $request->validate([
            'ad' => 'required|string|max:255',
            'soyad'=>'required|string|max:255',
            'email' => 'required|email|max:255',
            'mesaj' => 'required|string',
        ]);


        iletisim::create($request->all());


        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi!');
    }
}
