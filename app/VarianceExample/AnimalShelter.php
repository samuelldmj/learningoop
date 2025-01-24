<?php
declare(strict_types=1);

namespace App\VarianceExample;



interface AnimalShelter {
    public function adopt(string $name):Animal;
}