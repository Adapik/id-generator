<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * Test for UuidIdentityGenerator
 */
class UuidIdentityGeneratorTest extends TestCase
{
    public function testNextIdentity()
    {
        $generator = new UuidIdentityGenerator();
        $this->assertInstanceOf(Uuid::class, Uuid::fromString($generator->nextIdentity()));
    }
}
