<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:49.
 */
namespace MayakRed\ECheepIntegration\Request;

use MayakRed\ECheepIntegration\Model\UserPromotion;

class SaleByUserPromotion extends Sale
{
    /**
     * @var UserPromotion
     */
    protected $userPromotion;

    /**
     * @return UserPromotion
     */
    public function getUserPromotion()
    {
        return $this->userPromotion;
    }

    /**
     * @param UserPromotion $userPromotion
     *
     * @return $this
     */
    public function setUserPromotion($userPromotion)
    {
        $this->userPromotion = $userPromotion;

        return $this;
    }
}
