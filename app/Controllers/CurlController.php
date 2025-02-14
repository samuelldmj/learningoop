<?php

// Enable strict typing for better type safety
declare(strict_types=1);

// Define the namespace for the controller
namespace App\Controllers;

// Import the Route attribute class
use App\Atrributes\Route as AtrributesRoute;
use App\Services\EmailValidationService;
use App\Services\Interface\EmailValidationInterface;

class CurlController
{

    public function __construct(Private EmailValidationInterface $emailValidationService){

    }
    // Define a route for this method
    #[AtrributesRoute('/curl')]
    public function index()
    {
        $email = 'samuelldmj5@gmail.com';
        $result = $this->emailValidationService->verify($email);

        echo "<pre>";
            print_r($result);
        echo "</pre>";
        
    }
}