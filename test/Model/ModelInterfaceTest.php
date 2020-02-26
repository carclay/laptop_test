<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\test\Model;

use LaptopRu\Component\Resource\Model\ModelInterface;
use PHPUnit\Framework\TestCase;

final class ModelInterfaceTest extends TestCase
{
    private \ReflectionClass $class;

    public function setUp(): void
    {
        $this->class = new \ReflectionClass(ModelInterface::class);
    }

    public function test_It_is_interface(): void
    {
        $this->assertTrue($this->class->isInterface());
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_getId_method_with_return_type_is_not_declared(): void
    {
        $method = 'getId';

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
