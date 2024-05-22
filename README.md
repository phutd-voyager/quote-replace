# Simple block blacklist and whitelist IP

[`PHP v8.2`](https://php.net)

[`Laravel v11.x`](https://github.com/laravel/laravel)

## Installation

```bash
composer require voyager-inc/quote-replace
```

- Publish provider
```bash
php artisan vendor:publish --provider="VoyagerInc\QuoteReplace\ServiceProvider"
```

- Install example code if you want
```bash
php artisan quote-replace:install-example
```
and now the package will generate `Controller`, `Route`, `Request` and `View`
- `QuoteReplaceController.php` -> Controller
- `QuoteReplaceSubmitRequest.php` -> Request
- `quote_replace.php` -> Route
- `quoteReplace.blade.php` -> View

## Usage

- We can enable/disable of package with config `enabled` in `quote_replace.php` file with value is `true` to enable or `false` to disable.

- For example:
- In `web.php` add this line below to load `quote_replace` route of package for test

```bash
require __DIR__ . '/quote_replace.php';
```

- `quote_replace.php` file route with content:
```bash
Route::get('/quote-replace/test', [\App\Http\Controllers\QuoteReplaceController::class, 'index'])->name('quoteReplace.index');
Route::post('/quote-replace/submit', [\App\Http\Controllers\QuoteReplaceController::class, 'submit'])->name('quoteReplace.submit');
```