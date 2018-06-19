<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

use Hidehalo\Nanoid\Client;
use RuntimeException;

/**
 * NanoId Identity Generator
 */
class NanoIdIdentityGenerator
{
    /**
     * @param Client|null $client
     */
    public function __construct(Client $client = null)
    {
        if (!class_exists('Hidehalo\Nanoid\GeneratorInterface')) {
            throw new RuntimeException('hidehalo/nanoid-php must be installed to use the NanoIdIdentityGenerator.');
        }

        $this->client = $client ?: new Client();
    }

    /**
     * NanoId Client
     *
     * @var Client
     */
    private $client;

    /**
     * Generates next identifier
     *
     * @return string
     */
    public function nextIdentity(): string
    {
        return (string) $this->client->generateId(null);
    }
}
