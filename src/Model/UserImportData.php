<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 04.10.16
 * Time: 16:08.
 */

namespace Model;

use MayakRed\ECheepIntegration\Exception\NotEnoughDataException;
use MayakRed\ECheepIntegration\Model\User;
use MayakRed\ECheepIntegration\Model\UserPromotion;

class UserImportData
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var UserPromotion[]
     */
    protected $userPromotions;

    /**
     * @return array
     */
    public function serialize()
    {
        if ($this->user->getPhone() == null) {
            throw new NotEnoughDataException('User phone is null');
        }

        return [
            'phone' => $this->user->getPhone(),
            'user_promotions' => array_map(function (UserPromotion $userPromotion) {
                return $userPromotion->serializeForImport();
            }, $this->userPromotions),
        ];
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

    /**
     * @return \MayakRed\ECheepIntegration\Model\UserPromotion[]
     */
    public function getUserPromotions()
    {
        return $this->userPromotions;
    }

    /**
     * @param \MayakRed\ECheepIntegration\Model\UserPromotion[] $userPromotions
     *
     * @return $this
     */
    public function setUserPromotions($userPromotions)
    {
        $this->userPromotions = $userPromotions;

        return $this;
    }
}
