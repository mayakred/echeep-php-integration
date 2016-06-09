<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:18.
 */
namespace MayakRed\ECheepIntegration\Model;

class City
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var float
     */
    protected $lat;

    /**
     * @var float
     */
    protected $lon;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param \stdClass $data
     *
     * @return City
     */
    public static function createFromStdClass(\stdClass $data)
    {
        $city = new self();
        $city
            ->setId($data->id)
            ->setLat($data->lat)
            ->setLon($data->lon)
            ->setName($data->name);

        return $city;
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
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     *
     * @return $this
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @param float $lon
     *
     * @return $this
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

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
}
