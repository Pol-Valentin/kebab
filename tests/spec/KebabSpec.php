<?php

namespace spec\Kata;

use Kata\Ingredient;
use PhpSpec\ObjectBehavior;

class KebabSpec extends ObjectBehavior
{
    /**
     * @var Ingredient[]
     */
    private $ingredients;

    public function let()
    {
        $this->ingredients = [];
    }

    public function it_should_be_vegetarian_when_produced_with_meat()
    {
        $this->given_there_is_a_meat_ingredient();

        $this->when_i_produce_a_kebab();

        $this->then_it_should_not_be_vegetarian();
    }

    public function it_should_have_sauce()
    {
        $this->given_there_is_sauce_ingredient();
        $this->when_i_produce_a_kebab();
        $this->then_it_should_be_vegetarian();
    }

    public function it_should_not_be_vegetarian_when_produced_without_meat()
    {
        $this->given_there_is_vegetable_ingredient();

        $this->when_i_produce_a_kebab();

        $this->then_it_should_be_vegetarian();
    }

    public function it_should_double_fromage()
    {
        $this->given_there_is_cheese();
        $this->given_there_is_a_meat_ingredient();
        $this->when_i_produce_a_kebab();

        $this->then_it_should_have_double_fromage();
    }

    public function it_should_remove_oignon_from_my_kebab()
    {
        $this->given_there_is_vegetable_ingredient();
        $this->given_there_is_oignon_ingredient();
        $this->when_i_produce_a_kebab();
        $this->then_it_should_not_have_oignon();
    }

    private function given_there_is_cheese()
    {
        $this->ingredients[] = new Ingredient('Fromage', false);
    }


    private function given_there_is_a_meat_ingredient()
    {
        $this->ingredients[] = new Ingredient('Foie', true);
    }


    private function given_there_is_vegetable_ingredient()
    {
        $this->ingredients[] = new Ingredient('Salade', false);
    }

    private function given_there_is_sauce_ingredient()
    {
        $this->ingredients[] = new Ingredient('Sauce Oignon', false);
    }

    private function given_there_is_oignon_ingredient()
    {
        $this->ingredients[] = new Ingredient('oignon', false);
    }

    private function when_i_produce_a_kebab()
    {
        $this->beConstructedWith($this->ingredients);
    }

    private function then_it_should_not_be_vegetarian()
    {
        $this->isVegetarian()->shouldBe(false);
    }

    private function then_it_should_not_have_oignon()
    {
        $this->getIngredients()->shouldNotContain(new Ingredient('oignon', false));
    }

    private function then_it_should_be_vegetarian()
    {
        $this->isVegetarian()->shouldBe(true);
    }

    private function then_it_should_have_double_fromage()
    {
        $this->getIngredients()->shouldBeLike([
            new Ingredient('Fromage', false),
            new Ingredient('Fromage', false),
            new Ingredient('Foie', true),
        ]);
    }
}
