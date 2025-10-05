<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    /**
     * Switch language
     *
     * @param Request $request
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch(Request $request, $locale)
    {
        // Validate locale
        if (!in_array($locale, ['vi', 'en'])) {
            abort(404);
        }
        
        // Save locale to session
        Session::put('locale', $locale);
        
        // Get the previous URL
        $previousUrl = url()->previous();
        $baseUrl = url('/');
        
        // Extract path from previous URL
        $path = str_replace($baseUrl, '', $previousUrl);
        $path = ltrim($path, '/');
        
        // Remove existing locale prefix from path
        $path = preg_replace('/^(vi|en)(\/|$)/', '', $path);
        
        // Build new URL
        if ($locale === 'vi') {
            // For Vietnamese (default), don't add locale prefix
            $newUrl = $baseUrl . ($path ? '/' . $path : '');
        } else {
            // For other locales, add locale prefix
            $newUrl = $baseUrl . '/' . $locale . ($path ? '/' . $path : '');
        }
        
        return redirect($newUrl);
    }
}
