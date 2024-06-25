<?php

namespace App;

class ToasterPro extends Toaster
{

    // public int $size = 4;

    public function __construct()
    {
        parent::__construct();
        $this->size = 4;
    }


    public function toastBagel()
    {
        foreach ($this->slices as $i => $slice) {
            echo ($i + 1) . ': Toasting ' . $slice . 'with bagels options' . PHP_EOL;
        }
    }
}
