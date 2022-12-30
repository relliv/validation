<?php declare(strict_types=1);

namespace Somnambulist\Components\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Validation\Rule;
use Somnambulist\Components\Validation\Rules\TypeArray;

class TypeArrayTest extends TestCase
{
    private Rule $rule;

    public function setUp(): void
    {
        $this->rule = new TypeArray;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->check([]));
        $this->assertTrue($this->rule->check([1,2,3]));
        $this->assertTrue($this->rule->check([1,2,[4,5,6]]));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->check('[]'));
        $this->assertFalse($this->rule->check('[1,2,3]'));
    }
}
