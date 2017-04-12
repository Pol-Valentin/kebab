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

    /**
     * @return array|Ingredient[]
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @return Kebab
     */
    public function removeOignon()
    {
        $this->ingredients = array_filter($this->ingredients, function(Ingredient $ingredient){
            if(strtolower($ingredient->getName()) === 'oignon'){
                return false;
            }

            return true;
        });

        return $this;
    }
}
