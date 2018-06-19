<?php

declare(strict_types=1);

namespace Adapik\IdGenerator;

/**
 * Identity Generator Interface
 */
interface IdentityGeneratorInterface
{
    /**
     * Generates next identifier
     *
     * @return mixed
     */
    public function nextIdentity();
}
