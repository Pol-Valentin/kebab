<?php

namespace Kata;

class Ingredient
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var boolean
     */
    private $isMeat;


    /**
     * Ingredient constructor.
     * @param string $name
     * @param boolean $isMeat
     */
    public function __construct($name, $isMeat)
    {
        $this->name = $name;
        $this->isMeat = $isMeat;
    }
    /**
     * @return bool
     */
    public function isMeat()
    {
        return $this->isMeat;
    }
}