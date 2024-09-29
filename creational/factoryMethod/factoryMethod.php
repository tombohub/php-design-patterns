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

// Advanced client usage.
// Use reflection and dynamically create valid restaurant types. NOT FINISHED

function getRestaurantImplementations()
{
    $implementations = [];
    foreach (get_declared_classes() as $className) {
        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isSubclassOf(Restaurant::class)) {
            $implementations[] = $className;
        }
    }
    return $implementations;
}

$restaurantType = 'beef';
$restaurantImplementations = getRestaurantImplementations();
print_r($restaurantImplementations);
