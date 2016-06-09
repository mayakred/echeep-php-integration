<?php

namespace MayakRed\ECheepIntegration;

use Httpful\Http;
use Httpful\Request as HTTPRequest;
use Httpful\Response;
use MayakRed\ECheepIntegration\Exception\BaseException;
use MayakRed\ECheepIntegration\Exception\NotAnAPIResponseException;
use MayakRed\ECheepIntegration\Model\Promotion;
use MayakRed\ECheepIntegration\Model\User;
use MayakRed\ECheepIntegration\Model\UserPromotion;
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
    const INTEGRATION_PREFIX = '/api/integration';
    const API_VERSION = 1;

    const USER_BY_PHONE_REQUEST = '/user/phone/request';
    const USER_BY_PHONE_CONFIRM = '/user/phone/confirm';
    const USER_BY_CHIP = '/user/chip';
    const USER_PROMOTIONS = '/user/%s/promotions';
    const PROMOTIONS = '/promotions';

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
     * @param $url
     * @param array $params
     *
     * @return string
     */
    protected function getUrl($url, $params = [])
    {
        $baseUrl = $this->url . self::INTEGRATION_PREFIX . '/v' . self::API_VERSION . $url;
        if (count($params) > 0) {
            $baseUrl .= '?' . http_build_query($params);
        }

        return $baseUrl;
    }

    /**
     * @param $method
     * @param $url
     *
     * @return HTTPRequest
     */
    protected function prepareRequest($method, $url)
    {
        return HTTPRequest::init($method)
            ->addHeader('Authorization', "TOKEN token=\"{$this->apiKey}\"")
            ->addHeader('Content-Type', 'application/json')
            ->uri($url);
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    protected function getSuccessData(Response $response)
    {
        $body = $response->body;
        if (!property_exists($body, 'status') || !property_exists($body, 'data')) {
            throw new NotAnAPIResponseException();
        }

        $status = $body->status;
        $data = $body->data;

        if ($status !== 'Success') {
            throw new BaseException($status, $response->code);
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByPhoneRequest($phone)
    {
        $url = $this->getUrl(self::USER_BY_PHONE_REQUEST, ['phone' => $phone]);
        $response = $this->prepareRequest(Http::GET, $url)
            ->send();

        $this->getSuccessData($response);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByPhoneConfirm($phone, $code)
    {
        $url = $this->getUrl(self::USER_BY_PHONE_CONFIRM, ['phone' => $phone, 'code' => $code]);
        $response = $this->prepareRequest(Http::GET, $url)
            ->send();

        $data = $this->getSuccessData($response);

        return User::createFromStdClass($data);
    }

    /**
     * {@inheritdoc}
     */
    public function getUserByChipUUID($uuid)
    {
        $url = $this->getUrl(self::USER_BY_CHIP, ['chip' => $uuid]);
        $response = $this->prepareRequest(Http::GET, $url)
            ->send();

        $data = $this->getSuccessData($response);

        return User::createFromStdClass($data);
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
    public function getUserPromotions(User $user)
    {
        $promotionsUrl = sprintf(self::USER_PROMOTIONS, $user->getId());
        $url = $this->getUrl($promotionsUrl);
        $response = $this->prepareRequest(Http::GET, $url)
            ->send();

        $data = $this->getSuccessData($response);

        $result = [];
        foreach ($data as $userPromotionData) {
            $result[] = UserPromotion::createFromStdClass($userPromotionData);
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrganizationPromotions()
    {
        $response = $this->prepareRequest(Http::GET, $this->getUrl(self::PROMOTIONS))
            ->send();

        $data = $this->getSuccessData($response);

        $result = [];
        foreach ($data as $promotionData) {
            $result[] = Promotion::createFromStdClass($promotionData);
        }

        return $result;
    }
}
