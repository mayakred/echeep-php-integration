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
     * @param \stdClass $data
     *
     * @return Promotion
     */
    public static function createFromStdClass(\stdClass $data)
    {
        $promotion = new self();
        $promotion
            ->setId($data->id)
            ->setAlias($data->alias)
            ->setName($data->name)
            ->setType($data->type)
            ->setDescription($data->description)
            ->setNeedProof($data->need_proof)
            ->setOrganizationOwnerId($data->organization_owner_id);

        if ($data->coupon !== null) {
            $promotion->setCoupon(Coupon::createFromStdClass($data->coupon));
        }
        if ($data->bonus_program !== null) {
            $promotion->setBonusProgram(Bonus::createFromStdClass($data->bonus_program));
        }
        if ($data->discount !== null) {
            $promotion->setDiscount(Discount::createFromStdClass($data->discount));
        }
        if ($data->currency !== null) {
            $promotion->setCurrency(Currency::createFromStdClass($data->currency));
        }
        if ($data->expires_at !== null) {
            $promotion->setExpiresAt((new \DateTime(null, new \DateTimeZone('UTC')))->setTimestamp($data->expires_at));
        }
        foreach ($data->organizations as $organizationData) {
            $promotion->addOrganization(Organization::createFromStdClass($organizationData));
        }

        return $promotion;
    }

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
     * @param Organization $organization
     */
    public function addOrganization(Organization $organization)
    {
        $this->organizations[] = $organization;
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
