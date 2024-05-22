<?php

namespace VoyagerInc\QuoteReplace\Tests;

use Tests\TestCase;

class BaseTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [\VoyagerInc\QuoteReplace\ServiceProvider::class];
    }
}