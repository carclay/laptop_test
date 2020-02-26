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

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_createNew_method_with_return_type_is_not_declared(): void
    {
        $method = 'createNew';

        $this->assertTrue($this->class->hasMethod($method));

        /**
         * @var \ReflectionNamedType|null
         */
        $returnType = $this->class->getMethod($method)->getReturnType();

        $this->assertTrue(
            null === $returnType,
            'Method returns invalid type'
        );
    }
}
