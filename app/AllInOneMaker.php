<?php

namespace App;
// use CappucinoTrait;

class AllInOneMaker extends CoffeeMaker
{
    use LatteTrait;
    use CappucinoTrait {
        CappucinoTrait::makeLatte insteadof LatteTrait;
    }
     use CappucinoTrait {
        CappucinoTrait::makeCappucino as public;
    }

}
