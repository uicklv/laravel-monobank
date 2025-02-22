<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Services;

use Uicklv\LaravelMonobank\Acquiring;

class MonobankService
{

    public function __construct(protected Acquiring $acquiring)
    {
    }

    public function createInvoice(array $data): array
    {
        if (!isset($data['amount'])) {
            throw new \Exception('Amount is required');
        }

        return $this->acquiring->createInvoice($data);
    }
}
