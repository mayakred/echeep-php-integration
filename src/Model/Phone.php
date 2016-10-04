<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 04.10.16
 * Time: 15:56.
 */

namespace MayakRed\ECheepIntegration\Model;

class Phone
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @param $strValue
     *
     * @return Phone
     */
    public static function createFromString($strValue)
    {
        $phone = new self();
        $phone->setValue($strValue);

        return $phone;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
