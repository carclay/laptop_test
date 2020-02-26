<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\test\Factory;

use LaptopRu\Component\Resource\Factory\Factory;
use LaptopRu\Component\Resource\Factory\FactoryInterface;
use PHPUnit\Framework\TestCase;

final class FactoryTest extends TestCase
{
    private Factory $factory;

    public function setUp(): void
    {
        $this->factory = new Factory(\stdClass::class);
    }

    public function test_It_implements_factory_interface(): void
    {
        $class = new \ReflectionClass(Factory::class);

        $this->assertTrue($class->implementsInterface(FactoryInterface::class));
    }

    public function test_It_constructor_return_factory_class(): void
    {
        $this->assertInstanceOf(Factory::class, $this->factory);
    }

    public function test_It_creates_a_new_instance_of_a_resource(): void
    {
        $this->assertInstanceOf(\stdClass::class, $this->factory->createNew());
    }
}
