<?php

namespace Kata;

class Sauce
{
    /** @var string */
    private $name;

    /**
     * Sauce constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
