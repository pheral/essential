<?php

namespace Pheral\Essential\Direct\Output;

use Pheral\Essential\Basement\Help\HelpersTrait;

abstract class ViewAbstract
{
    use HelpersTrait;

    protected $templatesDir = 'templates';

    protected $data = [];

    protected $path;

    public function __construct($path, $data = [])
    {
        $this->loadHelpers();

        if ($path) {
            $this->setPath($path);
        }

        if ($data) {
            $this->setData();
        }
    }

    public function setPath($path)
    {
        $pathSegments = explode('.', trim($path, '.'));
        $this->path = app()->path($this->templatesDir . '/' . implode('/', $pathSegments) . '.php');
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setData($data = [])
    {
        $this->data = array_merge($this->data, $data);
    }

    public function getData() : array
    {
        return $this->data;
    }

    public static function make($path, $data = [])
    {
        return new static($path, $data);
    }
}
