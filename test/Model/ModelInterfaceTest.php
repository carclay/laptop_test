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

    public function test_It_has_getId_method(): void
    {
        $this->assertTrue($this->class->hasMethod('getId'));
    }
}
