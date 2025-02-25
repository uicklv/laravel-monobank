<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Services;

use Illuminate\Http\Request;
use Uicklv\LaravelMonobank\Acquiring;
use Uicklv\LaravelMonobank\DTO\Invoice;
use Uicklv\LaravelMonobank\DTO\Response;

class MonobankService
{

    /**
     * @param Acquiring $acquiring
     */
    public function __construct(protected Acquiring $acquiring)
    {
    }

    /**
     * @param array $data
     * @return Response
     * @throws \Exception
     */
    public function createInvoice(array $data): Response
    {
        if (!isset($data['amount'])) {
            throw new \Exception('Amount is required.');
        }

        if (!is_int($data['amount'])) {
            throw new \Exception('Amount must be an integer.');
        }

        return $this->acquiring->createInvoice($data);
    }

    /**
     * @param string $invoiceId
     * @return Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getInvoiceStatus(string $invoiceId): Response
    {
        return $this->acquiring->getInvoiceStatus($invoiceId);
    }

    /**
     * @param array $data
     * @return Response
     * @throws \Exception
     */
    public function cancelInvoice(array $data): Response
    {
        if (!isset($data['invoiceId'])) {
            throw new \Exception('InvoiceId is required');
        }

        return $this->acquiring->cancelInvoice($data);
    }

    /**
     * @param string $invoiceId
     * @return Response
     */
    public function invalidateInvoice(string $invoiceId): Response
    {
        return $this->acquiring->invalidateInvoice($invoiceId);
    }

    /**
     * @param Request $request
     * @return Invoice
     */
    public function parseCallbackData(Request $request): Invoice
    {
        return Invoice::fromRequest($request);
    }
}
