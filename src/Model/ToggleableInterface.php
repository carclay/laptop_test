<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\Model;

interface ToggleableInterface
{
    /**
     * @return bool|null
     */
    public function isEnabled(): ?bool;

    /**
     * @param bool|null $bool
     *
     * @return mixed
     */
    public function setEnabled(?bool $bool);

    /**
     * @return mixed
     */
    public function enable();

    /**
     * @return mixed
     */
    public function disable();
}
