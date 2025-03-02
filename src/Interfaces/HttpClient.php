<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Interfaces;

use Uicklv\LaravelMonobank\DTO\Response;
use Uicklv\LaravelMonobank\Enums\HttpMethod;

interface HttpClient
{
    /**
     * @param HttpMethod $method
     * @param string $url
     * @param array $data
     * @return Response
     */
    public function request(HttpMethod $method, string $url, array $data = []): Response;
}
