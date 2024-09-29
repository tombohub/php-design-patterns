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

function createRestaurant(RestaurantImplementationType $type): Restaurant
{
    return match ($type) {
        RestaurantImplementationType::BEEF => new BeefRestaurant(),
        RestaurantImplementationType::CHICKEN => new ChickenRestaurant()
    };
}

$restaurant = createRestaurant(RestaurantImplementationType::CHICKEN);

$restaurant->serveBurger();

// advanced usage
// dynamically get implementations. Limitations is that implementation class needs to end in Restaurant. To avoid this we can have property in each implementations to uniquelly identify each restaurant

function getRestaurantImplementationClassNames()
{
    $restaurants = [];
    foreach (get_declared_classes() as $className) {
        $reflectionClass = new ReflectionClass($className);
        if ($reflectionClass->isSubclassOf(Restaurant::class) && !$reflectionClass->isAbstract()) {
            $restaurants[] = $className;
        }
    }
    return $restaurants;
}

function createNameFromRestaurantClassName(string $className)
{
    if (str_ends_with($className, 'Restaurant')) {
        $name = substr($className, 0, -strlen('Restaurant'));
        return strtolower($name);
    } else {
        throw new Error('class name needs to end in Restaurant');
    }
}

// ...and so on so on. create function to get class name from restaurant name.
// Create an array of all names. User input validate against that array, throw error if name is not in array, show available names.


print_r(getRestaurantImplementationClassNames());
