<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\DTO;

class Response
{
    /**
     * @param array $data
     * @param int $statusCode
     */
    public function __construct(
        public array $data,
        public int $statusCode,
    )
    {}

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param string $key
     * @param $default
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }
}
