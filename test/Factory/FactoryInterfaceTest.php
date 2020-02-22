<?php

declare(strict_types=1);


namespace LaptopRu\Component\Resource\test\Factory;


use LaptopRu\Component\Resource\Factory\FactoryInterface;
use PHPUnit\Framework\TestCase;


final class FactoryInterfaceTest extends TestCase
{
    private \ReflectionClass $class;

    public function setUp(): void
    {
        $this->class = new \ReflectionClass(FactoryInterface::class);
    }

    public function test_It_is_interface(): void
    {
        $this->assertTrue($this->class->isInterface());
    }

    public function test_It_has_createNew_method(): void
    {
        $this->assertTrue($this->class->hasMethod('createNew'));
    }
}
