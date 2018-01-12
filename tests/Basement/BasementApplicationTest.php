<?php

namespace Pheral\Tests\Basement;


use \Mockery;
use \Pheral\Essential\Basement\Application;
use \PHPUnit\Framework\TestCase;

class BasementApplicationTest extends TestCase
{
    protected function tearDown()
    {
        Mockery::close();
    }

    /**
     * @return array
     */
    public function dataConstruct()
    {
        return [
            [__DIR__, __DIR__],
            [__DIR__.'/../', dirname(__DIR__)],
            ['', ''],
            ['', 'bar'],
        ];
    }

    /**
     * @dataProvider dataConstruct
     *
     * @param $passed
     * @param $expected
     */
    public function testConstruct($passed, $expected)
    {
        $app = new Application($passed);
        $this->assertEquals($expected, $app->path());
    }

    /**
     * @return array
     */
    public function dataSetPath()
    {
        return [
            [__DIR__, 'foo', __DIR__.'/foo'],
            [__DIR__.'/../', 'bar', dirname(__DIR__).'/bar'],
            [null, 'baz', realpath($_SERVER['DOCUMENT_ROOT']).'/baz'],
        ];
    }

    /**
     * @dataProvider dataSetPath
     *
     * @param $absolute
     * @param $relative
     * @param $expected
     */
    public function testSetPath($absolute, $relative, $expected)
    {
        $app = new Application();
        $app->setPath($absolute);
        $this->assertEquals($expected, $app->path($relative));
    }

    public function testGet()
    {
        $this->assertTrue((new Application())->get('app') instanceof Application);
    }
}