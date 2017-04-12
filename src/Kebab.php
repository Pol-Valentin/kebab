<?php

namespace Kata;

class Kebab
{
    /**
     * @var Ingredient[]
     */
    private $ingredients;

    /**
     * Kebab constructor.
     * @param Ingredient[] $ingredients
     */
    public function __construct(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function isVegetarian()
    {
        foreach ($this->ingredients as $ingredient) {
            if ($ingredient->isMeat()) {
                return false;
            }
        }
        return true;
    }
}