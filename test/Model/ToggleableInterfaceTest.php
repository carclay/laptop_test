<?php

declare(strict_types=1);


namespace LaptopRu\Component\Resource\test\Model;


use LaptopRu\Component\Resource\Model\ToggleableInterface;
use PHPUnit\Framework\TestCase;


final class ToggleableInterfaceTest extends TestCase
{
    private \ReflectionClass $class;

    public function setUp(): void
    {
        $this->class = new \ReflectionClass(ToggleableInterface::class);
    }

    public function test_It_is_interface(): void
    {
        $this->assertTrue($this->class->isInterface());
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_isEnabled_method_returns_bool(): void
    {
        $method = 'isEnabled';

        $this->assertTrue($this->class->hasMethod($method), "Method not exists");

        /**
         * @var \ReflectionNamedType $returnType
         */
        $returnType = $this->class->getMethod($method)->getReturnType();

        $this->assertTrue(
            null !== $returnType && 'bool' === $returnType->getName(),
            'Method returns invalid type'
        );

    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_has_setEnabled_method_with_bool_parameter(): void
    {
        $method = 'setEnabled';

        $this->assertTrue($this->class->hasMethod($method), "Method not exists");

        $parameters = $this->class->getMethod($method)->getParameters();

        $this->assertTrue(1 === count($parameters), "Method must have 1 parameter");

        [$parameter,] = $parameters;

        /**
         * @var \ReflectionNamedType $parameterType
         */
        $parameterType = $parameter->getType();

        $this->assertTrue(
            'bool' === $parameterType->getName(),
            "Method have invalid type of parameter"
            );
    }

    public function test_It_has_enable_method(): void
    {
        $method = 'enable';

        $this->assertTrue($this->class->hasMethod($method), "Method not exists");
    }

    public function test_It_has_disable_method(): void
    {
        $method = 'disable';

        $this->assertTrue($this->class->hasMethod($method), "Method not exists");
    }

}
