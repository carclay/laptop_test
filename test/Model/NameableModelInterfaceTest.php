<?php

declare(strict_types=1);


namespace LaptopRu\Component\Resource\test\Model;


use LaptopRu\Component\Resource\Model\ModelInterface;
use LaptopRu\Component\Resource\Model\NameableModelInterface;
use PHPUnit\Framework\TestCase;


final class NameableModelInterfaceTest extends TestCase
{
    private \ReflectionClass $class;

    public function setUp(): void
    {
        $this->class = new \ReflectionClass(NameableModelInterface::class);
    }

    public function test_It_is_interface(): void
    {
        $this->assertTrue($this->class->isInterface());
    }

    public function test_It_extends_model_interface(): void
    {
        $this->assertTrue($this->class->implementsInterface(ModelInterface::class));
    }

    public function test_It_has_getName_method(): void
    {
        $this->assertTrue($this->class->hasMethod('getName'));
    }
}
