<?php

namespace Pheral\Tests\Basement;


use \Mockery;
use \Pheral\Essential\Basement\Application;
use \PHPUnit\Framework\TestCase;

class BasementApplicationTest extends TestCase
{
    /**
     * @var \Pheral\Essential\Basement\Application|null
     */
    private $app;

    protected function setUp()
    {
        $this->app = new Application();
    }

    protected function tearDown()
    {
        Mockery::close();
        $this->app = null;
    }

    public function testSetPath()
    {
        $app = $this->app;
        $app->setPath(__DIR__);
        $this->assertEquals(__DIR__.'/foo', $app->path('foo'));
    }
}