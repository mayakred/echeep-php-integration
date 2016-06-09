<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:51.
 */
namespace MayakRed\ECheepIntegration\Request;

use MayakRed\ECheepIntegration\Exception\NotEnoughDataException;
use MayakRed\ECheepIntegration\Model\Promotion;
use MayakRed\ECheepIntegration\Model\User;

class SaleByPromotionAndUser extends Sale
{
    /**
     * @var Promotion
     */
    protected $promotion;

    /**
     * @var User
     */
    protected $user;

    /**
     * @return array
     */
    public function serialize()
    {
        $parentData =  parent::serialize();

        if ($this->promotion === null) {
            throw new NotEnoughDataException('promotion is null');
        }
        if ($this->promotion->getAlias() === null) {
            throw new NotEnoughDataException('promotion->alias is null');
        }

        if ($this->user === null) {
            throw new NotEnoughDataException('user is null');
        }
        if ($this->user->getId() === null) {
            throw new NotEnoughDataException('user->id is null');
        }

        $parentData['promotion_alias'] = $this->promotion->getAlias();
        $parentData['user_id'] = $this->user->getId();

        return $parentData;
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
}
