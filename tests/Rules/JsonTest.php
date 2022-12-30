<?php declare(strict_types=1);

namespace Somnambulist\Components\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Validation\Rule;
use Somnambulist\Components\Validation\Rules\Json;

class JsonTest extends TestCase
{
    private Rule $rule;

    public function setUp(): void
    {
        $this->rule = new Json;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->check('{}'));
        $this->assertTrue($this->rule->check('[]'));
        $this->assertTrue($this->rule->check('false'));
        $this->assertTrue($this->rule->check('null'));
        $this->assertTrue($this->rule->check('{"username": "John Doe"}'));
        $this->assertTrue($this->rule->check('{"number": 12345678}'));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->check(''));
        $this->assertFalse($this->rule->check(123));
        $this->assertFalse($this->rule->check(false));
        $this->assertFalse($this->rule->check('{"username": John Doe}'));
        $this->assertFalse($this->rule->check('{number: 12345678}'));
    }
}
