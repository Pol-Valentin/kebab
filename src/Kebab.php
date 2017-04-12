<?php

namespace Kata;

class Kebab
{
    /**
     * @var Ingredient[]
     */
    private $ingredients;

    /**
     * @var Sauce|null
     */
    private $sauce;

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

    public function doubleFromage()
    {
        $ingredients = [];

        foreach($this->ingredients as $ingredient){
            if(strtolower($ingredient->getName()) === 'Fromage'){
                $ingredients[] = $ingredient;
                $ingredients[] = $ingredient;
            }else{
                $ingredients[] = $ingredient;
            }
        }

        $this->ingredients = $ingredients;
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
