<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Switch the application locale.
     */
    public function switch(Request $request, string $locale): RedirectResponse
    {
        $locale = in_array($locale, ['id', 'en'], true) ? $locale : 'id';

        $request->session()->put('locale', $locale);

        return back();
    }
}

