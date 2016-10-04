<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 09.06.16
 * Time: 11:52.
 */

namespace MayakRed\ECheepIntegration\Exception;

class BaseException extends \RuntimeException
{
    /**
     * @var string
     */
    protected $apiStatus;

    /**
     * @var string
     */
    protected $apiCode;

    /**
     * BaseException constructor.
     *
     * @param string $apiStatus
     * @param int    $apiCode
     */
    public function __construct($apiStatus = 'GeneralInternalError', $apiCode = 500)
    {
        $this->apiStatus = $apiStatus;
        $this->apiCode = $apiCode;
        parent::__construct($apiStatus, 0, null);
    }

    /**
     * @return string
     */
    public function getApiCode()
    {
        return $this->apiCode;
    }

    /**
     * @param string $apiCode
     *
     * @return $this
     */
    public function setApiCode($apiCode)
    {
        $this->apiCode = $apiCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getApiStatus()
    {
        return $this->apiStatus;
    }

    /**
     * @param string $apiStatus
     *
     * @return $this
     */
    public function setApiStatus($apiStatus)
    {
        $this->apiStatus = $apiStatus;

        return $this;
    }
}
