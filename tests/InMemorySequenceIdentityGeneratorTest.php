<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

use PHPUnit\Framework\TestCase;

/**
 * Test for InMemorySequenceIdentityGenerator
 */
class InMemorySequenceIdentityGeneratorTest extends TestCase
{
    public function testNextIdentity()
    {
        $generator = new InMemorySequenceIdentityGenerator();
        $this->assertSame(1, $generator->nextIdentity());
        $this->assertSame(2, $generator->nextIdentity());
        $this->assertSame(3, $generator->nextIdentity());
    }
}
