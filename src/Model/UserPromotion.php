<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:36.
 */
namespace MayakRed\ECheepIntegration\Model;

class UserPromotion
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var Promotion
     */
    protected $promotion;

    /**
     * @var float
     */
    protected $realValue;

    /**
     * @var string
     */
    protected $authData;

    /**
     * @var \DateTime
     */
    protected $expiresAt;

    /**
     * @param \stdClass $data
     *
     * @return UserPromotion
     */
    public static function createFromStdClass(\stdClass $data)
    {
        $userPromotion = new self();
        $userPromotion
            ->setId($data->id)
            ->setPromotion(Promotion::createFromStdClass($data->promotion))
            ->setRealValue($data->real_value)
            ->setAuthData($data->auth_data);

        if ($data->expires_at !== null) {
            $userPromotion->setExpiresAt((new \DateTime(null, new \DateTimeZone('UTC')))->setTimestamp($data->expires_at));
        }

        return $userPromotion;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param Promotion $promotion
     *
     * @return $this
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * @return float
     */
    public function getRealValue()
    {
        return $this->realValue;
    }

    /**
     * @param float $realValue
     *
     * @return $this
     */
    public function setRealValue($realValue)
    {
        $this->realValue = $realValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthData()
    {
        return $this->authData;
    }

    /**
     * @param string $authData
     *
     * @return $this
     */
    public function setAuthData($authData)
    {
        $this->authData = $authData;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime $expiresAt
     *
     * @return $this
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }
}
