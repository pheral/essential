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

    /**
     * @return array
     */
    public function setPathDataProvider()
    {
        return [
            [__DIR__, 'foo', __DIR__ . '/foo'],
            [__DIR__ . '/../', 'bar', dirname(__DIR__) . '/bar'],
            ['', 'baz', realpath($_SERVER['DOCUMENT_ROOT']) . '/baz'],
        ];
    }

    /**
     * @dataProvider setPathDataProvider
     *
     * @param $absolute
     * @param $relative
     * @param $expected
     */
    public function testSetPath($absolute, $relative, $expected)
    {
        $app = $this->app;
        $app->setPath($absolute);
        $this->assertEquals($expected, $app->path($relative));
    }
}