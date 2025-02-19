<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{

    public function __construct(protected string $view, protected array $params = [])
    {
    }

    public static function make(string $view, array $params = [])
    {
        return new static($view, $params);
    }

    public function render()
{
    //VIEWS_PATH => C:\xampp\htdocs\learningoop\resources\views\index.php
    $viewpath = VIEWS_PATH . '/' . $this->view . '.php';

    if (!file_exists($viewpath)) {
        throw new ViewNotFoundException();
    }

    // Extract the params array into variables
    extract($this->params);

    // Start output buffering
    ob_start();

    // Include the view file
    include $viewpath;

    // Return the buffered content
    return ob_get_clean();
}

    public function __toString()
    {
        return $this->render();
    }
}
