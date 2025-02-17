<?php

declare(strict_types=1);
namespace App\Services\AbstractApi;

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

    private string $baseUrl = "https://emailvalidation.abstractapi.com/v1/";

    public function __construct(private string $apiKey)
    {

    }


    public function verify(string $email): EmailValidationResult
    {

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
       $response = $client->get('', ['query' => $params]);

       $body = json_decode($response->getBody()->getContents(), true);
        
       return new EmailValidationResult($body['quality_score'], $body['deliverability'] === 'DELIVERABLE');

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
