<?php

namespace App\Exceptions;

use Exception;

class ViewNotFoundException extends Exception
{

    protected  $message =  "Views not Found";
}
