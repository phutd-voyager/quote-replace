<?php

namespace VoyagerInc\QuoteReplace\Services;

use VoyagerInc\QuoteReplace\Constants\ConfigConstant;
use VoyagerInc\QuoteReplace\Contracts\ConfigDataServiceInterface;

class ConfigDataService implements ConfigDataServiceInterface
{
    public function getStatusPackage(): bool
    {
        $config = config('quote_replace.enabled', ConfigConstant::ENABLED_DEFAULT);

        if ($config === null) {
            return ConfigConstant::ENABLED_DEFAULT;
        }

        return $config;
    }

    public function getFullWidthQuotes(): array
    {
        return config('quote_replace.full_width_quotes', ConfigConstant::FULL_WIDTH_QUOTES_DEFAULT);
    }

    public function getHalfWidthQuote(): string
    {
        return config('quote_replace.half_width_quote', ConfigConstant::HALF_WIDTH_QUOTE_DEFAULT);
    }
}
