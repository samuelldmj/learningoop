<?php

declare(strict_types=1);

namespace App\VarianceExample;

use Animal;

class CatShelter implements AnimalShelter {


    public function adopt(string $name): Cat{
        
        return  new Cat($name);
    }

}

