# Laravel Auto Translate

Automatic Google Translate + Banglish toggle for Laravel.

## Installation

```bash
composer require developerekramul/laravel-auto-translate

Publish Config (optional)
php artisan vendor:publish --provider="Developerekramul\AutoTranslate\AutoTranslateServiceProvider" --tag=config



<h1>{{ translate($product->title) }}</h1>
<p>{{ translate('Category', null, ['banglish' => true]) }}</p>
<span>{{ translate($product->new_price, null, ['is_price'=>true,'currency'=>'৳']) }}</span>

$title = translate($request->title, null, ['banglish'=>true]);
$price = translate($request->price, null, ['is_price'=>true,'currency'=>'৳']);

$product->title_translated = translate($product->title);
$product->description_translated = translate($product->description);

translate('Category', null, ['banglish'=>true]);

translate(1000, null, ['is_price'=>true, 'currency'=>'৳']);