<?php

// Enable strict typing for better type safety
declare(strict_types=1);

// Define the namespace for the controller
namespace App\Controllers;

// Import the Route attribute class

use App\Atrributes\Route as AtrributesRoute;

class CurlController
{
    // Define a route for this method
    #[AtrributesRoute('/curl')]
    public function index()
    {
        // Initialize a new cURL session
        $handle = curl_init();

        $apiKey = $_ENV['EMAILABLE_API_KEY'];
        $email = "samuelldmj5@gmail";

        $params = [
            "api_key" => $apiKey,
            "email" => $email
        ];

        // Set the URL to fetch
        $url = "https://api.emailable.com/v1/verify?". http_build_query($params);

        // Set the URL option for the cURL session
        curl_setopt($handle, CURLOPT_URL, $url);

        // Ensure the content is returned as a string instead of output directly
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL session and get the content
        $content = curl_exec($handle);

        if ($content !== false) {
            $data = json_decode($content, true);

            // Start formatting the output for better readability
            echo "<pre>";

            // Print detailed information about the last transfer including HTTP status, content length, etc.
            // print_r(curl_getinfo($data));
            print_r($data);
            echo "</pre>";
        }



        // Close the cURL session to free up resources
        curl_close($handle);
    }
}