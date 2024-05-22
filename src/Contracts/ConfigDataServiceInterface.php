<?php

namespace VoyagerInc\QuoteReplace\Contracts;

interface ConfigDataServiceInterface
{
    public function getStatusPackage(): bool;

    public function getFullWidthQuotes(): array;
    
    public function getHalfWidthQuote(): string;
}