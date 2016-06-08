<?php

namespace MayakRed\ECheepIntegration;

use MayakRed\ECheepIntegration\Request\Sale;
use MayakRed\ECheepIntegration\Request\UserPromotionIssuance;

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Company: LLC Mayak Red
 * Version: 0.1
 * Date: 08.06.16
 * Time: 9:37.
 */
class ECheepAPI implements ECheepAPIInterface
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * ECheepAPI constructor.
     *
     * @param $url
     * @param $apiKey
     */
    public function __construct($url, $apiKey)
    {
        $this->url = $url;
        $this->apiKey = $apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByPhoneRequest($phone)
    {
        // TODO: Implement getUserByPhoneRequest() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByPhoneConfirm($phone, $code)
    {
        // TODO: Implement getUserByPhoneConfirm() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByChipUUID($uuid)
    {
        // TODO: Implement getUserByChipUUID() method.
    }

    /**
     * {@inheritdoc}
     */
    public function registerSale(Sale $sale)
    {
        // TODO: Implement registerSale() method.
    }

    /**
     * {@inheritdoc}
     */
    public function createUserPromotion(UserPromotionIssuance $issuance)
    {
        // TODO: Implement createUserPromotion() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getOrganizationPromotions()
    {
        // TODO: Implement getOrganizationPromotions() method.
    }
}
