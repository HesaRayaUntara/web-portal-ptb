<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

// (Kode komentar biarin aja)

Route::view('/', 'pages.beranda')->name('beranda');
Route::view('/profil-prodi', 'pages.profil')->name('profil');
Route::view('/kurikulum', 'pages.kurikulum')->name('kurikulum');
Route::view('/dosen', 'pages.dosen')->name('dosen');
Route::view('/berita', 'pages.berita')->name('berita');
Route::view('/galeri', 'pages.galeri')->name('galeri');
Route::view('/kontak', 'pages.kontak')->name('kontak');

Route::get('lang/{locale}', [LanguageController::class, 'switch'])->name('lang.switch');
