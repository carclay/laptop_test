<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\Model;

trait ToggleableTrait
{
    /**
     * @var bool|null
     */
    private $enabled = true;

    /**
     * @return bool|null
     */
    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param bool|null $bool
     *
     * @return $this
     */
    public function setEnabled(?bool $bool)
    {
        $this->enabled = $bool;

        return $this;
    }

    /**
     * @return $this
     */
    public function enable()
    {
        $this->setEnabled(true);

        return $this;
    }

    /**
     * @return $this
     */
    public function disable()
    {
        $this->setEnabled(false);

        return $this;
    }
}
