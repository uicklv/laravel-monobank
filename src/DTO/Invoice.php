<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\DTO;

use Illuminate\Http\Request;

class Invoice
{
    /**
     * @param string $invoiceId
     * @param string $status
     * @param string $failureReason
     * @param string $errCode
     * @param int $amount
     * @param int $ccy
     * @param int $finalAmount
     * @param string $createdDate
     * @param string $modifiedDate
     * @param string $reference
     * @param string $destination
     * @param array $cancelList
     * @param array $paymentInfo
     * @param array $walletData
     * @param array $tipsInfo
     */
    public function __construct(
        public string $invoiceId,
        public string $status,
        public string $failureReason,
        public string $errCode,
        public int $amount,
        public int $ccy,
        public int $finalAmount,
        public string $createdDate,
        public string $modifiedDate,
        public string $reference,
        public string $destination,
        public array $cancelList,
        public array $paymentInfo,
        public array $walletData,
        public array $tipsInfo,
    )
    {
    }

    /**
     * @param Request $request
     * @return self
     */
    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('invoiceId'),
            $request->input('status'),
            $request->input('failureReason'),
            $request->input('errCode'),
            $request->input('amount'),
            $request->input('ccy'),
            $request->input('finalAmount'),
            $request->input('createdDate'),
            $request->input('modifiedDate'),
            $request->input('reference'),
            $request->input('destination'),
            $request->input('cancelList'),
            $request->input('paymentInfo'),
            $request->input('walletData'),
            $request->input('tipsInfo'),
        );
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['invoiceId'],
            $data['status'],
            $data['failureReason'],
            $data['errCode'],
            $data['amount'],
            $data['ccy'],
            $data['finalAmount'],
            $data['createdDate'],
            $data['modifiedDate'],
            $data['reference'],
            $data['destination'],
            $data['cancelList'],
            $data['paymentInfo'],
            $data['walletData'],
            $data['tipsInfo'],
        );
    }
}
