<?php

namespace Immortal\Tests;

use Immortal\App;
use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    public function test_appIsApp()
    {
        $app = new App();

        $this->assertInstanceOf('\Immortal\App', $app);
    }

    public function test_getContainer()
    {
        $app = new App();

        $container = $app->getContainer();

        $this->assertInstanceOf('\Immortal\Component\Container\Container', $container);
    }
}
