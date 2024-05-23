<?php

namespace VoyagerInc\QuoteReplace\Tests;

use VoyagerInc\QuoteReplace\Contracts\ConfigDataServiceInterface;

class ConfigDataServiceTest extends BaseTest
{
    private $configDataService;

    public function setUp(): void
    {
        parent::setUp();

        $this->configDataService = $this->app->make(ConfigDataServiceInterface::class);
    }

    public function test_get_status_package()
    {
        $result = $this->configDataService->getStatusPackage();

        $this->assertTrue($this->configDataService->getStatusPackage());
    }

    public function test_get_status_package_with_false_value()
    {
        config(['quote_replace.enabled' => false]);

        $result = $this->configDataService->getStatusPackage();

        $this->assertFalse($result);
    }

    public function test_get_status_package_with_not_type_bool()
    {
        config(['quote_replace.enabled' => 'unexpected_value']);

        $result = $this->configDataService->getStatusPackage();

        $this->assertTrue($this->configDataService->getStatusPackage());
    }

    public function test_get_status_package_not_set()
    {
        config(['quote_replace.enabled' => null]);

        $result = $this->configDataService->getStatusPackage();

        $this->assertTrue($result);
    }

    public function test_get_full_width_quotes_returns_expected_value(): void
    {
        $quotes = $this->configDataService->getFullWidthQuotes();

        $this->assertIsArray($quotes);
    }

    public function test_get_full_width_quotes_contains_expected_values()
    {
        $quotes = $this->configDataService->getFullWidthQuotes();

        $expectedQuotes = ['“', '”'];

        $this->assertEquals($expectedQuotes, $quotes);
    }

    public function test_get_half_width_quote_returns_expected_value(): void
    {
        $quote = $this->configDataService->getHalfWidthQuote();

        $this->assertIsString($quote);
    }

    public function test_get_half_width_quote_contains_expected_value()
    {
        $quote = $this->configDataService->getHalfWidthQuote();

        $expectedQuote = '"';
        
        $this->assertEquals($expectedQuote, $quote);
    }

    public function test_get_half_width_quote_returns_string()
    {
        $quote = $this->configDataService->getHalfWidthQuote();

        $this->assertIsString($quote);
    }
}