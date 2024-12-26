<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\GorevController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\iletisimController;
use App\Http\Controllers\KategoriController;

use App\Http\Controllers\MotivasyonSozleriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});


Route::get('/categories', [KategoriController::class, 'index'])->name('categories.index');
Route::post('/categories', [KategoriController::class, 'store'])->name('categories.store');


    // Ana Sayfa
    Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Kategoriler
    Route::get('/categories', [KategoriController::class, 'index'])->name('categories');

// İstatistikler
    Route::get('/statistics', [StatisticsController::class, 'statistics'])->name('statistics');

Route::get('/statistics/filter', [StatisticsController::class, 'filter'])->name('statistics.filter');



Route::get('/gorevler', [GorevController::class, 'index'])->name('gorevler');

Route::post('/gorevler', [GorevController::class, 'store'])->name('gorevler.store');


Route::get('/', [MotivasyonSozleriController::class, 'sozleriListele'])->name('welcome');


Route::post('/soz-ekle', [MotivasyonSozleriController::class, 'sozuEkle'])->name('motivasyon.sozu_ekle');
Route::delete('/soz-sil/{id}', [MotivasyonSozleriController::class, 'sozuSil'])->name('motivasyon.sozu_sil');


Route::get('/goal-management', [GoalController::class, 'index'])->name('goal-management');

Route::post('/goal-management', [GoalController::class, 'store'])->name('goal-management.store');
Route::delete('/goal-management/{id}', [GoalController::class, 'destroy'])->name('goal-management.destroy');

Route::put('/goal-management/{hedef}', [GoalController::class, 'update'])->name('goal-management.update');

Route::get('/goal-management/{hedef}/edit', [GoalController::class, 'edit'])->name('goal-management.edit');



Route::get('/iletisim', [iletisimController::class, 'index'])->name('iletisim');
Route::post('/iletisim', [iletisimController::class, 'store'])->name('iletisim.store');

// Hedef düzenleme sayfasına yönlendiren rota
Route::get('/goal-management/duzenle', [GoalController::class, 'düzenle'])->name('hedef.duzenle');

// Hedef durumunu güncelleyen rota
Route::put('/goal-management/{id}/durum-guncelle', [GoalController::class, 'durumGuncelle'])->name('hedef.durumGuncelle');


require __DIR__.'/auth.php';
