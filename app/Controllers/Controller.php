<?php


namespace App\Controllers;

class Controller
{
    protected function view(string $view, array $data = null)
    {
        $view .= '.view.php';
        $dir  = dirname(__DIR__, 2) . '/views/';

        if (!file_exists($dir . $view)) {
            throw new \DomainException('Error: view file was not found:' . $dir . $view);
        }

        if (!empty($data)) {
            extract($data, EXTR_OVERWRITE);
        }

        include dirname(__DIR__, 2) . '/views/layout.view.php';
    }

}