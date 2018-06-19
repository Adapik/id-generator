<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidFactoryInterface;
use RuntimeException;

/**
 *
 */
class UuidIdentityGenerator implements IdentityGeneratorInterface
{
    /**
     * Uuid Factory
     *
     * @var UuidFactory
     */
    private $factory;

    /**
     * @param UuidFactoryInterface|null $factory
     */
    public function __construct(UuidFactoryInterface $factory = null)
    {
        if (!class_exists('Ramsey\Uuid\Uuid')) {
            throw new RuntimeException('ramsey\uuid must be installed to use the UuidIdentityGenerator.');
        }

        $this->factory = $factory ?: new UuidFactory();
    }

    /**
     * Generates next identifier
     *
     * @return mixed
     */
    public function nextIdentity(): string
    {
        return $this->factory->uuid4()->toString();
    }
}
