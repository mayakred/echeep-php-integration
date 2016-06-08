<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:30.
 */
namespace MayakRed\ECheepIntegration\Model;

class Discount
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $isAccumulative;

    /**
     * @var float
     */
    protected $minValue;

    /**
     * @var float
     */
    protected $maxValue;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isIsAccumulative()
    {
        return $this->isAccumulative;
    }

    /**
     * @param bool $isAccumulative
     *
     * @return $this
     */
    public function setIsAccumulative($isAccumulative)
    {
        $this->isAccumulative = $isAccumulative;

        return $this;
    }

    /**
     * @return float
     */
    public function getMinValue()
    {
        return $this->minValue;
    }

    /**
     * @param float $minValue
     *
     * @return $this
     */
    public function setMinValue($minValue)
    {
        $this->minValue = $minValue;

        return $this;
    }

    /**
     * @return float
     */
    public function getMaxValue()
    {
        return $this->maxValue;
    }

    /**
     * @param float $maxValue
     *
     * @return $this
     */
    public function setMaxValue($maxValue)
    {
        $this->maxValue = $maxValue;

        return $this;
    }
}
