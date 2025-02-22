<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank;

use GuzzleHttp\Client;

class Acquiring
{
    /**
     * @var Client
     */
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $data
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createInvoice(array $data): array
    {
        $response = $this->client->post('merchant/invoice/create', ['json' => $data]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
