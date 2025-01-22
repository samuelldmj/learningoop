<?php

declare(strict_types=1);

namespace   App\Controllers;

use Generator;

class   GeneratorExampleController {

    public function __construct(){

    }

    public function index(){
        $numbers = $this->lazyRange(1, 300000);

        // echo "<pre>";
        //     print_r($numbers);
        // echo "</pre>";

        foreach($numbers as $key => $val){
            echo $key . ': ' . $val . '<br> ';
        }
    }

    private function lazyRange(int $start, int $end): Generator{
        for($i = $start; $i <= $end; $i++){
            yield $i;
        }
    }

}