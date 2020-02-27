<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\Model;

interface NameableModelInterface extends ModelInterface
{
    /**
     * @return mixed
     */
    public function getName();
}
