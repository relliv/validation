<?php declare(strict_types=1);

namespace Somnambulist\Components\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Validation\Rule;
use Somnambulist\Components\Validation\Rules\Ipv6;

class Ipv6Test extends TestCase
{
    private Rule $rule;

    public function setUp(): void
    {
        $this->rule = new Ipv6;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->check('2001:0000:3238:DFE1:0063:0000:0000:FEFB'));
        $this->assertTrue($this->rule->check('ff02::2'));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->check('hf02::2'));
        $this->assertFalse($this->rule->check('12345:0000:3238:DFE1:0063:0000:0000:FEFB'));
    }
}
