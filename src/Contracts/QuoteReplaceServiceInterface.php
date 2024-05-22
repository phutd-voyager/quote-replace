<?php

namespace VoyagerInc\QuoteReplace\Contracts;

interface QuoteReplaceServiceInterface
{
    public function replaceFullWidthQuotes(string $text): string;
}