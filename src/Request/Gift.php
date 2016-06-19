<?php

namespace MayakRed\ECheepIntegration\Request;

use MayakRed\ECheepIntegration\Exception\NotEnoughDataException;

class Gift extends UserPromotionIssuance
{
    /**
     * @var \DateTime|int
     */
    protected $expiresAt;

    /**
     * @throws NotEnoughDataException
     *
     * @return array
     */
    public function serialize()
    {
        $parentData = parent::serialize();

        $parentData['expires_at'] = $this->expiresAt !== null && $this->expiresAt instanceof \DateTime ? $this->expiresAt->getTimestamp() : $this->expiresAt;

        return $parentData;
    }

    /**
     * @return \DateTime|int
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime|int $expiresAt
     *
     * @return Gift
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }
}
