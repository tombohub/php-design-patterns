<?php

/**
 * 1. create final class
 * 2. create private nullable static property for holding class instance
 * 3. private constructor with whatever data as argument
 * 4. public static method for creating instance getInstance. Check if instance is null create
 * instance if yes
 */


final class Singleton
{
    private static ?Singleton $instance = null;
    private function __construct(public string $data) {}
    public static function getInstance(string $data)
    {
        if (self::$instance === null) {
            self::$instance = new Singleton($data);
        }
        return self::$instance;
    }
}

// Attempt to create the first instance
$singleton1 = Singleton::getInstance("First Instance");
echo $singleton1->data  . "\n"; // Outputs: First Instance

// Attempt to create the second instance with different data
$singleton2 = Singleton::getInstance("Second Instance");
echo $singleton2->data . "\n"; // Outputs: First Instance

// Verify that both instances are the same
var_dump($singleton1 === $singleton2); // Outputs: bool(true)
