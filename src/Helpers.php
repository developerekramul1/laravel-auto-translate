<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('translate')) {
    function translate($text, $targetLang = null, $options = [])
    {
        $targetLang = $targetLang ?? app()->getLocale() ?? config('autotranslate.default_locale', 'en');
        $banglish = $options['banglish'] ?? config('autotranslate.banglish', true);
        $currency = $options['currency'] ?? config('autotranslate.currency', '৳');
        $isPrice = $options['is_price'] ?? false;

        // Price formatting
        if ($isPrice) {
            return $currency . number_format((float)$text, 2);
        }

        // Handle arrays (like model fields)
        if (is_array($text)) {
            return $text[$targetLang] ?? reset($text);
        }

        // Banglish translation
        if ($banglish) {
            try {
                $tr = new GoogleTranslate($targetLang);
                $translated = $tr->translate($text);

                $manualFixes = config('autotranslate.manual_fix', []);
                return $manualFixes[$text] ?? $translated;
            } catch (\Exception $e) {
                return $text;
            }
        }

        return $text; // fallback
    }
}