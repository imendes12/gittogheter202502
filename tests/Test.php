<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function testQuePassa(): void
    {
        $variable = true;

        $this->assertTrue($variable);
    }
}

