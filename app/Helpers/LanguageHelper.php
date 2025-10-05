<?php

if (!function_exists('trans_json')) {
    /**
     * Translate JSON messages
     *
     * @param string $key
     * @param array $replace
     * @param string|null $locale
     * @return string
     */
    function trans_json($key, $replace = [], $locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        
        // Load JSON file
        $path = resource_path("lang/{$locale}/messages.json");
        
        if (!file_exists($path)) {
            // Fallback to default locale
            $fallbackLocale = config('app.fallback_locale', 'en');
            $path = resource_path("lang/{$fallbackLocale}/messages.json");
        }
        
        if (!file_exists($path)) {
            return $key;
        }
        
        $translations = json_decode(file_get_contents($path), true);
        
        // Get nested value using dot notation
        $keys = explode('.', $key);
        $value = $translations;
        
        foreach ($keys as $segment) {
            if (is_array($value) && array_key_exists($segment, $value)) {
                $value = $value[$segment];
            } else {
                return $key; // Return key if not found
            }
        }
        
        // Replace placeholders
        if (!empty($replace) && is_string($value)) {
            foreach ($replace as $search => $replacement) {
                $value = str_replace(':' . $search, $replacement, $value);
            }
        }
        
        return $value;
    }
}

if (!function_exists('get_current_locale')) {
    /**
     * Get current locale
     *
     * @return string
     */
    function get_current_locale()
    {
        return app()->getLocale();
    }
}

if (!function_exists('get_locale_url')) {
    /**
     * Get URL for specific locale
     *
     * @param string $locale
     * @param string|null $route
     * @return string
     */
    function get_locale_url($locale, $route = null)
    {
        $url = request()->url();
        $currentLocale = get_current_locale();
        
        if ($route) {
            $url = url($route);
        }
        
        // If switching to default locale (vi), remove locale prefix
        if ($locale === 'vi') {
            // Remove /en prefix if exists
            $url = preg_replace('/\/en(\/|$)/', '/', $url);
            // Clean up double slashes
            $url = preg_replace('/\/+/', '/', $url);
            // Ensure it starts with domain
            if (!preg_match('/^https?:\/\//', $url)) {
                $url = url('/') . ltrim($url, '/');
            }
        } else {
            // Add locale prefix for non-default locales
            $baseUrl = url('/');
            $path = str_replace($baseUrl, '', $url);
            $path = ltrim($path, '/');
            
            // Remove existing locale prefix
            $path = preg_replace('/^(vi|en)(\/|$)/', '', $path);
            
            $url = $baseUrl . '/' . $locale . ($path ? '/' . $path : '');
        }
        
        return $url;
    }
}

if (!function_exists('is_current_locale')) {
    /**
     * Check if given locale is current locale
     *
     * @param string $locale
     * @return bool
     */
    function is_current_locale($locale)
    {
        return get_current_locale() === $locale;
    }
}

if (!function_exists('is_active_route')) {
    /**
     * Check if given route is current active route
     *
     * @param string|array $routes
     * @return bool
     */
    function is_active_route($routes)
    {
        $currentRoute = request()->route()->getName();
        
        if (is_array($routes)) {
            return in_array($currentRoute, $routes);
        }
        
        return $currentRoute === $routes;
    }
}

if (!function_exists('get_menu_class')) {
    /**
     * Get menu class with active state
     *
     * @param string|array $routes
     * @param string $baseClass
     * @return string
     */
    function get_menu_class($routes, $baseClass = 'item--menu')
    {
        $class = $baseClass;
        
        if (is_active_route($routes)) {
            $class .= ' active';
        }
        
        return $class;
    }
}
