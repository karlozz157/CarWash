<?php

namespace CarWash\Entity;

class Car
{
    /**
     * @var string $brand
     */
    protected $brand;

    /**
     * @var string $model
     */
    protected $model;

    /**
     * @var string $color
     */
    protected $color;

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     *
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param string $model
     *
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s %s %s', $this->brand, $this->model, $this->color);
    }
}
