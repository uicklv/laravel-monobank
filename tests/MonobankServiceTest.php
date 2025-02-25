<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Str;
use Uicklv\LaravelMonobank\Acquiring;
use Uicklv\LaravelMonobank\MonobankClient;
use Uicklv\LaravelMonobank\Services\MonobankService;

class MonobankServiceTest extends TestCase
{
    public function testCreateInvoice()
    {
        $invoiceId = Str::random(10);
        $pageUrl = fake()->url();

        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'invoiceId' => $invoiceId,
                'pageUrl' => $pageUrl,
            ]))
        ]);

        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);

        $monobankClient = new MonobankClient($client);

        $monobankAcquiring = new Acquiring($monobankClient);

        $service = new MonobankService($monobankAcquiring);

        $response = $service->createInvoice([
            'amount' => 1000
        ]);

        $this->assertEquals($invoiceId, $response->data['invoiceId']);
        $this->assertEquals($pageUrl, $response->data['pageUrl']);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
