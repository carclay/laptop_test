<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\test\Model;

use LaptopRu\Component\Resource\Model\TimestampableInterface;
use PHPUnit\Framework\TestCase;

final class TimestampableInterfaceTest extends TestCase
{
    private \ReflectionClass $class;

    public function setUp(): void
    {
        $this->class = new \ReflectionClass(TimestampableInterface::class);
    }

    public function test_It_is_interface(): void
    {
        $this->assertTrue($this->class->isInterface());
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_getCreatedAt_method_returns_DateTimeInterface_or_null(): void
    {
        $method = 'getCreatedAt';

        $this->assertTrue($this->class->hasMethod($method), 'Method not exists');

        /**
         * @var \ReflectionNamedType
         */
        $returnType = $this->class->getMethod($method)->getReturnType();

        $this->assertTrue(
            null !== $returnType && \DateTimeInterface::class === $returnType->getName() && $returnType->allowsNull(),
            'Method returns invalid type'
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_setCreatedAt_method_with_DateTimeInterface_nullable_parameter(): void
    {
        $method = 'setCreatedAt';

        $this->assertTrue($this->class->hasMethod($method), 'Method not exists');

        $parameters = $this->class->getMethod($method)->getParameters();

        $this->assertTrue(1 === count($parameters), 'Method must have 1 parameter');

        [$parameter,] = $parameters;

        /**
         * @var \ReflectionNamedType
         */
        $parameterType = $parameter->getType();

        $this->assertTrue(
            \DateTimeInterface::class === $parameterType->getName() && $parameterType->allowsNull(),
            'Method have invalid type of parameter'
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_getUpdatedAt_method_returns_DateTimeInterface_or_null(): void
    {
        $method = 'getUpdatedAt';

        $this->assertTrue($this->class->hasMethod($method), 'Method not exists');

        /**
         * @var \ReflectionNamedType
         */
        $returnType = $this->class->getMethod($method)->getReturnType();

        $this->assertTrue(
            null !== $returnType && \DateTimeInterface::class === $returnType->getName() && $returnType->allowsNull(),
            'Method returns invalid type'
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_setUpdatedAt_method_with_DateTimeInterface_nullable_parameter(): void
    {
        $method = 'setUpdatedAt';

        $this->assertTrue($this->class->hasMethod($method), 'Method not exists');

        $parameters = $this->class->getMethod($method)->getParameters();

        $this->assertTrue(1 === count($parameters), 'Method must have 1 parameter');

        [$parameter,] = $parameters;

        /**
         * @var \ReflectionNamedType
         */
        $parameterType = $parameter->getType();

        $this->assertTrue(
            \DateTimeInterface::class === $parameterType->getName() && $parameterType->allowsNull(),
            'Method have invalid type of parameter'
        );
    }
}
