<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\Factory;

interface FactoryInterface
{
    /**
     * @return mixed
     */
    public function createNew();
}
