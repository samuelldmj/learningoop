<?php

declare(strict_types=1);
namespace App\Services\Emailable;

use App\Dto\EmailValidationResult;
use App\Services\Interface\EmailValidationInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class EmailValidationService implements EmailValidationInterface
{

    private string $baseUrl = "https://api.emailable.com/v1/";

    public function __construct(private string $apiKey)
    {

    }


    public function verify(string $email): EmailValidationResult
    {

        // Initialize a new cURL session
        // $handle = curl_init();

        // $params = [
        //     "api_key" => $this->apiKey,
        //     "email" => $email
        // ];

        // // Set the URL to fetch
        // $url = "$this->baseUrl/verify?". http_build_query($params);

        // // Set the URL option for the cURL session
        // curl_setopt($handle, CURLOPT_URL, $url);

        // // Ensure the content is returned as a string instead of output directly
        // curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        // // Execute the cURL session and get the content
        // $content = curl_exec($handle);

        // if ($content !== false) {
        //     // $data = json_decode($content, true);

        //     // Start formatting the output for better readability
        //     // echo "<pre>";

        //     // Print detailed information about the last transfer including HTTP status, content length, etc.
        //     // print_r(curl_getinfo($data));
        //     // print_r($data);
        //     // return $data;
        //     // echo "</pre>";

        //     return json_decode($content, true);

        // Close the cURL session to free up resources
        // curl_close($handle);

        // return [];

        // }

        //========================
        //     //USING GUZZLE
        //=====================


        $stack = HandlerStack::create();
        $maxRetry = 3;
        $stack->push($this->getRetryMiddleware( $maxRetry));

        $client = new Client([
                'base_uri' => $this->baseUrl,
                'timeout' => 5,
                'handler' => $stack
        ]);

        $params = [
            "api_key" => $this->apiKey,
            "email" => $email
        ];

        // $client->get('verify?' . http_build_query($params));
        //alternatively build query string
       $response = $client->get('verify', ['query' => $params]);

       $body = json_decode($response->getBody()->getContents(), true);

    //    echo "<pre>";
    //     var_dump($body);
    //     echo "</pre>";
    //     exit;
        return new EmailValidationResult($body['score'], $body['state'] === 'deliverable');

    }

    public function getRetryMiddleware(int $maxRetry = 3){
        return Middleware::retry(function(
            int $retries,
            RequestInterface $request,
            ?ResponseInterface $response = null,
            ?RuntimeException $e = null
            ) use($maxRetry)
            {
                if($retries >= $maxRetry){
                    return false;
                }

                //404 is not supposed to be here, it is just for testing purposes
                //404 does not fall into the categories of errors that need retrying.
                if($response && in_array($response->getStatusCode(), [249, 503, 429, 404])){
                    echo "Retrying [ $retries ], Status {$response->getStatusCode()} " . "</br>";
                    return true;
                }

                if($e instanceof ConnectException){
                    echo "Retrying [ $retries ], Connection Error " . "</br>";
                    return true;
                }

                // echo "Not Retrying [ $retries ]";
                return false;
            }
        
        );
    }
}
