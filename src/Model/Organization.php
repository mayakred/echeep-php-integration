<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:26.
 */
namespace MayakRed\ECheepIntegration\Model;

class Organization
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Shop[]
     */
    protected $shops;

    /**
     * Organization constructor.
     */
    public function __construct()
    {
        $this->shops = [];
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param Shop $shop
     *
     * @return bool
     */
    public function haveShop(Shop $shop)
    {
        foreach ($this->shops as $existedShop) {
            if ($existedShop->getId() === $shop->getId()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Shop $shop
     */
    public function addShop(Shop $shop)
    {
        if (!$this->haveShop($shop)) {
            $this->shops[] = $shop;
        }
    }
}
