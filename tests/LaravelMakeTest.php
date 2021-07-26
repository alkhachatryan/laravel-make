<?php

namespace Alkhachatryan\LaravelMake\Tests;

use Alkhachatryan\LaravelMake\Facades\LaravelMake;
use Alkhachatryan\LaravelMake\ServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelMakeTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'laravel-make' => LaravelMake::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
