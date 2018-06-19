<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

use PDO;
use RuntimeException;
use function extension_loaded;

/**
 * Identity Generator based on postgres sequences
 */
class PostgresSequenceIdentityGenerator implements IdentityGeneratorInterface
{
    /**
     * Sequence name
     *
     * @var string
     */
    private $sequenceName;

    /**
     * @var PDO
     */
    private $connection;

    public function __construct()
    {
        if (!extension_loaded('ext-pdo_pgsql')) {
            throw new RuntimeException('ext-pdo_pgsql must be installed to use the PostgresSequenceIdentityGenerator.');
        }
    }

    /**
     * Generates next identifier
     *
     * @return int
     */
    public function nextIdentity(): int
    {
        return (int) $this->connection->query("select nextval('".$this->sequenceName."')")->fetchColumn();
    }
}
