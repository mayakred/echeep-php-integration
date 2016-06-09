<?php

require __DIR__ . '/vendor/autoload.php';

use MayakRed\ECheepIntegration\ECheepAPI;
use MayakRed\ECheepIntegration\ECheepAPIInterface;
use MayakRed\ECheepIntegration\Request\SaleByPromotionAndUser;
use MayakRed\ECheepIntegration\Request\SaleByUserPromotion;

/**
 * @param ECheepAPIInterface $api
 *
 * @return \MayakRed\ECheepIntegration\Model\User
 */
function sampleUserByPhone(ECheepAPIInterface $api)
{
    $phone = '+70000000000';
    $code = 12345;
    $api->getUserByPhoneRequest($phone);
    $user = $api->getUserByPhoneConfirm($phone, $code);

    return $user;
}

/**
 * @param ECheepAPIInterface $api
 *
 * @return \MayakRed\ECheepIntegration\Model\User
 */
function sampleUserByChip(ECheepAPIInterface $api)
{
    $uuid = '191aec17-2ac9-3dc7-a78b-65ef2a249dd4';

    return $api->getUserByChipUUID($uuid);
}

/**
 * @param ECheepAPIInterface $api
 *
 * @return \MayakRed\ECheepIntegration\Model\UserPromotion[]
 */
function sampleUserPromotions(ECheepAPIInterface $api)
{
    $user = sampleUserByPhone($api);

    return $api->getUserPromotions($user);
}

/**
 * @param ECheepAPIInterface $api
 *
 * @return \MayakRed\ECheepIntegration\Model\Promotion[]
 */
function sampleOrganizationPromotions(ECheepAPIInterface $api)
{
    return $api->getOrganizationPromotions();
}

/**
 * @param ECheepAPIInterface $api
 *
 * @return bool
 */
function sampleSaleByUserPromotionId(ECheepAPIInterface $api)
{
    $userPromotions = sampleUserPromotions($api);
    $saleByUserPromotion = new SaleByUserPromotion();
    $saleByUserPromotion
        ->setPrice(9999)
        ->setProfit(0)
        ->setValueModifier(20)
        ->setUserPromotion($userPromotions[0]);

    return $api->registerSale($saleByUserPromotion);
}

/**
 * @param ECheepAPIInterface $api
 *
 * @return bool
 */
function sampleSaleByPromotionAndUser(ECheepAPIInterface $api)
{
    $promotions = sampleOrganizationPromotions($api);
    $user = sampleUserByChip($api);
    $saleByPromotionAndUser = new SaleByPromotionAndUser();
    $saleByPromotionAndUser
        ->setPrice(9999)
        ->setProfit(0)
        ->setValueModifier(20)
        ->setPromotion($promotions[0])
        ->setUser($user);

    return $api->registerSale($saleByPromotionAndUser);
}

$api = new ECheepAPI('echeep.mayakdev.ru', 'dns-shop-central-api-key');

sampleSaleByPromotionAndUser($api);

