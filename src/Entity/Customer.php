<?php

namespace CarWash\Entity;

class Customer
{
    /**
     * @param string $dni
     */
    protected $dni;

    /**
     * @param string $name
     */
    protected $name;

    /**
     * @param string $cellphone
     */
    protected $cellphone;

    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     *
     * @return $this
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

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
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * @param string $cellphone
     *
     * @return $this
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDni();
    }
}
