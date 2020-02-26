<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\test\Model;

use LaptopRu\Component\Resource\Model\TimestampableTrait;
use PHPUnit\Framework\TestCase;

final class TimestampableTraitTest extends TestCase
{
    /**
     * @var \ReflectionClass
     */
    private \ReflectionClass $trait;

    /**
     * @var mixed
     */
    private $class;

    public function setUp(): void
    {
        $this->trait = new \ReflectionClass(TimestampableTrait::class);
        $this->class = new class() {
            use TimestampableTrait;
        };
    }

    public function test_It_is_trait(): void
    {
        $this->assertTrue($this->trait->isTrait());
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_set_and_get_CreatedAt_with_DateTimeInterface_or_null(): void
    {
        $getMethod = 'getCreatedAt';

        $this->assertTrue($this->trait->hasMethod($getMethod), sprintf('Method %s not exists', $getMethod));

        /**
         * @var \ReflectionNamedType
         */
        $returnType = $this->trait->getMethod($getMethod)->getReturnType();

        $this->assertTrue(
            null !== $returnType && \DateTimeInterface::class === $returnType->getName() && $returnType->allowsNull(),
            sprintf('Method %s returns invalid type', $getMethod)
        );

        $setMethod = 'setCreatedAt';

        $this->assertTrue($this->trait->hasMethod($setMethod), sprintf('Method %s not exists', $getMethod));

        $parameters = $this->trait->getMethod($setMethod)->getParameters();

        $this->assertTrue(1 === count($parameters), sprintf('Method %s must have 1 parameter', $setMethod));

        [$parameter,] = $parameters;

        /**
         * @var \ReflectionNamedType
         */
        $parameterType = $parameter->getType();

        $this->assertTrue(
            \DateTimeInterface::class === $parameterType->getName() && $parameterType->allowsNull(),
            sprintf('Method %s have invalid type of parameter', $setMethod)
        );

        $data = [
            \DateTime::class => new \DateTime(),
            \DateTimeImmutable::class => new \DateTimeImmutable(),
            'null' => null,
        ];

        foreach ($data as $className => $argument) {
            $this->class->$setMethod($argument);
            $this->assertTrue($this->class->$getMethod() === $argument, sprintf('Invalid set for data type %s', $className));
        }
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_set_and_get_UpdatedAt_with_DateTimeInterface_or_null(): void
    {
        $getMethod = 'getUpdatedAt';

        $this->assertTrue($this->trait->hasMethod($getMethod), sprintf('Method %s not exists', $getMethod));

        /**
         * @var \ReflectionNamedType
         */
        $returnType = $this->trait->getMethod($getMethod)->getReturnType();

        $this->assertTrue(
            null !== $returnType && \DateTimeInterface::class === $returnType->getName() && $returnType->allowsNull(),
            sprintf('Method %s returns invalid type', $getMethod)
        );

        $setMethod = 'setUpdatedAt';

        $this->assertTrue($this->trait->hasMethod($setMethod), sprintf('Method %s not exists', $getMethod));

        $parameters = $this->trait->getMethod($setMethod)->getParameters();

        $this->assertTrue(1 === count($parameters), sprintf('Method %s must have 1 parameter', $setMethod));

        [$parameter,] = $parameters;

        /**
         * @var \ReflectionNamedType
         */
        $parameterType = $parameter->getType();

        $this->assertTrue(
            \DateTimeInterface::class === $parameterType->getName() && $parameterType->allowsNull(),
            sprintf('Method %s have invalid type of parameter', $setMethod)
        );

        $data = [
            \DateTime::class => new \DateTime(),
            \DateTimeImmutable::class => new \DateTimeImmutable(),
            'null' => null,
        ];

        foreach ($data as $className => $argument) {
            $this->class->$setMethod($argument);
            $this->assertTrue($this->class->$getMethod() === $argument, sprintf('Invalid set for data type %s', $className));
        }
    }
}
