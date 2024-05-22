<?php

namespace VoyagerInc\QuoteReplace\Services;

use VoyagerInc\QuoteReplace\Contracts\ConfigDataServiceInterface;

class ConfigDataService implements ConfigDataServiceInterface
{
    public function getStatusPackage(): bool
    {
        return config('quote_replace.enabled');
    }

    public function getFullWidthQuotes(): array
    {
        return config('quote_replace.full_width_quotes');
    }

    public function getHalfWidthQuote(): string
    {
        return config('quote_replace.half_width_quote');
    }
}