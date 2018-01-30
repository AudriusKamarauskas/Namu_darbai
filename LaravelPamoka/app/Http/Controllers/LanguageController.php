<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(string $language): RedirectResponse
    {
        dd($language);
        app()->setLocale($language);

        return redirect()->back();
    }
}
