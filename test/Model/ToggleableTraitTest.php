<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\test\Model;

use LaptopRu\Component\Resource\Model\ToggleableTrait;
use PHPUnit\Framework\TestCase;

final class ToggleableTraitTest extends TestCase
{
    private \ReflectionClass $trait;

    /**
     * @var mixed
     */
    private $class;

    public function setUp(): void
    {
        $this->trait = new \ReflectionClass(ToggleableTrait::class);
        $this->class = new class() {
            use ToggleableTrait;
        };
    }

    public function test_It_is_trait(): void
    {
        $this->assertTrue($this->trait->isTrait());
    }

    /**
     * @throws \ReflectionException
     */
    public function test_It_set_and_get_Enabled_with_bool(): void
    {
        $getMethod = 'isEnabled';

        $this->assertTrue($this->trait->hasMethod($getMethod), sprintf('Method %s not exists', $getMethod));

        /**
         * @var \ReflectionNamedType
         */
        $returnType = $this->trait->getMethod($getMethod)->getReturnType();

        $this->assertTrue(
            null !== $returnType && 'bool' === $returnType->getName(),
            sprintf('Method %s returns invalid type', $getMethod)
        );

        $setMethod = 'setEnabled';

        $this->assertTrue($this->trait->hasMethod($setMethod), sprintf('Method %s not exists', $getMethod));

        $parameters = $this->trait->getMethod($setMethod)->getParameters();

        $this->assertTrue(1 === count($parameters), sprintf('Method %s must have 1 parameter', $setMethod));

        [$parameter,] = $parameters;

        /**
         * @var \ReflectionNamedType
         */
        $parameterType = $parameter->getType();

        $this->assertTrue(
            'bool' === $parameterType->getName(),
            sprintf('Method %s have invalid type of parameter', $setMethod)
        );

        $data = [
            'boolean:true' => true,
            'boolean:false' => false,
        ];

        foreach ($data as $className => $argument) {
            $this->class->$setMethod($argument);
            $this->assertTrue($this->class->$getMethod() === $argument, sprintf('Invalid set for data type %s', $className));
        }
    }

    public function test_It_toggle_enable(): void
    {
        $method = 'enable';

        $this->assertTrue($this->trait->hasMethod($method), sprintf('Method %s not exists', $method));

        $this->class->$method();
        $this->assertTrue($this->class->isEnabled(), sprintf('Invalid set %s', $method));
    }

    public function test_It_toggle_disable(): void
    {
        $method = 'disable';

        $this->assertTrue($this->trait->hasMethod($method), sprintf('Method %s not exists', $method));

        $this->class->$method();
        $this->assertFalse($this->class->isEnabled(), sprintf('Invalid set %s', $method));
    }

    public function test_It_is_enabled_by_default(): void
    {
        $this->class = new class() {
            use ToggleableTrait;
        };

        $this->assertTrue($this->class->isEnabled());
    }
}
