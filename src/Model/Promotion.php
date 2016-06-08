<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:32.
 */
namespace MayakRed\ECheepIntegration\Model;

class Promotion
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @var Coupon
     */
    protected $coupon;

    /**
     * @var Bonus
     */
    protected $bonusProgram;

    /**
     * @var Discount
     */
    protected $discount;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var bool
     */
    protected $needProof;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * @var Organization[]
     */
    protected $organizations;

    /**
     * @var int
     */
    protected $organizationOwnerId;

    /**
     * @var \DateTime
     */
    protected $expiresAt;

    /**
     * Promotion constructor.
     */
    public function __construct()
    {
        $this->organizations = [];
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
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     *
     * @return $this
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @return Coupon
     */
    public function getCoupon()
    {
        return $this->coupon;
    }

    /**
     * @param Coupon $coupon
     *
     * @return $this
     */
    public function setCoupon($coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * @return Bonus
     */
    public function getBonusProgram()
    {
        return $this->bonusProgram;
    }

    /**
     * @param Bonus $bonusProgram
     *
     * @return $this
     */
    public function setBonusProgram($bonusProgram)
    {
        $this->bonusProgram = $bonusProgram;

        return $this;
    }

    /**
     * @return Discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param Discount $discount
     *
     * @return $this
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNeedProof()
    {
        return $this->needProof;
    }

    /**
     * @param bool $needProof
     *
     * @return $this
     */
    public function setNeedProof($needProof)
    {
        $this->needProof = $needProof;

        return $this;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return Organization[]
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }

    /**
     * @param Organization[] $organizations
     *
     * @return $this
     */
    public function setOrganizations($organizations)
    {
        $this->organizations = $organizations;

        return $this;
    }

    /**
     * @return int
     */
    public function getOrganizationOwnerId()
    {
        return $this->organizationOwnerId;
    }

    /**
     * @param int $organizationOwnerId
     *
     * @return $this
     */
    public function setOrganizationOwnerId($organizationOwnerId)
    {
        $this->organizationOwnerId = $organizationOwnerId;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param \DateTime $expiresAt
     *
     * @return $this
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }
}
