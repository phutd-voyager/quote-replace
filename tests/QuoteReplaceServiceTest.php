<?php

namespace VoyagerInc\QuoteReplace\Tests;

use VoyagerInc\QuoteReplace\Contracts\ConfigDataServiceInterface;
use VoyagerInc\QuoteReplace\Services\QuoteReplaceService;

class QuoteReplaceServiceTest extends BaseTest
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->configDataServiceMock = $this->mock(ConfigDataServiceInterface::class);
        $this->quoteReplaceService = new QuoteReplaceService($this->configDataServiceMock);
    }

    public function test_replace_full_width_quotes_with_enabled_config()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“', '”']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = '“Hello” world';
        $expectedResult = '"Hello" world';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_disabled_config()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(false);

        $text = '“Hello” world';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($text, $result);
    }

    public function test_replace_full_width_quotes_with_no_full_width_quotes()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn([]);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = 'Hello world';
        $expectedResult = 'Hello world';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_partial_full_width_quotes()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = '“Hello” world';
        $expectedResult = '"Hello” world';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_no_replacements_needed()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“', '”']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = 'Hello world';
        $expectedResult = 'Hello world';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_mixed_content()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“', '”']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = '“Hello”, she said, “how are you?”';
        $expectedResult = '"Hello", she said, "how are you?"';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_empty_string()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“', '”']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = '';
        $expectedResult = '';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_various_quotes()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“', '”', '‘', '’']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = '“Hello”, she said, ‘how are you?’';
        $expectedResult = '"Hello", she said, "how are you?"';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_special_characters()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“', '”']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = '“Hello” world! @#$%^&*()_+';
        $expectedResult = '"Hello" world! @#$%^&*()_+';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }

    public function test_replace_full_width_quotes_with_multibyte_characters()
    {
        $this->configDataServiceMock
            ->shouldReceive('getStatusPackage')
            ->once()
            ->andReturn(true);

        $this->configDataServiceMock
            ->shouldReceive('getFullWidthQuotes')
            ->once()
            ->andReturn(['“', '”']);

        $this->configDataServiceMock
            ->shouldReceive('getHalfWidthQuote')
            ->once()
            ->andReturn('"');

        $text = '“こんにちは” 世界';
        $expectedResult = '"こんにちは" 世界';

        $result = $this->quoteReplaceService->replaceFullWidthQuotes($text);

        $this->assertEquals($expectedResult, $result);
    }
}