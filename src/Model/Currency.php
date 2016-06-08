<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:23.
 */
namespace MayakRed\ECheepIntegration\Model;

class Currency
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $shortName;

    /**
     * @var string
     */
    protected $nominativeCasePlural;

    /**
     * @var string
     */
    protected $nominativeCaseSingular;

    /**
     * @var string
     */
    protected $genitiveCasePlural;

    /**
     * @var string
     */
    protected $genitiveCaseSingular;

    /**
     * @var bool
     */
    protected $systemWide;

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
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     *
     * @return $this
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * @return string
     */
    public function getNominativeCasePlural()
    {
        return $this->nominativeCasePlural;
    }

    /**
     * @param string $nominativeCasePlural
     *
     * @return $this
     */
    public function setNominativeCasePlural($nominativeCasePlural)
    {
        $this->nominativeCasePlural = $nominativeCasePlural;

        return $this;
    }

    /**
     * @return string
     */
    public function getNominativeCaseSingular()
    {
        return $this->nominativeCaseSingular;
    }

    /**
     * @param string $nominativeCaseSingular
     *
     * @return $this
     */
    public function setNominativeCaseSingular($nominativeCaseSingular)
    {
        $this->nominativeCaseSingular = $nominativeCaseSingular;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenitiveCasePlural()
    {
        return $this->genitiveCasePlural;
    }

    /**
     * @param string $genitiveCasePlural
     *
     * @return $this
     */
    public function setGenitiveCasePlural($genitiveCasePlural)
    {
        $this->genitiveCasePlural = $genitiveCasePlural;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenitiveCaseSingular()
    {
        return $this->genitiveCaseSingular;
    }

    /**
     * @param string $genitiveCaseSingular
     *
     * @return $this
     */
    public function setGenitiveCaseSingular($genitiveCaseSingular)
    {
        $this->genitiveCaseSingular = $genitiveCaseSingular;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSystemWide()
    {
        return $this->systemWide;
    }

    /**
     * @param bool $systemWide
     *
     * @return $this
     */
    public function setSystemWide($systemWide)
    {
        $this->systemWide = $systemWide;

        return $this;
    }
}
