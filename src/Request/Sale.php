<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:43.
 */
namespace MayakRed\ECheepIntegration\Request;

abstract class Sale
{
    /**
     * @var float
     */
    protected $valueModifier;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    protected $profit;

    /**
     * @return array
     */
    public function serialize()
    {
        return [
            'value_modifier' => $this->valueModifier,
            'profit' => $this->profit,
            'price' => $this->price,
        ];
    }

    /**
     * @return float
     */
    public function getValueModifier()
    {
        return $this->valueModifier;
    }

    /**
     * @param float $valueModifier
     *
     * @return $this
     */
    public function setValueModifier($valueModifier)
    {
        $this->valueModifier = $valueModifier;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getProfit()
    {
        return $this->profit;
    }

    /**
     * @param float $profit
     *
     * @return $this
     */
    public function setProfit($profit)
    {
        $this->profit = $profit;

        return $this;
    }
}
