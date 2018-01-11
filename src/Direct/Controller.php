<?php

namespace Pheral\Essential\Direct;


class Controller
{
    /**
     * @param $view
     * @param array $data
     * @return string
     */
    public function render($view, $data = [])
    {
        if (!$view instanceof View) {
            $view = new View($view);
        }

        $output = $view->render($data);

        return $output;
    }
}