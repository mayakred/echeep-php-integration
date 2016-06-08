<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:54.
 */
namespace MayakRed\ECheepIntegration\Request;

use MayakRed\ECheepIntegration\Model\Promotion;
use MayakRed\ECheepIntegration\Model\User;

class UserPromotionIssuance
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var Promotion
     */
    protected $promotion;

    /**
     * @var string
     */
    protected $authData;

    /**
     * @var float
     */
    protected $value;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;

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
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
