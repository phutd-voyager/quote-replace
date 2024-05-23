<?php

namespace VoyagerInc\QuoteReplace\Services;

use VoyagerInc\QuoteReplace\Contracts\ConfigDataServiceInterface;
use VoyagerInc\QuoteReplace\Contracts\QuoteReplaceServiceInterface;

class QuoteReplaceService implements QuoteReplaceServiceInterface
{
    protected $configDataService;

    public function __construct(ConfigDataServiceInterface $configDataService)
    {
        $this->configDataService = $configDataService;
    }

    public function replaceFullWidthQuotes(string $text): string
    {
        if (!$this->configDataService->getStatusPackage()) {
            return $text;
        }

        $fullWidthQuotes = $this->configDataService->getFullWidthQuotes();
        $halfWidthQuote = $this->configDataService->getHalfWidthQuote();

        if (empty($fullWidthQuotes) || !is_string($halfWidthQuote)) {
            return $text;
        }

        return str_replace($fullWidthQuotes, $halfWidthQuote, $text);
    }
}
