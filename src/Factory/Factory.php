<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\Factory;

class Factory implements FactoryInterface
{
    /**
     * @var string
     */
    private string $class;

    /**
     * Factory constructor.
     *
     * @param string $class
     */
    public function __construct($class = '')
    {
        $this->class = $class;
    }

    /**
     * @return \stdClass
     */
    public function createNew()
    {
        return new \stdClass();
    }
}
