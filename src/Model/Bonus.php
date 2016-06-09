<?php

/**
 * Created by IntelliJ IDEA.
 * User: Ivan Kalita
 * Date: 08.06.16
 * Time: 10:30.
 */
namespace MayakRed\ECheepIntegration\Model;

class Bonus
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @param \stdClass $data
     *
     * @return Bonus
     */
    public static function createFromStdClass(\stdClass $data)
    {
        $bonus = new self();
        $bonus->setId($data->id);

        return $bonus;
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
}
