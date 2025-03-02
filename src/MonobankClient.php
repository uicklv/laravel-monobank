<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank;

use GuzzleHttp\Client;
use Uicklv\LaravelMonobank\DTO\Response;
use Uicklv\LaravelMonobank\Enums\HttpMethod;
use Uicklv\LaravelMonobank\Interfaces\HttpClient;

class MonobankClient implements HttpClient
{

    public function __construct(protected Client $httpClient)
    {
    }

    public function request(HttpMethod $method, string $url, array $data = []): Response
    {
        $httpMethod = $method->value;
        if (($httpMethod === HttpMethod::GET->value || $httpMethod === HttpMethod::DELETE->value) && !empty($data)) {
            $url .= '?' . http_build_query($data);
        }

        if ($httpMethod === HttpMethod::POST->value && !empty($data)) {
            $requestData = [
                'json' => $data,
            ];
        }

        $response = $this->httpClient->request($httpMethod, $url, $requestData ?? []);

        return new Response(
            json_decode($response->getBody()->getContents(), true),
            $response->getStatusCode()
        );
    }
}
