<?php

require __DIR__ . '/vendor/autoload.php';

use MayakRed\ECheepIntegration\ECheepAPI;
use MayakRed\ECheepIntegration\Request\Gift;
use MayakRed\ECheepIntegration\ECheepAPIInterface;
use MayakRed\ECheepIntegration\Exception\BaseException;
use MayakRed\ECheepIntegration\Model\Phone;
use MayakRed\ECheepIntegration\Model\Promotion;
use MayakRed\ECheepIntegration\Model\UserImportData;
use MayakRed\ECheepIntegration\Model\UserPromotion;
use MayakRed\ECheepIntegration\Request\SaleByPromotionAndUser;
use MayakRed\ECheepIntegration\Request\SaleByUserPromotion;
use MayakRed\ECheepIntegration\Request\UserPromotionIssuance;

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

/**
 * @param ECheepAPIInterface $api
 *
 * @return \MayakRed\ECheepIntegration\Model\UserPromotion
 */
function sampleUserPromotionIssuance(ECheepAPIInterface $api)
{
    $promotions = sampleOrganizationPromotions($api);
    $user = sampleUserByPhone($api);
    $userPromotionIssuance = new UserPromotionIssuance();
    $userPromotionIssuance
        ->setValue(20)
        ->setUser($user)
        ->setPromotion($promotions[0])
        ->setAuthData('some-auth-data');

    return $api->createUserPromotion($userPromotionIssuance);
}

<<<<<<< 6dd148af4a43c618318350e6ebcaded228f99d3d
/**
 * @param ECheepAPIInterface $api
 *
 * @return bool
 */
function sampleUserGift(ECheepAPIInterface $api)
{
    $promotions = sampleOrganizationPromotions($api);
    $user = sampleUserByPhone($api);
    $gift = new Gift();
    $gift
        ->setValue(20)
        ->setUser($user)
        ->setPromotion($promotions[0])
        ->setAuthData('some-auth-data')
        ->setExpiresAt(new \DateTime('+4 days'));

    return $api->createUserGift($gift);
}

$api = new ECheepAPI('echeep.mayakdev.ru', '0d07d369421aa301160f11fbc928fe46');

$phone = '+70000000000';
$code = 12345;

//$api->closeImportSession();
$api->getUserByPhoneRequest($phone);
$user = $api->getUserByPhoneConfirm($phone, $code);
$user->setPhone(Phone::createFromString($phone));
$userPromotions = $api->getUserPromotions($user);

$importData = new UserImportData();
foreach($userPromotions as $userPromotion) {
    /** @var UserPromotion $userPromotion */
    $userPromotion->setRealValue($userPromotion->getRealValue() + 7);
}
$importData->setUserPromotions($userPromotions)
    ->setUser($user);

try {
    $api->openImportSession();
} catch (BaseException $e) {
    if ($e->getApiStatus() !== 'ImportSessionAlreadyOpened') {
        throw $e;
    } else {
        $api->closeImportSession();
        $api->openImportSession();
    }
}
$api->importData([$importData]);

$a = 1;