<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:31.
 */
namespace MayakRed\ECheepIntegration\Model;

class Coupon
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var float
     */
    protected $value;

    /**
     * @param \stdClass $data
     *
     * @return Coupon
     */
    public static function createFromStdClass(\stdClass $data)
    {
        $coupon = new self();
        $coupon
            ->setId($data->id)
            ->setValue($data->value);

        return $coupon;
    }

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
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
