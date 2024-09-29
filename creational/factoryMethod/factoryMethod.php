<?php

abstract class Restaurant
{

    public function serveBurger()
    {
        $burger = $this->createBurger();

        echo "serving " . get_class($burger) . " burger \n";
    }
    protected abstract function createBurger(): Burger;
}

interface Burger {}

class BeefRestaurant extends Restaurant
{
    public const string NAME = 'beef';
    protected function createBurger(): Burger
    {
        return new BeefBurger();
    }
}

class ChickenRestaurant extends Restaurant
{
    protected function createBurger(): Burger
    {
        return new ChickenBurger();
    }
}

class BeefBurger implements Burger {}
class ChickenBurger implements Burger {}

// Simple client usage
$beefRestaurant = new BeefRestaurant();
$chickenRestaurant = new ChickenRestaurant();

$beefRestaurant->serveBurger();
$chickenRestaurant->serveBurger();

// medium advanced usage.
// Register implementations in enum.

enum RestaurantImplementationType
{
    case BEEF;
    case CHICKEN;
}

function getRestaurantImplementation(RestaurantImplementationType $type): Restaurant
{
    return match ($type) {
        RestaurantImplementationType::BEEF => new BeefRestaurant(),
        RestaurantImplementationType::CHICKEN => new ChickenRestaurant()
    };
}

$restaurant = getRestaurantImplementation(RestaurantImplementationType::CHICKEN);

$restaurant->serveBurger();
