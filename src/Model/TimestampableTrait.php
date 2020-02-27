<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\Model;

trait TimestampableTrait
{
    /**
     * @var \DateTimeInterface|null
     */
    private $createdAt;
    /**
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface|null $date
     *
     * @return $this
     */
    public function setCreatedAt(?\DateTimeInterface $date)
    {
        $this->createdAt = $date;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface|null $date
     *
     * @return $this
     */
    public function setUpdatedAt(?\DateTimeInterface $date)
    {
        $this->updatedAt = $date;

        return $this;
    }
}
