<?php

namespace App;

class CappuccinoMaker extends CoffeeMaker

{
    use CappucinoTrait {
        CappucinoTrait::makeCappucino as public;
    }

}
