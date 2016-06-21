<?php

namespace MayakRed\ECheepIntegration;

use MayakRed\ECheepIntegration\Model\Promotion;
use MayakRed\ECheepIntegration\Model\User;
use MayakRed\ECheepIntegration\Model\UserPromotion;
use MayakRed\ECheepIntegration\Request\Gift as GiftRequest;
use MayakRed\ECheepIntegration\Request\Sale;
use MayakRed\ECheepIntegration\Request\UserPromotionIssuance;

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 9:40.
 */
interface ECheepAPIInterface
{
    /**
     * @param $phone
     *
     * @return bool
     */
    public function getUserByPhoneRequest($phone);

    /**
     * @param $phone
     * @param $code
     *
     * @return User
     */
    public function getUserByPhoneConfirm($phone, $code);

    /**
     * @param $uuid
     *
     * @return User
     */
    public function getUserByChipUUID($uuid);

    /**
     * @param Sale $sale
     *
     * @return bool
     */
    public function registerSale(Sale $sale);

    /**
     * @param UserPromotionIssuance $issuance
     *
     * @return UserPromotion
     */
    public function createUserPromotion(UserPromotionIssuance $issuance);

    /**
     * @param GiftRequest $gift
     *
     * @return bool
     */
    public function createUserGift(GiftRequest $gift);

    /**
     * @param User $user
     *
     * @return UserPromotion[]
     */
    public function getUserPromotions(User $user);

    /**
     * @return Promotion[]
     */
    public function getOrganizationPromotions();
}
