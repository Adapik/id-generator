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

    /**
     * @param PDO    $connection
     * @param string $sequenceName
     */
    public function __construct(PDO $connection, string $sequenceName)
    {
        if (!extension_loaded('ext-pdo_pgsql')) {
            throw new RuntimeException('ext-pdo_pgsql must be installed to use the PostgresSequenceIdentityGenerator.');
        }

        $this->connection   = $connection;
        $this->sequenceName = $sequenceName;
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
