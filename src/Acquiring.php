<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank;

use Uicklv\LaravelMonobank\DTO\Response;
use Uicklv\LaravelMonobank\Enums\HttpMethod;
use Uicklv\LaravelMonobank\Interfaces\HttpClient;

class Acquiring
{

    public function __construct(protected HttpClient $client)
    {
    }


    /**
     * @param array $data
     * @return Response
     */
    public function createInvoice(array $data): Response
    {
        return $this->client->request(HttpMethod::POST, 'merchant/invoice/create', $data);
    }

    /**
     * @param string $invoiceId
     * @return Response
     */
    public function getInvoiceStatus(string $invoiceId): Response
    {
        return $this->client->request(HttpMethod::GET, 'merchant/invoice/status', [
            'invoiceId' => $invoiceId
        ]);
    }


    /**
     * @param array $data
     * @return Response
     */
    public function cancelInvoice(array $data): Response
    {
        return $this->client->request(HttpMethod::POST,'merchant/invoice/cancel', $data);
    }

    /**
     * @param string $invoiceId
     * @return Response
     */
    public function invalidateInvoice(string $invoiceId): Response
    {
        return $this->client->request(HttpMethod::POST, 'merchant/invoice/remove', [
            'invoiceId' => $invoiceId
        ]);
    }
}
