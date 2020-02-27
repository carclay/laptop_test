<?php

declare(strict_types=1);

namespace LaptopRu\Component\Resource\Model;

interface TimestampableInterface
{
    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface;

    /**
     * @param \DateTimeInterface|null $date
     *
     * @return mixed
     */
    public function setCreatedAt(?\DateTimeInterface $date);

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface;

    /**
     * @param \DateTimeInterface|null $date
     *
     * @return mixed
     */
    public function setUpdatedAt(?\DateTimeInterface $date);
}
